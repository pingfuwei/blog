@extends('layouts.index')
@section('title',"首页")
@section('content')
    <div class="head-top">
        <img src="/static/index/images/head.jpg" />
        <dl>
            <dt><a href="user.html"><img src="/static/index/images/touxiang.jpg" /></a></dt>
            <dd>
                <h1 class="username">三级分销终身荣誉会员</h1>
                <ul>
                    <li><a href="prolist.blade.php"><strong>34</strong><p>全部商品</p></a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li>
                    <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
                    <div class="clearfix"></div>
                </ul>
            </dd>
            <div class="clearfix"></div>
        </dl>
    </div><!--head-top/-->
    <form action="#" method="get" class="search">
        <input type="text" class="seaText fl" />
        <input type="submit" value="搜索" class="seaSub fr" />
    </form><!--search/-->
    @if(session("user"))
        <ul class="reg-login-click">
            <li><a>{{session("user._tel")}}</a></li>
            <li><a href="{{url('/regdele')}}" class="rlbg">退出</a></li>
            <div class="clearfix"></div>
        </ul><!--reg-login-click/-->
        @else
    <ul class="reg-login-click">
        <li><a href="{{url('/login')}}">登录</a></li>
        <li><a href="{{url('/reg')}}" class="rlbg">注册</a></li>
        <div class="clearfix"></div>
    </ul><!--reg-login-click/-->
    @endif
    <div id="sliderA" class="slider">
        {{--<img src="/static/index/images/image1.jpg" />--}}
        @foreach($show as $v)
        <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$v->goods_img}}"  alt="">
            @endforeach
    </div><!--sliderA/-->
    <ul class="pronav">
        <li><a href="prolist.blade.php">晋恩干红</a></li>
        <li><a href="prolist.blade.php">万能手链</a></li>
        <li><a href="prolist.blade.php">高级手镯</a></li>
        <li><a href="prolist.blade.php">特异戒指</a></li>
        <div class="clearfix"></div>
    </ul><!--pronav/-->
    <div class="index-pro1">
        @foreach($is_new as $v)
            <div class="index-pro1-list">
                <dl>
                    <dt><a href="{{url('/proinfo',["id"=>$v->goods_id])}}"><img  src="{{env("UPDATES_URL")}}{{$v->goods_img}}" alt="">
                        </a></dt>
                    <dd class="ip-text"><a href="{{url('/proinfo',["id"=>$v->goods_id])}}">{{$v->goods_name}}</a><span>已售：488</span></dd>
                    <dd class="ip-price"><strong>¥{{$v->goods_price}}</strong>  </dd>
                </dl>
            </div>
        @endforeach

        <div class="clearfix"></div>
    </div><!--index-pro1/-->
    <div class="prolist">
        @foreach($is_hot as $v)
        <dl>
            <dt><a href="{{url('/proinfo',["id"=>$v->goods_id])}}"><img  src="{{env("UPDATES_URL")}}{{$v->goods_img}}" alt=""></a></dt>
            <dd>
                <h3><a href="{{url('/proinfo',["id"=>$v->goods_id])}}">{{$v->goods_name}}</a></h3>
                <div class="prolist-price"><strong>¥{{$v->goods_price/2}}</strong> <span>¥{{$v->goods_price}}</span></div>
                <div class="prolist-yishou"><span>5.0折</span> <em>已售：35</em></div>
            </dd>
            <div class="clearfix"></div>
        </dl>
        @endforeach
    </div><!--prolist/-->
    <div class="joins"><a href="fenxiao.html"><img src="/static/index/images/jrwm.jpg" /></a></div>
    <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
        @include("index.public.bottom")
@endsection