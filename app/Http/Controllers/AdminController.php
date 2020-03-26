<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Admin::get();
        return view("admin.index",["admin"=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
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
                "admin_name"=>[
                    'regex:/^[\x{u400}-\x{9fa5}\w]{2,16}$/u',
                    'unique:admin',
                ],
                "admin_pwd"=>"regex:/^\w{6,}$/",
                "admin_you"=>"regex:/^\d{10}@qq\.com$/",
                "admin_tel"=>"regex:/^1[3,5,8]\d{9}$/",
        ],[
            "admin_name.regex"=>"中文数字字母下划线2-16",
            "admin_name.unique"=>"已存在",
            "admin_pwd.regex"=>"必须是数字最少6位",
            "admin_you.regex"=>"不合法",
            "admin_tel.regex"=>"不合法",
        ]);
        $data=$request->except("_token");

        if($request->hasFile("admin_logo")){
            $data["admin_logo"]=$this->updates("admin_logo");
        }
//        dd($data);
        $data["admin_pwd"]=encrypt($data["admin_pwd"]);
//        dd($data);
        $res=Admin::insert($data);
        if($res){
            return redirect("admin/index");
        }
    }
    //文件上传
    public function updates($logo){
        $logo=request()->file("$logo");
        if(!$logo){
            return;
        }
        if($logo->isValid()){
            $photo=$logo->store("photo");
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
        $data=Admin::find($id);
        return view("admin/edit",["data"=>$data]);
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
            "admin_name"=>[
                'regex:/^[\x{u400}-\x{9fa5}\w]{2,16}$/u',
                Rule::unique("admin")->ignore($id,"admin_id"),
            ],
            "admin_pwd"=>"regex:/^\w{6,}$/",
            "admin_you"=>"regex:/^\d{10}@qq\.com$/",
            "admin_tel"=>"regex:/^1[3,5,8]\d{9}$/",
        ],[
            "admin_name.regex"=>"中文数字字母下划线2-16",
            "admin_name.unique"=>"已存在",
            "admin_pwd.regex"=>"必须是数字最少6位",
            "admin_you.regex"=>"不合法",
            "admin_tel.regex"=>"不合法",
        ]);
        $data= $request->except("_token");
        if($request->hasFile("admin_logo")){
            $data["admin_logo"]=$this->updates("admin_logo");
        }
        $info=Admin::find($id);
//        dd($admininfo);
        if($data["admin_pwd"]==$info["admin_pwd"]){
            $data=$data;
        }else{
            $data["admin_pwd"]=encrypt($data["admin_pwd"]);
        }

//        dd($data);
        $res=Admin::where("admin_id",$id)->update($data);
        if($res!==false){
            return redirect("admin/index");
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
        $res=Admin::destroy($id);
        if($res){
            return redirect("admin/index");
        }
    }
}
