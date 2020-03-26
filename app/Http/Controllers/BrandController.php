<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $brand=DB::table('brand')->get();
          $brand=Brand::orderby("brand_id","desc")->paginate(3);
//        dd($brand);
        return view('brand.index',["brand"=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *表单页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");
//        dd($data);
        if($request->hasFile('brand_logo')){
            $data["brand_logo"]=$this->updates("brand_logo");
        }
//        $brand=new Brand;
//        $brand->brand_name=$request->brand_name;
////        $brand->brand_logo=$request->brand_logo;
//        $brand->brand_url=$request->brand_url;
//        $brand->brand_desc=$request->brand_desc;
//        $res=$brand->save();
        $res=Brand::insert($data);
//        dd($res);
//        $res=DB::table("brand")->insert($data);
        if($res){
            return redirect('brand/index');
        }
    }
    //文件上传 封装
    public function updates($logo)
    {
        if(request()->file($logo)->isValid()){
            $photo = request()->file($logo);
            $photo = $photo->store('photo');
            return $photo;
        }
    }

    /**
     * Display the specified resource.
     *试图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *修改展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $brand_info=DB::table("brand")->where("brand_id",$id)->first();
        $brand_info=Brand::find($id);
        return view("brand.edit",["brand_info"=>$brand_info]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->except("_token");
        if($request->hasFile('brand_logo')){
            $data["brand_logo"]=$this->updates("brand_logo");
        }
//        $res=DB::table("brand")->where("brand_id",$id)->update($data);
//          $brand=new Brand;
//        $brand->brand_name=$request->brand_name;
////        $brand->brand_logo=$request->brand_logo;
//        $brand->brand_url=$request->brand_url;
//        $brand->brand_desc=$request->brand_desc;
//        $res=$brand->save();
        $res=Brand::where("brand_id",$id)->update($data);
//        dd($res);
        if($res!==false){
            return redirect("brand/index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $res=DB::table("brand")->where("brand_id",$id)->delete();
        $res=Brand::destroy($id);
//        dd($res);

        if($res==1){
            return redirect("brand/index");
        }
    }
}
