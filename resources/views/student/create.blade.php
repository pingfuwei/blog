<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>品牌添加</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
    <h2>品牌添加<button style="float: right" type="button" class="btn btn-info btn-sm"><a href="{{url('student/index')}}">列表展示页面</a></button></h2>
<form action="{{url('student/store')}}" method="post" class="form-horizontal" role="form" >
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名字</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="firstname" name="name"
                   placeholder="请输入">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">性别</label>
        <div class="col-sm-7">
            <input type="radio"  id="lastname"  name="sex" value="1">男
            <input type="radio"  id="lastname"  name="sex" value="2">女
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">班级</label>
        <div class="col-sm-7">
            <select name="b_id" id="lastname" class="form-control">
                <option value="1">上海</option>
                <option value="2">北京</option>
                <option value="3">天津</option>
                <option value="4">石家庄</option>
            </select>
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