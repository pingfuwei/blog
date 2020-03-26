<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>品牌添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{url('brand/create')}}">品牌添加</a></li>
                    <li><a href="{{url('brand/index')}}">品牌列表</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>
                    <h2>品牌添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('brand/index')}}">列表展示页面</a></button></h2>
                    <form action="{{url('brand/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">品牌名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="brand_name"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="brand_url"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">品牌图标</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" id="lastname" name="brand_logo"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">品牌介绍</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="brand_desc"
                                       placeholder="请输入">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" class="form-control btn-primary">添加</button>
                            </div>
                        </div>
                    </form>
                </center>

            </div>
        </div>
    </div>

@endsection

</body>
</html>