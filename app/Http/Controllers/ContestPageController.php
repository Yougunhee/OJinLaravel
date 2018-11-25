<?php
namespace App\Http\Controllers;

use App\Models\Contest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContestPageController extends Controller{
    public function pageInit($contestID){
        $contest_info = Contest::whereKey($contestID)->first();
        $now = Carbon::now();
        return view('contest')->with('contest', $contest_info)->with('serverTime', $now);
    }

    public function problemBoxAjax($contestID){
        $contest_info = Contest::whereKey($contestID)->first();
        $startTime = $contest_info->startTime;
        $endTime = $contest_info->endTime;
        $now = Carbon::now();
        $problems = null;
        if($startTime<=$now && $now<=$endTime) {
            $problems = DB::table('problem_by_contest_id')
                ->where('contestID', $contestID)
                ->select('problemIDInContest', 'score', 'title', 'isSpecialJudge', 'isDataSeperated')
                ->get();
        }
        return response()->json($problems);
    }
    public function questionBoxAjax(Request $request, $contestID){
        $contest_info = Contest::whereKey($contestID)->first('questionPublic');

    }
    public function noticeBoxAjax($contestID){
        $contest_notice_info = DB::table('contest_notice')
            ->where('contestID', $contestID)
            ->orderBy('uploadDate','desc')
            ->get();

        return $contest_notice_info;
    }
}
