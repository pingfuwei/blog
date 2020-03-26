@extends('layouts.index')
@section('title',"提交订单")
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <div class="dingdanlist" onClick="window.location.href='address.blade.php'">
      <table>
       <tr>
        <td class="dingimg" width="75%" colspan="2">新增收货地址</td>
        {{--<td align="right"><img src="/static/index/images/jian-new.png" /></td>--}}
           <td>{{$addres['names'] }}{{$addres['sj']}}{{$addres['sf']}}{{$addres['qx']}}{{$addres['xx']}}</td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>

       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">支付方式</td>
        <td align="right"><span class="hui">支付宝</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">优惠券</td>
        <td align="right"><span class="hui">无</span></td>
       </tr>
       <tr><td colspan="3" style="height:10px; background:#efefef;padding:0;"></td></tr>

       <tr><td colspan="3" style="height:10px; background:#fff;padding:0;"></td></tr>
       <tr>
        <td class="dingimg" width="75%" colspan="3">商品清单</td>
       </tr>
       @foreach($orderInfo as $v)
       <tr>
        <input type="text" class="order_id" order_id="{{$v->order_id}}">
        <td class="dingimg" width="15%"><img src="{{env("UPDATES_URL")}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         {{--<time>下单时间：2015-08-11  13:51</time>--}}
        </td>
        <td align="right">数量：<span class="qingdan">{{$v->crat_num}}</span></td>
       </tr>
          @endforeach
       <tr>
        <th colspan="3"><strong class="orange">¥{{$price}}</strong></th>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">商品金额</td>
        <td align="right"><strong class="orange">¥{{$price}}</strong></td>
       </tr>
       <tr>
        <td class="dingimg" width="75%" colspan="2">折扣优惠</td>
        <td align="right"><strong class="green">¥{{$ordprice}}</strong></td>
       </tr>


      </table>
     </div><!--dingdanlist/-->
     
     
    </div><!--content/-->
    
    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥{{$price}}</strong></td>
       <td width="40%"><a href="javascript:;" class="jiesuan">提交订单</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
     <script>
      $(function () {
           $(document).on("click",".jiesuan",function () {
//               alert(1)
               var _this=$(this)
               var order_id=""
               $(".order_id").each(function (res) {
                  order_id +=parseInt($(this).attr("order_id"))+",";
               })
               order_id = order_id.substr(0, order_id.length - 1)
//               order_id=parseInt(order_id);
               location.href="{{url('/alipay')}}/"+order_id
               {{--$.ajax({--}}
                   {{--url: "{{url('/alipay')}}",--}}
                   {{--type: "get",--}}
                   {{--data: {--}}
                       {{--order_id: order_id--}}
                   {{--},--}}
                   {{--success: function(res) {--}}
{{--//                        $("#zong").text("￥" + res);--}}
                        {{--alert(res)--}}
                       {{--if(res==1111){--}}
                           {{--alert("确认结算成功")--}}
                           {{--location.href="{{url('/payDo')}}"--}}
                       {{--}--}}
                   {{--}--}}
               {{--})--}}
//                 console.log(order_id);
           })
      })
     </script>
@endsection