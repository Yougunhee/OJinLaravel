<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContestListPageController extends Controller{
    private $defaultPageSize = 10;
    public function contestArrayResult($page_number, $contest_per_page){
        $total_contest_row_num = DB::table('contest')->count();
        $offset = $page_number * $contest_per_page;
        $contests = DB::table('contest_with_winner')
            ->skip($offset)
            ->take($contest_per_page)
            ->get();
        if($contests->count() == 0){
            //index 넘버가 넘어감
            abort(404, "Index Error");
        }
        $max_page_num = floor($total_contest_row_num/$contest_per_page);
        $result_compact = compact('contests', 'max_page_num');
        return $result_compact;
    }

    public function pageInit($current_page = 0){
        $result = $this->contestArrayResult($current_page, $this->defaultPageSize);
        $result['max_page_num']++;
        return view('contest_list')->with('data', $result)
            ->with('page', $current_page+1)->with('now', Carbon::now());
    }
}
