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
                    <li ><a href="{{url('wz/create')}}">文章添加</a></li>
                    <li class="active"><a href="{{url('wz/index')}}">文章列表</a></li>
                    {{--<li><a href="{{url('goods/edit')}}">商品修改</a></li>--}}
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">
                <center>

                    <table class="table table-striped" style="text-align: center">
                        <h2>品牌列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('wz/create')}}">添加页面</a></button></h2>
                        <form>
                            {{--@if($query["cate_name"])--}}
                            {{--{{$a=$query["cate_name"]}}--}}
                            {{--@endif--}}
                            标题<input type="text" name="names" value="{{($query["names"])??""}}">
                            分类<select name="cate_id" id="bb">
                                <option value="">请选择</option>
                                @foreach($cate as $v)
                                    <option value="{{$v->cate_id}}" {{$v->cate_id==$cate_id? "selected" : ""}}>{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="搜索">
                        </form>
                        <thead>
                        <tr>
                            <th style="text-align: center">标题</th>
                            <th style="text-align: center">分类</th>
                            <th style="text-align: center">重要</th>
                            <th style="text-align: center">是否显示</th>
                            <th style="text-align: center">作者</th>
                            <th style="text-align: center">邮箱</th>
                            <th style="text-align: center">关键字</th>
                            <th style="text-align: center">介绍</th>
                            <th style="text-align: center">图片</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($wz as $v)
                            <tr>
                                <td>{{$v->w_biao}}</td>
                                <td>{{$v->cate_name}}</td>
                                <td>{{$v->w_zy==1 ? "重要" : "置顶"}}</td>
                                <td>{{$v->w_show==1 ? "√" : "×"}}</td>
                                <td>{{$v->w_man}}</td>
                                <td>{{$v->w_you}}</td>
                                <td>{{$v->w_gjz}}</td>
                                <td>{{$v->w_desc}}</td>
                                <td><img width="50" height="50" src="{{env("UPDATES_URL")}}{{$v->w_logo}}" alt=""></td>
                                <td>
                                    <button type="button" w_id="{{$v->w_id}}" class="btn btn-primary btn-sm">编辑</button>
                                    <button type="button" w_id="{{$v->w_id}}"  class="btn btn-danger btn-sm">删除</button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$wz->appends($query)->links()}}
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
                    var id=_this.attr("w_id");
                    location.href="{{url('wz/destroy')}}/"+id;
                }
            })
            $(document).on("click",".btn-primary",function () {
                if(confirm("是否编辑")){
                    var _this=$(this);
                    var id=_this.attr("w_id");
                    location.href="{{url('wz/edit')}}/"+id;
                }
            })
        })

</script>
{{--<a href="{{url('brand/destroy',['id'=>$v->brand_id])}}">删除</a>--}}