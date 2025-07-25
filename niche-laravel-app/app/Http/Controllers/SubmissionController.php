<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function pending()
    {
        $submissions = Submission::where('submitted_by', Auth::id())->where('status', 'pending')->orderBy('submitted_at', 'desc')->get();

        return response()->json($submissions);
    }

    public function submitThesis(Request $request)
    {
        //logic
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
        $query = \App\Models\Submission::with(['program', 'submitter', 'reviewer'])
            ->whereIn('status', [\App\Models\Submission::STATUS_ACCEPTED, \App\Models\Submission::STATUS_REJECTED])
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
}
