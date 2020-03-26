<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="{{url('goods')}}" method="post">
    {{csrf_field()}}
    <input type="text" name="nam" value="">
    @csrf
<input type="submit" value="提交">
</form>
</body>
</html>