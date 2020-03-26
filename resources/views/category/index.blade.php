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
                    <li ><a href="{{url('Category/create')}}">分类添加</a></li>
                    <li class="active"><a href="{{url('category/index')}}">分类列表</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>

                    <table class="table table-striped" >
                        <h2>分类列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('Category/create')}}">添加页面</a></button></h2>
                        <form method="post">
                            @csrf
                            名称<input type="text" name="cate_name" ><input type="submit" value="搜索">
                        </form>
                        <thead>
                        <tr>
                            <th style="text-align: center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名称</th>
                            <th style="text-align: center">是否显示</th>
                            <th style="text-align: center">是否在导航显示</th>
                            <th style="text-align: center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Category as $v)
                            <tr style="text-align: center">
                                <td>
                                    {!!str_repeat("&nbsp;&nbsp;",$v["leven"]*6)!!}
                                    @if($v["pid"]==0)
                                        <font style="color: red">{{$v->cate_name}}</font>
                                    @elseif($v["leven"]==2)
                                        <font style="color: blue">{{$v->cate_name}}</font>
                                    @else
                                        {{$v->cate_name}}
                                    @endif
                                </td>
                                <td>{{$v->cate_show==1 ? "√" : "×"}}</td>
                                <td>{{$v->cate_nav_show==1 ? "√" : "×"}}</td>
                                <td><a href="{{url("category/edit",["id"=>$v->cate_id])}}"><button type="button"  class="btn btn-primary btn-sm">编辑</button></a>
                                    <button type="button" cate_id="{{$v->cate_id}}"  class="btn btn-danger btn-sm">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        {{--<tr>--}}
                        {{--<td colspan="5">{{$Category->appends($cate_name)->links()}}</td>--}}
                        {{--</tr>--}}

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
                    var id=_this.attr("cate_id");
                    location.href="{{url('category/destroy')}}/"+id;
                }
            })

        })

</script>
{{--<a href="{{url('brand/destroy',['id'=>$v->brand_id])}}">删除</a>--}}