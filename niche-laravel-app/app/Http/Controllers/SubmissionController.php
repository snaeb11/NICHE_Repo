<?php

namespace App\Http\Controllers;

use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SubmissionApprovedNotification;
use App\Notifications\SubmissionRejectedNotification;

class SubmissionController extends Controller
{
    public function pending()
    {
        $submissions = Submission::where('submitted_by', Auth::id())->where('status', 'pending')->orderBy('submitted_at', 'desc')->get();

        return response()->json($submissions);
    }

    public function submitThesis(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'adviser' => 'required|string|max:255',
            'authors' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $user = Auth::user();
                    if (!$this->validateAuthorInclusion($user, $value)) {
                        $fail('You must include your name in the authors list.');
                    }
                },
            ],
            'abstract' => 'required|string|min:100',
            'document' => 'required|file|mimes:pdf|max:10240', // 10MB max -- adjust this if neccessary
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors(),
                    'message' => 'Validation failed',
                ],
                422,
            );
        }

        try {
            $user = Auth::user();
            $program = $user->program;

            // Handle file upload
            $file = $request->file('document');
            $filePath = $file->store('submissions', 'public');

            // Create the submission
            $submission = Submission::create([
                'title' => $request->title,
                'adviser' => $request->adviser,
                'authors' => $request->authors,
                'abstract' => $request->abstract,
                'manuscript_path' => $filePath,
                'manuscript_filename' => $file->getClientOriginalName(),
                'manuscript_size' => $file->getSize(),
                'manuscript_mime' => $file->getMimeType(),
                'program_id' => $program ? $program->id : null,
                'submitted_by' => $user->id,
                'submitted_at' => now(),
                'status' => 'pending',
            ]);

            // Log thesis submission with metadata
            UserActivityLog::log($user, UserActivityLog::ACTION_THESIS_SUBMITTED, $submission, $program ? $program->id : null, [
                'submission' => [
                    'id' => $submission->id,
                    'title_hash' => hash('sha256', $submission->title),
                ],
            ]);
            return response()->json(
                [
                    'message' => 'Submission created successfully',
                    'data' => $submission,
                ],
                201,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Failed to create submission',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    /**
     * Validate that the user is included in the authors list
     */
    protected function validateAuthorInclusion($user, $authorsString): bool
    {
        $userFirst = strtolower(trim(Crypt::decrypt($user->first_name)));
        $userLast = strtolower(trim(Crypt::decrypt($user->last_name)));

        // Normalize helpers
        $normalize = function (string $value): string {
            $v = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
            $v = strtolower($v ?? $value);
            // Replace punctuation with spaces and collapse
            $v = preg_replace('/[\.,]/', ' ', $v);
            $v = preg_replace('/\s+/', ' ', trim($v));
            return $v;
        };

        $first = $normalize($userFirst);
        $last = $normalize($userLast);
        $firstInitial = $first !== '' ? substr($first, 0, 1) : '';

        // Split authors by comma, but keep names intact
        $authorEntries = array_filter(array_map('trim', explode(',', $authorsString)));

        foreach ($authorEntries as $entry) {
            $name = $normalize($entry);

            // Support "Last First" or "Last, First" and with middle names/initials
            $hasLast = strpos(' ' . $name . ' ', ' ' . $last . ' ') !== false || preg_match('/\b' . preg_quote($last, '/') . '\b/u', $name);

            if (!$hasLast) {
                continue;
            }

            // Must also have first name (full) OR initial anywhere in the same entry
            $hasFirstFull = preg_match('/\b' . preg_quote($first, '/') . '\b/u', $name) === 1;
            $hasFirstInitial = $firstInitial !== '' && preg_match('/\b' . preg_quote($firstInitial, '/') . '\.?\b/u', $name) === 1;

            if ($hasFirstFull || $hasFirstInitial) {
                return true;
            }
        }

        return false;
    }

    /**
     * Normalize name while removing middle initials for comparison
     */
    protected function normalizeWithoutInitials(string $name): string
    {
        // Remove 1-3 character middle initials with optional dots
        $withoutInitials = preg_replace('/\s[a-z]{1,3}\.?\s*/i', ' ', $name);

        // Standardize for comparison: lowercase and single spaces
        return strtolower(trim(preg_replace('/\s+/', ' ', $withoutInitials)));
    }

    public function show_submission_history(Request $request)
    {
        $submissions = Submission::where('submitted_by', Auth::id())->orderBy('submitted_at', 'desc')->paginate(3);
        return response()->json($submissions);
    }

    // submission filters
    public function filtersSubs()
    {
        $years = DB::table('submissions')->selectRaw('DISTINCT strftime("%Y", submitted_at) as year')->orderBy('year')->pluck('year');

        return response()->json(['years' => $years]);
    }

    // history filters
    public function filtersHistory()
    {
        $years = DB::table('submissions')->selectRaw('DISTINCT strftime("%Y", submitted_at) as year')->orderBy('year')->pluck('year');

        return response()->json(['years' => $years]);
    }

    // data go go to table subs
    public function getSubmissionData(Request $request)
    {
        $query = Submission::with(['program', 'submitter'])->orderBy('submitted_at', 'desc');

        // optional filters
        if ($request->filled('program')) {
            $query->where('program_id', $request->query('program'));
        }

        if ($request->filled('year')) {
            $query->whereYear('submitted_at', $request->query('year'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }
        if ($request->search) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('authors', 'like', "%{$search}%")
                    ->orWhere('abstract', 'like', "%{$search}%")
                    ->orWhere('manuscript_filename', 'like', "%{$search}%")
                    ->orWhere('adviser', 'like', "%{$search}%")
                    ->orWhere('submitted_by', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('submitted_at', 'like', "%{$search}%");
            });
        }

        $q = $query->get()->map(
            fn($s) => [
                'id' => $s->id,
                'title' => $s->title,
                'authors' => $s->authors,
                'abstract' => $s->abstract,
                'adviser' => $s->adviser,
                'manuscript_path' => $s->manuscript_path,
                'manuscript_filename' => $s->manuscript_filename,
                'manuscript_size' => $s->manuscript_size,
                'manuscript_mime' => $s->manuscript_mime,
                'program' => $s->program->name ?? '',
                'submitted_by' => $s->submitter->full_name ?? '—',
                'submitted_at' => $s->submitted_at,
                'status' => $s->status_label,
                'remarks' => $s->remarks ?? '—',
            ],
        );

        return response()->json($q);
    }

    public function history(Request $request)
    {
        $query = Submission::with(['program', 'submitter', 'reviewer'])
            ->whereIn('status', [Submission::STATUS_ACCEPTED, Submission::STATUS_REJECTED])
            ->orderBy('reviewed_at', 'desc');

        // optional filters
        if ($request->filled('program')) {
            $query->where('program_id', $request->query('program'));
        }

        if ($request->filled('year')) {
            $query->whereYear('submitted_at', $request->query('year'));
        }

        $history = $query->get()->map(
            fn($s) => [
                'title' => $s->title,
                'authors' => $s->authors,
                'abstract' => $s->abstract,
                'adviser' => $s->adviser,
                'program' => $s->program->name ?? '',
                'submitted_by' => $s->submitter->full_name ?? '—',
                'submitted_at' => $s->submitted_at,
                'status' => $s->status_label,
                'reviewed_by' => optional($s->reviewer)->full_name ?? '—',
                'remarks' => $s->remarks ?? '—',
                'reviewed_at' => $s->reviewed_at,
            ],
        );

        return response()->json($history);
    }

    public function download($id)
    {
        $submissions = Submission::findOrFail($id);

        $filePath = storage_path('app/public/' . $submissions->manuscript_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->download(
            $filePath,
            $submissions->manuscript_filename, // Preserve original filename
        );
    }

    public function downloadManuscript($id)
    {
        $submission = Submission::findOrFail($id);

        // Use the public disk since your files are stored in storage/app/public
        $disk = Storage::disk('public');

        if (!$disk->exists($submission->manuscript_path)) {
            abort(404, 'File not found');
        }

        return $disk->download($submission->manuscript_path, $submission->manuscript_filename);
}


    //submission actions
    public function approve(Request $request, $id)
    {
        $request->validate(['remarks' => 'nullable|string|max:2000']);

        $submission = Submission::findOrFail($id);
        $previousStatus = $submission->status;

        $submission->update([
            'status' => 'accepted',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'remarks' => $request->remarks,
        ]);

        // Log approval action
        UserActivityLog::log(auth()->user(), UserActivityLog::ACTION_THESIS_APPROVED, $submission, $submission->program_id, [
            'submission' => ['id' => $submission->id],
            'remarks' => $request->remarks,
            'previous_status' => $previousStatus,
            'new_status' => $submission->status,
        ]);

        $programCode = $submission->program->name ?? 'GEN';
        $year = (int) \Carbon\Carbon::parse($submission->submitted_at)->year;

        $latest = Inventory::where('inventory_number', 'like', "{$programCode}-{$year}-%")
            ->orderBy('inventory_number', 'desc')
            ->value('inventory_number');

        $nextSerial = 1;
        if ($latest) {
            // extract the last used serial and increment
            preg_match("/-(\d+)$/", $latest, $m);
            $nextSerial = ((int) $m[1]) + 1;
        }

        $inventoryNumber = sprintf('%s-%d-%03d', $programCode, $year, $nextSerial);

        $inventory = Inventory::create([
            'submission_id' => $submission->id,
            'title' => $submission->title,
            'authors' => $submission->authors,
            'adviser' => $submission->adviser,
            'abstract' => $submission->abstract,
            'program_id' => $submission->program_id,
            'manuscript_path' => $submission->manuscript_path,
            'manuscript_filename' => $submission->manuscript_filename,
            'manuscript_size' => $submission->manuscript_size,
            'manuscript_mime' => $submission->manuscript_mime,
            'academic_year' => (int) \Carbon\Carbon::parse($submission->submitted_at)->year,
            'inventory_number' => $inventoryNumber,
            'archived_by' => auth()->id(),
            'archived_at' => now(),
        ]);

        // Log archive action (inventory created)
        UserActivityLog::log(auth()->user(), UserActivityLog::ACTION_THESIS_ARCHIVED, $inventory, $submission->program_id, [
            'inventory' => [
                'id' => $inventory->id,
                'inventory_number' => $inventoryNumber,
            ],
            'submission_id' => $submission->id,
        ]);

        logger('Email to be sent to: ' . $submission->submitter->email);
        $submission->submitter->notify(new SubmissionApprovedNotification($submission));

        return response()->json(['message' => 'Submission approved']);
    }

    public function reject(Request $request, $id)
    {
        $request->validate(['remarks' => 'nullable|string|max:2000']);

        $submission = Submission::findOrFail($id);
        $previousStatus = $submission->status;
        $submission->update([
            'status' => 'rejected',
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'remarks' => $request->remarks,
        ]);

        // Log decline action
        UserActivityLog::log(auth()->user(), UserActivityLog::ACTION_THESIS_DECLINED, $submission, $submission->program_id, [
            'submission' => ['id' => $submission->id],
            'remarks' => $request->remarks,
            'previous_status' => $previousStatus,
            'new_status' => $submission->status,
        ]);

        $submission->submitter->notify(new SubmissionRejectedNotification($submission));

        return response()->json(['message' => 'Submission rejected']);
    }

    public function viewFile($id)
    {
        $submission = Submission::findOrFail($id);

        if (!auth()->check()) {
            \Log::error('Unauthorized access attempt to view file by user: ' . auth()->id());
            abort(403, 'Unauthorized');
        }

        \Log::info('Attempting to view file for submission ID: ' . $id);

        $fileName = ltrim($submission->manuscript_path, '/');
        $path = storage_path("app/public/{$fileName}");

        if (!file_exists($path)) {
            \Log::error("File not found at: {$path}");
            abort(404, "File not found at: {$path}");
        }

        \Log::info("File found at: {$path}");

        return response()->file($path);
    }
}
