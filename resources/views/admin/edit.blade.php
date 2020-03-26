<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员修改</title>
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
                    <li  ><a href="{{url('admin/create')}}">管理员添加</a></li>
                    <li><a href="{{url('admin/index')}}">管理员列表</a></li>
                    <li class="active"><a href="{{url('admin/index')}}">管理员修改</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">
                <center>
                    <h2>管理员修改<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('admin/index')}}">列表展示页面</a></button></h2>
                    <form action="{{url('admin/update',["id"=>$data->admin_id])}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="admin_name"
                                       value="{{$data->admin_name}}">
                                <b style="color: red">{{$errors->first("admin_name")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="lastname" name="admin_pwd"
                                       value="{{$data->admin_pwd}}">
                                <b style="color: red">{{$errors->first("admin_pwd")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">手机号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="admin_tel"
                                       value="{{$data->admin_tel}}">
                                <b style="color: red">{{$errors->first("admin_tel")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="admin_you"
                                       value="{{$data->admin_you}}">
                                <b style="color: red">{{$errors->first("admin_you")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">图片</label>
                            <div class="col-sm-1">
                                <input type="file"  id="lastname" name="admin_logo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" class="form-control btn-primary">修改</button>
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