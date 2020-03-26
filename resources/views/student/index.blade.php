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
    <h2>品牌列表展示 <button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('student/create')}}">添加页面</a></button></h2>
    <thead>
    <tr>
        <th style="text-align: center">名字</th>
        <th style="text-align: center">性别</th>
        <th style="text-align: center">班级</th>
        <th style="text-align: center">操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($student as $v)
    <tr>
        <td>{{$v->name}}</td>
        <td>{{$v->sex==1 ? "男" : "女"}}</td>
        <td>{{$v->b_id==1 ? "上海" : "北京"}}</td>
        <td><button type="button"  class="btn btn-primary btn-sm">编辑</button>
            <button type="button"   class="btn btn-danger btn-sm">删除</button>
        </td>
    </tr>
        @endforeach
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
                    {{--location.href="{{url('brand/destroy')}}/"+id;--}}
                }
            })
        })

</script>
{{--<a href="{{url('brand/destroy',['id'=>$v->brand_id])}}">删除</a>--}}