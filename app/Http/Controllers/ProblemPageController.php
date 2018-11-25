<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc
 * Date: 2018-09-28
 * Time: 오후 12:40
 */

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Support\Facades\DB;

class ProblemPageController extends Controller
{
    public function pageInitInProblem($problem_id){
        if(!isset($problem_id) || !is_numeric($problem_id)||!is_int(intval($problem_id))){
            abort(404,"Invalid input");
        }
        $problem_info = Problem::whereKey($problem_id)->first();
        $in_out_example = DB::table('problem_in_out_example')->where('problemID',$problem_id)
            ->orderBy('exampleID','asc')->get();

        return view('problem')->with('in_out', $in_out_example)->with('problem', $problem_info);
    }

    public function pageInitInContest($contest_id, $problem_id){
        if(!isset($contest_id) || !isset($problem_id) || !is_int($contest_id) || !is_int($problem_id)){
            abort(404,"Invalid input");
        }

        $problem_info = DB::table('problem_by_contest_id')->where('contestID',$contest_id)
            ->where('problemIDInContest', $problem_id)
            ->first();

        $in_out_example = DB::table('problem_in_out_example')->where('problemID', $problem_info->problemID)->orderBy('exampleID','asc')->get();

        return view('problem')->with('problem', $problem_info)->with('in_out', $in_out_example)->with('contest', $contest_id);
    }
}
