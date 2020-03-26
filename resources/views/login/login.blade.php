<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登陆</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
    @if(session('msg'))
    <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
<form action="{{url('login/loginDo')}}" method="post" class="form-horizontal" role="form" >
    <h2>后台登陆系统</h2>
    @csrf

    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名字</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="firstname" name="admin_name"
                   placeholder="请输入">
            {{--<b style="color: red">{{$errors->first("admin_name")}}</b>--}}
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" id="lastname" name="admin_pwd"
                   placeholder="请输入">
            {{--<b style="color: red">{{$errors->first("admin_pwd")}}</b>--}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <input type="checkbox"   name="number">七天免登录
            {{--<b style="color: red">{{$errors->first("admin_pwd")}}</b>--}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-7">
            <button type="submit" class="form-control btn-primary">登陆</button>
        </div>
    </div>
</form>
</center>

</body>
</html>