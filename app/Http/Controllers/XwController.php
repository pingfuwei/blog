<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Xw;
use Illuminate\Support\Facades\Redis;
class XwController extends Common
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if($x_bt){
//            $x_bt=Redis::get("x_bt");
//        }
//        if(strlen($x_bt)>4){
////            $x_bt=Redis::get("x_bt");
//            $x_bt=unserialize($x_bt);
//        }else{
//            $x_bt=Xw::where("x_bt",$x_bt)->first();
//            $x_bt=serialize($x_bt);
//            $x_bt=Redis::setex("x_bt",60*5,$x_bt);
//        }
//        echo  encrypt(123123);
        //全局辅助函数session存
//        session(["name"=>"哈喽"]);
        //request存session
//        \request()->session()->put("aa",222);
        //删除session
//        session(["name"=>null]);
        //删除某一个session
//        \request()->session()->forget("aa");
        //删除所有session
//            \request()->session()->flush();
        //取session
//        echo session("name");

        //取出所有session
//        dump(\request()->session()->all());
        $category=[
            ["pid"=>0,"cate_id"=>1,"b_name"=>"国际新闻"],
            ["pid"=>0,"cate_id"=>2,"b_name"=>"世界新闻"],
            ["pid"=>0,"cate_id"=>3,"b_name"=>"搜狐新闻"],
            ["pid"=>1,"cate_id"=>4,"b_name"=>"国际新闻111"],
            ["pid"=>2,"cate_id"=>5,"b_name"=>"世界新闻111"],
            ["pid"=>3,"cate_id"=>6,"b_name"=>"搜狐新闻111"],
        ];
//        dd($category[4]["cate_id"]);
//        Redis::flushall();die;
        $x_bt=\request()->x_bt;
        $page=\request()->page??1;
        if($x_bt){
            $where=[
                ["x_bt","like","%$x_bt%"],
            ];
        }else{
            $where=[];
        }
        $xw=Redis::get("xw_".$page.$x_bt);
//        dd($xw);

        if(!$xw){
            echo 11;
            $xw=Xw::where($where)->paginate(2);
            $xw=serialize($xw);
            Redis::setex("xw_".$page.$x_bt,60*5,$xw);
        }
//        dd($xw);
//        if(!$xw===true){
            $xw=unserialize($xw);
//        }
        if(\request()->ajax()){
            return view("xw.aj",["xw"=>$xw,"category"=>$category,"x_bt"=>$x_bt]);
        }
        return view("xw.index",["xw"=>$xw,"category"=>$category,"x_bt"=>$x_bt]);
    }

    /**
     * Show the form for creating a new resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=[
            ["pid"=>0,"cate_id"=>1,"b_name"=>"国际新闻"],
            ["pid"=>0,"cate_id"=>2,"b_name"=>"世界新闻"],
            ["pid"=>0,"cate_id"=>3,"b_name"=>"搜狐新闻"],
            ["pid"=>1,"cate_id"=>4,"b_name"=>"国际新闻111"],
            ["pid"=>2,"cate_id"=>5,"b_name"=>"世界新闻111"],
            ["pid"=>3,"cate_id"=>6,"b_name"=>"搜狐新闻111"],
        ];
        $category=$this->getcateinfo($category);
//        dd($category);
        return view("xw.create",["category"=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "x_bt"=>[
                "required",
                "unique:xw",
                "regex:/^[\x{4e00}-\x{9fa5}\w]{2,30}$/u",
            ],
        ],[
            "x_bt.required"=>"标题必填",
            "x_bt.unique"=>"标题已存在",
            "x_bt.regex"=>"标题不合法",
        ]);
        $data=$request->except("_token");
        $data["x_time"]=time();
        $res=Xw::insert($data);
        if($res){
            return redirect("xw/index");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
