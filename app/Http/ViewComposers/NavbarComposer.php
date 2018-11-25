<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc
 * Date: 2018-09-30
 * Time: 오후 2:32
 */

namespace App\Http\ViewComposers;


use App\Models\Contest;
use Carbon\Carbon;
use Illuminate\View\View;

class NavbarComposer
{
    public function compose(View $view){

        $now = Carbon::now();
        //현재 열린 대회 정보
        $currentContest = Contest::getModel()
            ->where('startTime','<=',$now)
            ->where('endTime','>=',$now)
            ->get(['title','id']);
        $view->with('navbar_contest_info', $currentContest);
    }
}
