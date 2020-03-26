@extends('layouts.index')
@section('title',"所有商品")
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
         @foreach($goods as $v)
             @if($v->goods_imgs)
                 @php $images=explode("|",$v->goods_imgs) @endphp
                 @foreach($images as $vv)
                     <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$vv}}" alt="">
                 @endforeach
             @endif
{{--      <img src="{{env('UPDATES_URL')}}{{$v['goods_img']}}" />--}}

     </div><!--sliderA/-->
     <input type="hidden" id="goods_id" value="{{$v->goods_id}}">
     <table class="jia-len">
      <tr>
       <th>¥<strong class="orange" id="goods_price">{{$v->is_hot==1 ? $v->goods_price/2 : $v->goods_price}}</strong></th>
       <td>
        购买数量<input type="text" value="1"   class="spinnerExample" />
           浏览量:{{$liunum}}
       </td>
      </tr>
      <tr>
       <td>
        <strong id="goods_name">{{$v->goods_name}}</strong>
        {{--<p class="hui">富含纤维素，平衡每日膳食</p>--}}
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     {{--<h3 class="proTitle">商品规格</h3>--}}
     {{--<ul class="guige">--}}
      {{--<li class="guigeCur"><a href="javascript:;">50ML</a></li>--}}
      {{--<li><a href="javascript:;">100ML</a></li>--}}
      {{--<li><a href="javascript:;">150ML</a></li>--}}
      {{--<li><a href="javascript:;">200ML</a></li>--}}
      {{--<li><a href="javascript:;">300ML</a></li>--}}
      {{--<div class="clearfix"></div>--}}
     {{--</ul><!--guige/-->--}}
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>
      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      {{$v->goods_desc}}
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
         @endforeach
      <tr>
       <th>
        <a href="/"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="javascript:;" id="cartA">加入购物车</a></td>
      </tr>
     </table>
     <script>
         $(function () {
             $(document).on("click","#cartA",function () {
                 var goods_id=$("#goods_id").val()
                 var goods_name=$("#goods_name").text()
                 var goods_price=$("#goods_price").text()
                 var crat_num= $(".spinnerExample").val()
//                 alert(goods_num)
                 $.ajax({
                     url:"{{url('/cart')}}",
                     type:"get",
                     data:{goods_id:goods_id,goods_name:goods_name,goods_price:goods_price,crat_num:crat_num},
                     success:function (res) {
//                         console.log(res);return
                         if(res==222){
                             alert("超出库存");
                         }
                         if(res==1){
                             alert("加入成功")
                             location.href="{{url('/cartList')}}"
                         }else if(res==11){
                             alert("请先登录")
                             location.href="{{url('/login')}}"
                         }

                     }
                 })
             })
         })
     </script>
@endsection