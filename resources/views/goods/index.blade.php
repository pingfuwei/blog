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
                    <li ><a href="{{url('goods/create')}}">管理员添加</a></li>
                    <li class="active"><a href="{{url('goods/index')}}">管理员列表</a></li>
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>
                    <table class="table table-striped" style="text-align: center">
                        <h2>列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('goods/create')}}">添加页面</a></button></h2>
                        <form>
                            <input type="text" name="goods_name">
                            <input type="submit" value="搜索">
                        </form>
                        <thead>
                        <tr>
                            <th style="text-align: center">名称</th>
                            <th style="text-align: center">售价</th>
                            <th style="text-align: center">货号</th>
                            <th style="text-align: center">库存</th>
                            <th style="text-align: center">图片</th>
                            <th style="text-align: center">相册</th>
                            <th style="text-align: center">介绍</th>
                            <th style="text-align: center">积分</th>
                            <th style="text-align: center">是否上架</th>
                            <th style="text-align: center">是否新品</th>
                            <th style="text-align: center">是否热卖</th>
                            <th style="text-align: center">品牌</th>
                            <th style="text-align: center">分类</th>
                            <th style="text-align: center">操作</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($goods as $v)
                            <tr>
                                <td>{{$v->goods_name}}</td>
                                <td>{{$v->goods_price}}</td>
                                <td>{{$v->goods_huo}}</td>
                                <td>{{$v->goods_num}}</td>
                                <td>
                                    <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$v->goods_img}}" alt="">
                                </td>
                                <td>
                                    @if($v->goods_imgs)
                                        @php $images=explode("|",$v->goods_imgs) @endphp
                                        @foreach($images as $vv)
                                            <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$vv}}" alt="">
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{$v->goods_desc}}</td>
                                <td>{{$v->goods_score}}</td>
                                <td>{{$v->is_show==1 ? "√" : "×"}}</td>
                                <td>{{$v->is_new==1 ? "√" : "×"}}</td>
                                <td>{{$v->is_hot==1 ? "√" : "×"}}</td>
                                <td>{{$v->brand_name}}</td>
                                <td>{{$v->cate_name}}</td>

                                <td>
                                    <button type="button" goods_id="{{$v->goods_id}}" class="btn btn-primary btn-sm">编辑</button>
                                    <button type="button" goods_id="{{$v->goods_id}}"  class="btn btn-danger btn-sm">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">{{$goods->appends(["goods_name"=>$goods_name])->links()}}</td>
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
                    var id=_this.attr("goods_id");
                    location.href="{{url('goods/destroy')}}/"+id;
                }
            })
            $(document).on("click",".btn-primary",function () {
                if(confirm("是否编辑")){
                    var _this=$(this);
                    var id=_this.attr("goods_id");
                    location.href="{{url('goods/edit')}}/"+id;
                }
            })
        })

</script>
{{--<a href="{{url('brand/destroy',['id'=>$v->brand_id])}}">删除</a>--}}