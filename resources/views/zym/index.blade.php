<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 一个简单的网页</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>
{{--{{dd(request()->route()->getAction()["uses"])}}--}}
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: #00b0e8">平富威的后台管理系统</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="test">
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\AdminController@create")
                    <li style="background: gold"><a href="{{url('admin/create')}}">管理员模块</a></li>
                @else
                    <li ><a href="{{url('admin/create')}}">管理员模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\BrandController@create")
                    <li style="background: gold"><a href="{{url('brand/create')}}">品牌模块</a></li>
                @else
                    <li><a href="{{url('brand/create')}}">品牌模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\CategoryController@create")
                    <li style="background:gold"><a href="{{url('Category/create')}}">分类模块</a></li>
                @else
                    <li ><a href="{{url('Category/create')}}">分类模块</a></li>
                @endif
                @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\GoodsController@create")
                    <li style="background: gold"><a href="{{url('goods/create')}}">商品模块</a></li>
                @else
                    <li ><a href="{{url('goods/create')}}">商品模块</a></li>
                @endif
                    @if(request()->route()->getAction()["uses"]=="App\Http\Controllers\WzController@create")
                        <li style="background: gold"><a href="{{url('wz/create')}}">文章模块</a></li>
                    @else
                        <li ><a href="{{url('wz/create')}}">文章模块</a></li>
                    @endif
            </ul>
            <img src="/8.jpg" width="50" height="50" style="float: right" alt="">
            <font style="padding-top: 15px;float: right;color: #ffffff">欢迎<b style="color: gold;">{{$admin_name->admin_name}}</b>登陆后台系统</font>
            <font style="padding-top: 15px;float: right;color: #ffffff">---<a href="{{url('login/quit')}}" style="color: red">退出</a>---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">

        <div class="col-sm-8" style="height: 500px;margin-left: 210px;">
                <img src="/9.jpg" alt="">
    </div>
</div>
</div>

</body>
</html>
