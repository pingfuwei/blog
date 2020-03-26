<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新闻添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
    <h2>新闻添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('xw/index')}}">列表展示页面</a></button></h2>
<form action="{{url('xw/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="firstname" name="x_bt"
                   placeholder="请输入">
            <b style="color: red">{{$errors->first("x_bt")}}</b>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">分类</label>
        <div class="col-sm-1">
            <select name="cate_id" id="">
                <option value="0">--请选择--</option>
                @foreach($category as $v)
                <option value="{{$v["cate_id"]}}">{!!str_repeat("&nbsp;&nbsp;",$v["leven"]*3) !!}{{$v["b_name"]}}</option>
                    @endforeach
            </select>
            {{--<b style="color: red">{{$errors->first("admin_pwd")}}</b>--}}
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">作者</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="lastname" name="x_man"
                   placeholder="请输入">
            {{--<b style="color: red">{{$errors->first("admin_tel")}}</b>--}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-7">
            <button type="submit" class="form-control btn-primary">添加</button>
        </div>
    </div>
</form>
</center>

</body>
</html>