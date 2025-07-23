<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use App\Models\Submission;
use App\Models\Program;

class SubmissionController extends Controller
{
    // submission filters
    public function filtersSubs()
    {
        
        $years = DB::table('submissions')
            ->selectRaw('DISTINCT strftime("%Y", submitted_at) as year')
            ->orderBy('year')
            ->pluck('year');

        return response()->json(['years' => $years]);
    }

    // data go go to table subs
    public function getSubmissionData(Request $request)
    {
        $query = Submission::with(['program', 'submitted_by']); // ← added 'submitted_by'

        if ($request->program) {
            $query->where('program_id', $request->program);
        }

        if ($request->year) {
            $query->whereYear('submitted_at', $request->year);
        }

        return response()->json($query->get());
    }



}
