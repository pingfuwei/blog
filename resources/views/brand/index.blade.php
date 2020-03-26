<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 条纹表格</title>
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
                    <li ><a href="{{url('brand/create')}}">品牌添加</a></li>
                    <li class="active"><a href="{{url('brand/index')}}">品牌列表</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>
                    <table class="table table-striped" style="text-align: center">
                        <h2>品牌列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('brand/create')}}">添加页面</a></button></h2>
                        <thead>
                        <tr>
                            <th style="text-align: center">名称</th>
                            <th style="text-align: center">网址</th>
                            <th style="text-align: center">logo</th>
                            <th style="text-align: center">介绍</th>
                            <th style="text-align: center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brand as $v)
                            <tr>
                                <td>{{$v->brand_name}}</td>
                                <td>{{$v->brand_url}}</td>
                                <td>
                                    <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$v->brand_logo}}" alt="">
                                </td>
                                <td>{{$v->brand_desc}}</td>
                                <td><button type="button" brand_id="{{$v->brand_id}}" class="btn btn-primary btn-sm">编辑</button>
                                    <button type="button" brand_id="{{$v->brand_id}}"  class="btn btn-danger btn-sm">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">{{$brand->links()}}</td>
                        </tr>

                        </tbody>
                    </table>
                </center>
            </div>
        </div>
    </div>

@endsection

</body>
</html>
<script src="/jquery.js"></script>
<script>
        $(function () {
            $(document).on("click",".btn-danger",function () {
                if(confirm("是否删除")){
                    var _this=$(this);
                    var id=_this.attr("brand_id");
                    location.href="{{url('brand/destroy')}}/"+id;
                }
            })
            $(document).on("click",".btn-primary",function () {
                if(confirm("是否编辑")){
                    var _this=$(this);
                    var id=_this.attr("brand_id");
                    location.href="{{url('brand/edit')}}/"+id;
                }
            })
        })

</script>
{{--<a href="{{url('brand/destroy',['id'=>$v->brand_id])}}">删除</a>--}}