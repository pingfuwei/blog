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
    <form method="get">
        标题<input type="text" name="x_bt">
        <input type="submit" value="搜索">
    </form>
    <h2>列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('xw/create')}}">添加页面</a></button></h2>
    <thead>
    <tr>
        <th style="text-align: center">标题</th>
        <th style="text-align: center">作者</th>
        <th style="text-align: center">时间</th>
        <th style="text-align: center">分类</th>
        <th style="text-align: center">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($xw as $v)
    <tr>
        <td>{{$v->x_bt}}</td>
        <td>{{$v->x_man}}</td>
        <td>{{date("Y-m-d H:i:s",$v->x_time)}}</td>
        <td>国际新闻</td>
        <td>
            <button type="button" brand_id="{{$v->brand_id}}" class="btn btn-primary btn-sm">编辑</button>
            <button type="button" brand_id="{{$v->brand_id}}"  class="btn btn-danger btn-sm">删除</button>
        </td>
    </tr>
        @endforeach
    <tr>
        <td colspan="5">{{$xw->appends($x_bt)->links()}}</td>
    </tr>

    </tbody>
</table>
</center>
</body>
</html>
<script src="/jquery.js"></script>
<script>
        $(function () {
            //无限刷新
            $(document).on("click",".pagination a",function () {
                var url=$(this).attr("href");
                $.get(url,function (index) {
                    $(".table").html(index);
                })
                return false;
            })
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