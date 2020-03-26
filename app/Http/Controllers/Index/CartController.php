<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use App\libs\alipay\wappay\service\AlipayTradeService;
use Illuminate\Http\Request;
use App\Crat;
use App\Goods;
use App\Order;
use App\Region;
use App\Addres;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *添加购物车
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        $SESSIONInfo=session("user");
//        dd($SESSIONInfo);
        if($SESSIONInfo==null){
            echo 11;die;
        }

        $data=\request()->all();
//        dd($data);
        $data["user_id"]=$SESSIONInfo["user_id"];
        $where=[
            ["goods_id","=",$data["goods_id"]],
            ["user_id","=",$SESSIONInfo["user_id"]],
        ];
        $crat=Crat::where($where)->first();
        $goods=Goods::where("goods_id",$data["goods_id"])->first();
//        dd($goods["goods_id"]);
        if($data["crat_num"]>$goods["goods_num"]){
            echo "222";die;
        }
        if($data["crat_num"]+$crat["crat_num"]>$goods["goods_num"]){
            $cratNum=$goods["goods_num"];
        }else{
            $cratNum=$crat['crat_num']+$data["crat_num"];
        }
        if($crat){
            $res=Crat::where("goods_id",$data["goods_id"])->update(["crat_num"=>$cratNum]);
        }else{
            $res=Crat::insert($data);
        }
        echo $res;
//        dd($res);
//        if($res){
//            return redirect("/cartList");
//        }
    }
    public function cartList()
    {
        $cratNum=Crat::count();
        $cratInfo=Crat::join("goods","goods.goods_id","=","crat.goods_id")->get();
//        dd($cratInfo);/
        return view("index.cart",["cratNum"=>$cratNum,"cratInfo"=>$cratInfo]);
    }
    public function getMoney(){
        $goods_id=\request()->goods_id;
        $goods_id=explode(",",$goods_id);
//        dd($goods_id);
        $money=array_sum($goods_id);
        echo $money;
    }
    //订单添加
    public function pay(){
        $goods_i=\request()->goods_id;
        $goods_id=explode(",",$goods_i);
//                dd();
//        dd($goods_i);
        $id=$goods_id[0];
//        $data=1;
//        dd($data);
//        dd($res);
        $SESSIONInfo=session("user");
//        dd($SESSIONInfo["user_id"]);
//        $goods=[];
        foreach ($goods_id as $k=>$v){
//            $goods["user_id"]=$SESSIONInfo["user_id"];
            $goods[]=Crat::where("goods_id",$v)->first();
            $where=[
                ["goods_id","=",$id],
                ["user_id","=",$SESSIONInfo["user_id"]],
            ];
            if(substr_count($goods_i,",")>0){
                $res=Order::where($where)->delete();

            }
//            dd($v);
//            $orderInfo=Order::where("goods_id",$data)->get();
//            dd($orderInfo);
            foreach ($goods as $k=>$v){
                $data["goods_id"]=$v["goods_id"];
                $data["goods_name"]=$v["goods_name"];
                $data["goods_price"]=$v["goods_price"];
                $data["crat_num"]=$v["crat_num"];
                $data["user_id"]=$SESSIONInfo["user_id"];
                $res=Order::insert($data);

//                $res=Order::destroy("$orderInfo");
//                dd($orderInfo[$k]["goods_id"]);
            }
        }
//        dd($goods);

//        dd($res);
        if($res){
            echo 1111;
        }

    }
    //提交订单
    public function payDo(){
        $orderInfo=Order::join("goods","order.goods_id","=","goods.goods_id")->select("order.goods_id","order.goods_price","order.goods_name","order.crat_num","order.user_id","order.order_id","goods.goods_img","goods.is_hot")->get();
//        dd($orderInfo);
        foreach ($orderInfo as $k=>$v){
//            dd($v["goods_price"]);
            if($v["is_hot"]==1){
                $ordprice=$v["goods_price"].",";
            }
//            $ordprice.=$v["goods_price"].",";
        }
        $price=substr($ordprice,0, strlen($ordprice)- 1);
//        dd($price);
        $ordprice=explode(",",$ordprice);
//        dd($price);
        $ordprice=array_sum($ordprice);
//        dd($ordprice);

        $price="";
        foreach ($orderInfo as $k=>$v){
//            dd($v["goods_price"]);
            $price.=$v["goods_price"].",";
        }
        $price=substr($price,0, strlen($price)- 1);
//        dd($price);
        $price=explode(",",$price);
//        dd($price);
        $price=array_sum($price);
//        dd($price);
//        dd($orderInfo);
        $addres="";
        $addres=Addres::where("mr",1)->first();
//        dd($addres);
        $sf=Addres::join("region","addres.sf","=","region.id")->where("mr",1)->select("name")->get();
        foreach ($sf as $k=>$v){
            $addres["sf"]=$v["name"];
        }
        $qx=Addres::join("region","addres.qx","=","region.id")->where("mr",1)->select("name")->get();
        foreach ($qx as $k=>$v){
            $addres["qx"]=$v["name"];
        }
        $xx=Addres::join("region","addres.xx","=","region.id")->where("mr",1)->select("name")->get();
        foreach ($xx as $k=>$v){
            $addres["xx"]=$v["name"];
        }
//            $data=$addres["names"];
//        dd($addres);
        return view("index.pay",["orderInfo"=>$orderInfo,"price"=>$price,"ordprice"=>$ordprice,"addres"=>$addres]);
    }
    //我的
    public function wd(){
        return view("index.wd");
    }
    //收货地址管理
    public function address(){
        $region=Region::where("pid",0)->get();
//        dd($region);
        return view("index.address",["region"=>$region]);
    }
    //地区ajax
    public function addresAja(){
        $id=\request()->id;
        return $region=Region::where("pid",$id)->get();
//        echo $id;
    }
    //收获地址执行添加
    public function addressDo(){
        $data=\request()->except("_token");
        $res=Addres::insert($data);
        if($res){
            return redirect("/addaddres");
        }
//        dd($res);
    }
    public function addaddres(){

        $addres=Addres::get();
//        $sf="";
        $sf=Addres::join("region","addres.sf","=","region.id")->select("name")->get();
        foreach ($sf as $k=>$v){
            $addres[$k]["sf"]=$v["name"];
        }
//        dd($addres);
//        $sf=$sf
//        dd($sf->name);
        $qx=Addres::join("region","addres.qx","=","region.id")->select("name")->get();
        foreach ($qx as $k=>$v){
            $addres[$k]["qx"]=$v["name"];
        }
        $xx=Addres::join("region","addres.xx","=","region.id")->select("name")->get();
        foreach ($xx as $k=>$v){
            $addres[$k]["xx"]=$v["name"];
        }
//        dd($qx);
        return view("index.addaddress",["addres"=>$addres,"sf"=>$sf,"qx"=>$qx,"xx"=>$xx]);
    }
    /**
     *支付接口
     */
    public function alipay($id, Request $request)
    {

//        dd(intval($id));
        $order=Order::wherein("order_id",[$id])->count();
        $orderInfo=Order::get();
        $ordprice="";
          foreach ($orderInfo as $k=>$v) {
                  $ordprice .= $v["goods_price"] . ",";
          }
        $price=substr($ordprice,0, strlen($ordprice)- 1);
//        dd($ordprice);
        $ordprice=explode(",",$ordprice);
        $ordprice=array_sum($ordprice);
//        dd($ordprice);
        require_once app_path('/libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('/libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
//        $oo=new \App\libs\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder();
//        dd($oo);
        $config=config("alipay");
        if (!empty($order) && trim($order) != "") {
//        $aa="aa";
//        $bb="45454";
//        if (!empty($bb) && trim($bb) != "") {
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = 454;

            //订单名称，必填
            $subject ="商城";

            //付款金额，必填
            $total_amount = $ordprice;

            //商品描述，可空
            $body = 45454;

            //超时时间
            $timeout_express = "1m";
//            \libs\alipay\wappay\buildermodel
            $payRequestBuilder = new \App\libs\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);

            $payResponse = new \App\libs\alipay\wappay\service\AlipayTradeService($config);
            $result = $payResponse->wapPay($payRequestBuilder, $config['return_url'], $config['notify_url']);
            return;

        }
    }

    /**
     *支付同步回调接口，在config/alipay.php的return_url参数进行配置

     */
    public function return_url() {
        require_once app_path('/libs/alipay/wappay/service/AlipayTradeService.php');
        $config=config("alipay");
        $arr=$_GET;
        $alipaySevice = new \App\libs\alipay\wappay\service\AlipayTradeService($config);
        $result = $alipaySevice->check($arr);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

//            删除支付的订单

            //商户订单号

            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
            //支付宝交易号
            $trade_no = htmlspecialchars($_GET['trade_no']);
            echo "支付成功<br />外部订单号：".$out_trade_no;
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "验证失败";
        }
    }

    /**
     *支付异步回调接口，在config/alipay.php的notify_url参数进行配置
     */
    public function notify_url() {
            Log::info("测试支付宝支付");die;
    }
}
