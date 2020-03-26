<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class Common extends Controller
{

    function getcateinfo($Category,$pid=0,$leven=1){
        // dump($fu);
        static $info=[];
        foreach($Category as $v){
            if($v["pid"]==$pid){
                // dump($v);
                $v["leven"]=$leven;
                $info[]=$v;
                $this->getcateinfo($Category,$v["cate_id"],$v["leven"]+1);
            }

        }
        return $info;
    }


}
