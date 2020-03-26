<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\StoreBlogPost;
use Illuminate\Validation\Rule;
use Validator;
use App\Goods;
use App\Category;
use App\Brand;
class GoodsController extends Common
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $goods_name=\request()->goods_name;
//        dump($goods_name);
        $where=[];
        if($goods_name){
            $where[]=["goods_name","like","%$goods_name%"];
        }
        $goods=Goods::where($where)->orderby("goods_id","desc")->join("category","category.cate_id","=","goods.cate_id")->join("brand","brand.brand_id","=","goods.brand_id")->paginate(2);
        return view("goods.index",["goods"=>$goods,"goods_name"=>$goods_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //分类查找
        $cate=Category::all();
        $cate=$this->getcateinfo($cate);
//        dd($cate);
        //品牌的查找
        $brand=Brand::all();
        return view("goods.create",["cate"=>$cate,"brand"=>$brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
//    public function store(StoreBlogPost $request)
    {
//        $request->validate([
//            "goods_name"=>"required|unique:goods|max:20",
//            "goods_price"=>"required",
//        ],[
//            "goods_name.required"=>"商品名称必填",
//            "goods_name.unique"=>"商品名称已存在",
//            "goods_name.max"=>"商品名称最大20",
//            "goods_price.required"=>"商品售价必须填",
//        ]);
        $data=$request->except("_token");

        $validator = Validator::make($data,
            [
                "goods_name"=>[
                    'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                    'unique:goods',
                ],
                "goods_price"=>"required|numeric",
                "goods_num"=>"required|max:8",
                "cate_id"=>"required",
                "brand_id"=>"required",
            ],[
                "goods_name.regex"=>"商品名称必填商品名称最小2商品名称最大20字母数字中文",
                "goods_name.unique"=>"商品名称已存在",
                "goods_price.required"=>"商品售价必须填",
                "goods_price.numeric"=>"售价必须是数字",
                "goods_num.required"=>"库存不能为空",
                "goods_num.max"=>"库存长度不能大于8",
                "cate_id.required"=>"分类必填",
                "brand_id.required"=>"品牌必填",
        ]);
        if ($validator->fails()) {
            return redirect('goods/create')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile("goods_img")){
            $data["goods_img"]=$this->img("goods_img");
        }
        if($request->hasFile("goods_imgs")){
            $data["goods_imgs"]=$this->imgs("goods_imgs");
            $data["goods_imgs"]=implode("|",$data["goods_imgs"]);
        }
//        dd($data);
        $res=Goods::insert($data);
//        dd($res);
        if($res){
            return redirect("goods/index");
        }
    }
    public function img($img){
        $file=request()->$img;
//        dd($file);
        if($file->isValid()){
            $photo=$file->store("photo");
            return $photo;
        }
    }
    public function imgs($img){
        $file=request()->$img;
        foreach ($file as $k=>$v){
            if($v->isValid()){
                $photo[$k]=$v->store("photo");
            }
        }
        return $photo;
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
        //分类查找
        $cate=Category::all();
        $cate=$this->getcateinfo($cate);
//        dd($cate);
        //品牌的查找
        $brand=Brand::all();

        $goodsInfo=Goods::find($id);
//        dd($goodsInfo);
        return view("goods.edit",["cate"=>$cate,"brand"=>$brand,"goodsInfo"=>$goodsInfo]);
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
            "goods_name"=>[
                'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                Rule::unique('goods')->ignore($id,'goods_id'),
            ],
            "goods_price"=>"required|numeric",
            "goods_num"=>"required|max:8",
            "cate_id"=>"required",
            "brand_id"=>"required",
        ],[
            "goods_name.regex"=>"商品名称必填商品名称最小2商品名称最大20字母数字中文",
            "goods_name.unique"=>"商品名称已存在",
            "goods_price.required"=>"商品售价必须填",
            "goods_price.numeric"=>"售价必须是数字",
            "goods_num.required"=>"库存不能为空",
            "goods_num.max"=>"库存长度不能大于8",
            "cate_id.required"=>"分类必填",
            "brand_id.required"=>"品牌必填",
        ]);
        $data=$request->except("_token");
//        dd($data);

        if($request->hasFile("goods_img")){
            $data["goods_img"]=$this->img("goods_img");
        }
        if($request->hasFile("goods_imgs")){
            $data["goods_imgs"]=$this->imgs("goods_imgs");
            $data["goods_imgs"]=implode("|",$data["goods_imgs"]);
        }
        $res=Goods::where("goods_id",$id)->update($data);
        if($res!==false){
            return redirect("goods/index");
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
//        echo $id;
        $res=Goods::destroy($id);
        if($res){
            return redirect("goods/index");
        }
    }
}
