<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>房屋添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
    <h2>房屋添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('area/index')}}">列表展示页面</a></button></h2>
<form action="{{url('area/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名字</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="firstname" name="name"
                   placeholder="请输入">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">导购人</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="lastname" name="man"
                   placeholder="请输入">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">手机号</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="lastname" name="tel"
                   placeholder="请输入">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">面积</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="lastname" name="mian"
                   placeholder="请输入">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">图片</label>
        <div class="col-sm-1">
            <input type="file"  id="lastname" name="logo">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">相册</label>
        <div class="col-sm-1">
            <input type="file"  id="lastname" name="images[]" multiple="multiple">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">售价</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="lastname" name="price"
                   placeholder="请输入">
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