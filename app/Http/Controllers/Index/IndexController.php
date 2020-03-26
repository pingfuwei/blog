<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login;
use App\Goods;
//手机验证码
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
//邮箱验证码
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    //首页
   public function index(){

//       Redis::flushall();
//       Cache::forget("is_show");
//       Cache::forget("is_new");
//       Cache::forget("is_hot");
       $show=Redis::get("is_show");
       $is_new=Redis::get("is_new");
       $is_hot=Redis::get("is_hot");
//       $show=Cache::get("is_show");
//       $is_new=Cache::get("is_new");
//       $is_hot=Cache::get("is_hot");
//       dump($show);
//       dump($is_new);
//       dd($is_hot);
       if(!$show&&!$is_hot&&!$is_new){
           $show=Goods::where("is_show",1)->limit(5)->get();
           $is_new=Goods::where("is_new",1)->limit(8)->get();
           $is_hot=Goods::where("is_hot",1)->limit(3)->get();
           $show=serialize($show);
           $is_new=serialize($is_new);
           $is_hot=serialize($is_hot);
           $show=Redis::set("is_show",$show);
           $is_new=Redis::set("is_new",$is_new);
           $is_hot=Redis::set("is_hot",$is_hot);
       }
       $show=unserialize($show);
       $is_new=unserialize($is_new);
       $is_hot=unserialize($is_hot);
       //       dd($show);
       return view("index.index",["show"=>$show,"is_new"=>$is_new,"is_hot"=>$is_hot]);
   }
   //登陆
   public function login(){
       return view("index.login");
   }
    //登陆执行
    public function loginDo(){
        $data=\request()->except("_token");
//        dd($data);
        //手机号登陆
//        if(strlen($data["names"])==11){
        echo 11;
            $res=Login::where("_tel",$data["names"])->first();
            if($res){
                if(decrypt($res->pas)!=$data["pas"]){
                    return redirect("/login")->with("msg","手机号或密码错误");
                }else{
//                    $aa=["_tel"=>$res->_tel,"user_id"=>$res->user_id];
                    session(["user"=>$res]);
                    return redirect("/");
                }
            }else{
                return redirect("/login")->with("msg","手机号或密码错误");
            }
//        }
    }
   //注册
    public function reg(){
        return view("index.reg");
    }
    //注册执行
    public function regDo(){
        $telYzm= session("telYzm");
        $data=\request()->except("_token");
//        dd($data);
        if($data["yzm"]!=$telYzm){
            return redirect("/reg")->with("msg","验证码不一致");
        }
        if($data["pas"]==""&&$data["pass"]==""){
            return redirect("/reg")->with("msg","密码不能为空");
        }
        if($data["pas"]!=$data["pass"]){
            return redirect("/reg")->with("msg","密码不一致");
        }
        $user=User::where("_tel",$data["_tel"])->first();
        if($user){
            return redirect("/reg")->with("msg","此手机号已注册");
        }
//        dd($data);
        $data["pas"]=encrypt($data["pas"]);
        $data["pass"]=encrypt($data["pass"]);
        $res=User::insert($data);
//        dd($res);
        if($res){
            return redirect("login");
        }
    }
    //手机号ajax
    public function ajatel(){
        $data=\request()->names;
        $str="/^1[3|5|7]\d{9}$/";
        if(!preg_match($str,$data)){
            return "输入有效的手机号";
        }
        $code=rand(000000,999999);
        $aa=$this->sendtel($data,$code);
//        echo $code;
//        dump($aa);
        if($aa["Message"]=="OK"){
            session(["telYzm"=>$code]);
            return "发送成功";
        }
    }
    //发送短信
    public function sendtel($data,$code){
// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

        AlibabaCloud::accessKeyClient('LTAI4Fu4kKi7G3Z5rcVKT3iP', 'CFWXLRoSeiUT01sI2IEgsMyUmxgtrJ')
            ->regionId('cn-hangzhou')
            ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => "$data",
                        'SignName' => "开心超市",
                        'TemplateCode' => "SMS_183266632",
                        'TemplateParam' => "{code:$code}",
                    ],
                ])
                ->request();
            return ($result->toArray());
        } catch (ClientException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        }

    }
    //邮箱的ajax
    public function ajaemail(){
        $data=\request()->names;
        $srr="/^\d{10}@qq\.com$/";
        if(!preg_match($srr,$data)){
            return "请输入正确的邮箱";
        }
        $code=rand(000000,999999);
        Mail::to($data)->send(new SendEmail($code));
        session(["telYzm"=>$code]);
        return "发送成功";
    }
    //邮箱发送验证码
    public function sendEmail($data,$code){

    }
    //退出
    public function regdele(){
        $a=session(["user"=>null]);
//        dd($a);
        if($a===null){
            return redirect("/login");
        }

    }
    //所有商品展示
    public function prolist(){
        $goods=Goods::get();
//        dd($goods);
        return view("index.prolist",["goods"=>$goods]);
    }
    //商品详情
    public function proinfo($id){
//        $liunum= cache::add("liunum_".$id,1)? cache::get("liunum_".$id) : cache::increment("liunum_".$id);
        $liunum=Redis::setnx("liunu".$id,1)?Redis::get("liunu".$id):Redis::incr("liunu".$id);
        $goods=Goods::where("goods_id",$id)->get();
//        dd($goods);
        return view("index.proinfo",["goods"=>$goods,"liunum"=>$liunum]);
    }
}
