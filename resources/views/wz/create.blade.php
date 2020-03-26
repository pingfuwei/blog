<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章添加</title>
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
                    <li class="active"><a href="{{url('wz/create')}}">文章添加</a></li>
                    <li><a href="{{url('wz/index')}}">文章列表</a></li>
                    {{--<li><a href="{{url('goods/edit')}}">商品修改</a></li>--}}
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">
                <center>
                    <h2>文章添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('wz/index')}}">列表展示页面</a></button></h2>
                    <form action="{{url('wz/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">文章标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="bt" name="w_biao">
                                {{--<input type="text" name="www">--}}
                                <b style="color: red">{{$errors->first("w_biao")}}</b>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">文章分类</label>
                            <div class="col-sm-1">
                                <select name="cate_id" id="bb">
                                    <option value="">请选择</option>
                                    @foreach($cate as $v)
                                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
                                <b style="color: red">{{$errors->first("cate_id")}}</b>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">文章重要性</label>
                            <div class="col-sm-1">
                                <input type="radio"  class="cc"  name="w_zy" value="1">重要
                                <input type="radio"  class="cc"  name="w_zy" value="2">置顶
                                <b style="color: red">{{$errors->first("w_zy")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-1">
                                <input type="radio"  class="dd"  name="w_show" value="1">是
                                <input type="radio"  class="dd"  name="w_show" value="2">否
                                <b style="color: red">{{$errors->first("w_show")}}</b>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">文章作者</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="w_man"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">作者email</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="w_you"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">关键字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="w_gjz"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">网页描述</label>
                            <div class="col-sm-7">
                                <textarea name="w_desc" class="form-control" id="firstname" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">上传文件</label>
                            <div class="col-sm-1">
                                <input type="file"  id="firstname" name="w_logo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" id="tj" class="form-control btn-primary">添加</button>
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
{{--<script src="/jquery.js"></script>--}}
{{--<script>--}}
    {{--$(function () {--}}
        {{--$(document).on("blur","#bt",function () {--}}
            {{--var _var=$(this).val();--}}
            {{--var str=/^[\u4E00-\u9FA5a-zA-Z0-9]{1,}$/;--}}
            {{--if(_var==""){--}}
                {{--alert("标题不能为空")--}}
            {{--}else if(!str.test(_var)){--}}
                {{--alert("不合法")--}}
            {{--}else{--}}
                {{--$.ajax({--}}
                    {{--url:"{{url('wz/aja')}}",--}}
                    {{--type:"get",--}}
                    {{--data:{_var:_var},--}}
                    {{--success:function (res) {--}}
                        {{--if(res!="ok"){--}}
                            {{--alert("已存在")--}}
                            {{--$("#bt").val("");--}}
                        {{--}--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}

        {{--})--}}
        {{--$(document).on("click","#tj",function () {--}}
{{--//            alert($(this).val());--}}
            {{--if($("#bb").val()==0){--}}
                {{--alert("分类必选")--}}

            {{--}--}}
{{--//            alert($("#cc:checked"))--}}
            {{--if(!$(".cc").prop("checked")){--}}
                {{--alert("文章重要性必选")--}}

            {{--}--}}
            {{--if(!$(".dd").prop("checked")){--}}
                {{--alert("是否显示必选")--}}
                {{--return false;--}}

            {{--}--}}

        {{--})--}}
    {{--})--}}
{{--</script>--}}