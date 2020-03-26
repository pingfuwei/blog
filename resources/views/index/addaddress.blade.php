@extends('layouts.index')
@section('title',"收货地址管理")
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><a href="address.html" class="hui"><strong class="">+</strong> 新增收货地址</a></td>
       <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;"><a href="javascript:;" class="orange">删除信息</a></td>
      </tr>
     </table>
     @foreach($addres as $v)
     <div class="dingdanlist" onClick="window.location.href='proinfo.html'">
      <table>
       <tr>
        <td width="50%">
         <h3>{{$v->names}} {{$v->sj}}</h3>
         <time>
             {{--@foreach($sf as $k=>$v)--}}
                 {{--@if ($smarty.foreach.$sf.iteration<1)--}}
                 {{--{{$v['name']}}--}}
                 {{--@endif--}}
                 {{--@endforeach--}}
                 {{--@foreach($qx as $k=>$v)--}}
                     {{--{{$v['name']}}--}}
                 {{--@endforeach--}}
                 {{--@foreach($xx as $k=>$v)--}}
                     {{--{{$v['name']}}--}}
                 {{--@endforeach--}}
             {{$v->sf}}
             {{$v->qx}}{{$v->xx}}
         </time>
        </td>
        <td align="right"><a href="address.html" class="hui"><span class="glyphicon glyphicon-check"></span> 修改信息</a></td>
       </tr>
      </table>
     </div><!--dingdanlist/-->
     @endforeach
     @include("index.public.bottom")

@endsection