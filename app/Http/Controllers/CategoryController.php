<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Common
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_name=request()->cate_name;
//        dd($cate_name);
        $where=[];
        if($cate_name){
            $where[]=["cate_name","like","%$cate_name%"];
        }
            $Category=Category::where($where)->get();
            $Category=$this->getcateinfo($Category);

//        dd($Category);

//        dd($Category);
        return view("category.index",["Category"=>$Category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category=Category::get();
//        dd($Category);
        return view("Category.create",["Category"=>$Category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");
//        dd($data);
        $res=Category::insert($data);
//        dd($res);
        if($res){
            return redirect("category/index");
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
        $category_info=Category::get();
        $category=Category::find($id);
//        dd($Category);
        return view("category.edit",["category"=>$category,"category_info"=>$category_info]);
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
        $data=$request->except("_token");
        $res=Category::where("cate_id",$id)->update($data);
        if($res){
            return redirect("category/index");
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
        $res=Category::destroy($id);
        if($res){
            return redirect("category/index");
        }
    }
}
