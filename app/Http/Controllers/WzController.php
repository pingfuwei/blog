<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use App\Wz;
use App\Category;
class WzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分类查找
        $cate=Category::all();

        $names=\request()->names;
        $cate_id=\request()->cate_id;
//        dump(names);
        $where=[];
        if($names){
            $where[]=["w_biao","like","%$names%"];
        }
        if($cate_id){
            $where[]=["wz.cate_id","=",$cate_id];
        }

        $wz=Wz::where($where)->join("category","wz.cate_id","=","category.cate_id")->paginate(2);
        $query=\request()->all();
//        dd($query);
            return view("wz.index",["wz"=>$wz,"query"=>$query,"cate_id"=>$cate_id,"cate"=>$cate]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Category::all();
        return view("wz.create",["cate"=>$cate]);
    }
    public function aja(){
        $data=\request()->_var;
        $res=Wz::where("w_biao",$data)->first();
        if($res){
            return "no";
        }else{
            return "ok";
        }
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
            "w_biao"=>[
                'regex:/^[\x{4e00}-\x{9fa5}\w]{1,}$/u',
                'unique:wz',
            ],
            "cate_id"=>"required",
            "w_zy"=>"required",
            "w_show"=>"required",
        ],[
            "w_biao.unique"=>"标题已存在",
            "w_biao.regex"=>"标题不合法",
            "cate_id.required"=>"分类必填",
            "w_zy.required"=>"重要必选",
            "w_show.required"=>"显示必选",
//            "goods_name.max"=>"商品名称最大20",
//            "goods_price.required"=>"商品售价必须填",
        ]);
        $data=$request->except("_token");
        if($request->hasFile('w_logo')){
            $data["w_logo"]=$this->updates("w_logo");
        }
//        dd($data);
        $res=Wz::insert($data);
        if($res){
            return redirect("wz/index");
        }
//        dd($data);
    }
    public function updates($img){
        $file=request()->$img;
//        dd($file);
        if($file->isValid()){
            $photo=$file->store("photo");
            return $photo;
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //分类查找
        $cate=Category::all();
        $wz=Wz::find($id);
//        dd($goodsInfo);
        return view("wz.edit",["cate"=>$cate,"wz"=>$wz]);
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
        $request->validate([
            "w_biao"=>[
                'regex:/^[\x{4e00}-\x{9fa5}\w]{1,}$/u',
                Rule::unique('wz')->ignore($id,'w_id'),
            ],
            "cate_id"=>"required",
            "w_zy"=>"required",
            "w_show"=>"required",
        ],[
            "w_biao.unique"=>"标题已存在",
            "w_biao.regex"=>"标题不合法",
            "cate_id.required"=>"分类必填",
            "w_zy.required"=>"重要必选",
            "w_show.required"=>"显示必选",
//            "goods_name.max"=>"商品名称最大20",
//            "goods_price.required"=>"商品售价必须填",
        ]);
        $data=$request->except("_token");
        if($request->hasFile('w_logo')){
            $data["w_logo"]=$this->updates("w_logo");
        }
        $res=Wz::where("w_id",$id)->update($data);
        if($res!==false){
            return redirect("wz/index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Wz::destroy($id);
        if($res){
            return redirect("wz/index");
        }
    }
}
