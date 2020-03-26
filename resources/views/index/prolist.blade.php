@extends('layouts.index')
@section('title',"所有商品")
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <form action="#" method="get" class="prosearch"><input type="text" /></form>
      </div>
     </header>
     <ul class="pro-select">
      <li class="pro-selCur"><a href="javascript:;">新品</a></li>
      <li><a href="javascript:;">销量</a></li>
      <li><a href="javascript:;">价格</a></li>
     </ul><!--pro-select/-->
     <div class="prolist">
      @foreach($goods as $v)
      <dl>
       <dt><a href="{{url('/proinfo',["id"=>$v->goods_id])}}"><img src="{{env("UPDATES_URL")}}{{$v->goods_img}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="{{url('/proinfo',["id"=>$v->goods_id])}}">{{$v->goods_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->is_hot==1 ? $v->goods_price/2 : $v->goods_price}}</strong> <span>{{$v->is_hot==1 ? "¥".$v->goods_price : ""}}</span></div>

       </dd>
       <div class="clearfix"></div>
      </dl>
      @endforeach
     </div><!--prolist/-->
     @include("index.public.bottom")
@endsection