<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
            'authors' => 'required|string',
            'abstract' => 'required|string|min:100',
            'document' => 'required|file|mimes:pdf|max:10240', // 10MB max
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
            // Get the authenticated user
            $user = Auth::user();

            // Get the user's program (assuming it's stored in the users table)
            $program = $user->program;
            @dump($program);

            // Handle file upload
            $file = $request->file('document');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $filePath = 'submissions/' . $fileName;

            // Store the file
            Storage::put($filePath, file_get_contents($file));

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
                'status' => 'pending',
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

    public function show_history(Request $request)
    {
        //logic
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
        $query = Submission::with(['program', 'submitted_by'])->whereIn('status', [Submission::STATUS_PENDING]);

        if ($request->program) {
            $query->where('program_id', $request->program);
        }

        if ($request->year) {
            $query->whereYear('submitted_at', $request->year);
        }

        return response()->json($query->get());
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
        $submission = Submission::findOrFail($id);

        // Add authorization if needed (e.g., only owner or admin can download)
        if (auth()->id() !== $submission->submitted_by) {
            abort(403, 'Unauthorized action.');
        }

        if (!Storage::exists($submission->manuscript_path)) {
            abort(404, 'File not found');
        }

        return Storage::download($submission->manuscript_path, $submission->manuscript_filename, ['Content-Type' => $submission->manuscript_mime]);
    }
}
