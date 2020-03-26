<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商品添加</title>
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
                    <li class="active"><a href="{{url('goods/create')}}">商品添加</a></li>
                    <li><a href="{{url('goods/index')}}">商品列表</a></li>
                    {{--<li><a href="{{url('goods/edit')}}">商品修改</a></li>--}}
                </ul>
                <hr class="hidden-sm hidden-md hidden-lg">
            </div>
            <div class="col-sm-8" style="float: right">

                <center>
                    <h2>商品添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('goods/index')}}">列表展示页面</a></button></h2>
                    <form action="{{url('goods/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">名字</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="a" name="goods_name"
                                       placeholder="请输入">
                                <b style="color: red">{{$errors->first("goods_name")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">货号</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="firstname" name="goods_huo"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">售价</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="goods_price"
                                       placeholder="请输入">
                                <b style="color: red">{{$errors->first("goods_price")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">库存</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="goods_num"
                                       placeholder="请输入">
                                <b style="color: red">{{$errors->first("goods_num")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">图片</label>
                            <div class="col-sm-1">
                                <input type="file"  id="lastname" name="goods_img" placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">相册</label>
                            <div class="col-sm-1">
                                <input type="file"  id="lastname" name="goods_imgs[]" multiple="multiple">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">介绍</label>
                            <div class="col-sm-1">

                                <input type="text"  id="lastname" name="goods_desc">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">积分</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lastname" name="goods_score"
                                       placeholder="请输入">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">是否精品</label>
                            <div class="col-sm-1">
                                <input type="radio" value="1" name="is_new">是
                                <input type="radio" value="2" name="is_new">否
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">是否热卖</label>
                            <div class="col-sm-1">
                                <input type="radio" value="1" name="is_hot">是
                                <input type="radio" value="2" name="is_hot">否
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-1">
                                <input type="radio" value="1" name="is_show">是
                                <input type="radio" value="2" name="is_show">否
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">分类</label>
                            <div class="col-sm-1">
                                <select name="cate_id" id="">
                                    <option value="">--请选择--</option>
                                    @foreach($cate as $v)
                                        <option value="{{$v->cate_id}}" >{!!str_repeat("&nbsp;",$v["leven"]*6)!!}{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
                                <b style="color: red">{{$errors->first("cate_id")}}</b>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">品牌</label>
                            <div class="col-sm-1">
                                <select name="brand_id" id="">
                                    <option value="">--请选择--</option>
                                    @foreach($brand as $v)
                                        <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                    @endforeach
                                </select>
                                <b style="color: red">{{$errors->first("brand_id")}}</b>
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
<script src="/jquery.js"></script>
<script>
    $(function () {
        $(document).on("blur","#a",function () {
            var _this=$(this)
            var _val=_this.val();
            var str=/^[\u4E00-\u9FA5a-zA-Z0-9]{2,50}$/;
            if(_val==""){
                alert("商品名称必填")
            }else if(!str.test(_val)){
                alert("必须是中文")
            }
        })
    })
</script>