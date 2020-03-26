<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view("login.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginDo()
    {
        $data=\request()->except("_token");
//        dd($data);
        $res=Admin::where("admin_name",$data["admin_name"])->first();
//        dd($res);
        if(decrypt($res->admin_pwd)==$data["admin_pwd"]){
            session(["name"=>$res]);
            session(["admin_name"=>$res["admin_name"]]);
//            dd(session("admin_name"));
            if(isset($data["number"])){
                Cookie::queue("admin_user",$res,7*24*60);
            }
            return redirect("login/index");
        }
            return redirect("/login/login")->with("msg","账号或密码错误");
    }
    public function index(){
        $names=session('name');
        $admin_name=Admin::find($names["admin_id"]);
//        dd($admin_name);
        return view("zym.index",["admin_name"=>$admin_name]);
    }
    public function quit(){
//        session("name",null);
//        session("admin_name",null);
//        dd(\request()->session()->flush());
        if(\request()->session()->flush()===null){
            return redirect("login/login");
        }

    }

}
