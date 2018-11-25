<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc
 * Date: 2018-09-23
 * Time: 오후 5:42
 */
namespace App\Http\Controllers\Judge;

use App\Http\Controllers\Controller;
use App\Models\Problem;

class GetProblemDataController extends Controller{
    public function downloadData($problem_id, $dataset_id){

    }

    public function returnData($problem_id = null){
        if($problem_id == null){
            $problems = Problem::all(['id']);
            return response()->json($problems,200, [],JSON_PRETTY_PRINT);
        }
        else{
            if(is_int($problem_id)){
                $text_problem_id = (string)$problem_id;
                $dataset_path = storage_path('/dataset/'.$text_problem_id.'/');

                $filesInFolder = \File::files($dataset_path);
                foreach($filesInFolder as $path){
                    $file = pathinfo($path);
                }
            }else{
                abort(404,"Not Int Value");
            }
        }
    }
}
