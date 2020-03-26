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
<center>
<table class="table table-striped" style="text-align: center">
    <h2>列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('area/create')}}">添加页面</a></button></h2>
    <thead>
    <tr>
        <th style="text-align: center">名称</th>
        <th style="text-align: center">导购人</th>
        <th style="text-align: center">手机号</th>
        <th style="text-align: center">面积</th>
        <th style="text-align: center">图片</th>
        <th style="text-align: center">相册</th>
        <th style="text-align: center">售价</th>
        <th style="text-align: center">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($brand as $v)
    <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->man}}</td>
        <td>{{$v->tel}}</td>
        <td>{{$v->mian}}</td>
        <td>
            <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$v->logo}}" alt="">
        </td>
        <td>
            @if($v->images)
                @php $images=explode("|",$v->images) @endphp
            @foreach($images as $vv)
            <img width="35" height="35" src="{{env("UPDATES_URL")}}{{$vv}}" alt="">
                @endforeach
                @endif
        </td>
        <td>{{$v->price}}</td>
        <td>
            <button type="button" brand_id="{{$v->brand_id}}" class="btn btn-primary btn-sm">编辑</button>
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