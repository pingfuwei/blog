<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>分类添加</title>
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
                    <li class="active"><a href="{{url('Category/create')}}">分类添加</a></li>
                    <li><a href="{{url('category/index')}}">分类列表</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>
                    <h2>分类添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('category/index')}}">列表展示页面</a></button></h2>
                    <form action="{{url('category/store')}}" method="post" class="form-horizontal" role="form" >
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">分类名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="cate_name"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-1">
                                <input type="radio"  id="lastname" value="1" name="cate_show">是
                                <input type="radio"  id="lastname" value="2" name="cate_show">否
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">是否在导航显示</label>
                            <div class="col-sm-1">
                                <input type="radio"  id="lastname" value="1" name="cate_nav_show">是
                                <input type="radio"  id="lastname" value="2" name="cate_nav_show">否
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">分类</label>
                            <div class="col-sm-1">
                                <select name="pid" id="">
                                    <option value="">顶级</option>
                                    @foreach($Category as $v)
                                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
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