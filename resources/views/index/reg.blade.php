@extends('layouts.index')
@section('title',"注册")
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/regDo')}}" method="post" class="reg-login">
         @if(session('msg'))
             <div class="alert alert-danger">{{session('msg')}}</div>
         @endif
         @csrf
      <h3>已经有账号了？点此<a class="orange" href="{{url('/login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" id="a" name="_tel" placeholder="输入手机号码或者邮箱号" /></div>
       <div class="lrList2"><input type="text" name="yzm" placeholder="输入短信验证码" />
           <b style="color: red">{{$errors->first("msg")}}</b>
           <button type="button"><span class="dyButton" id="span_tel">获取</span></button></div>
       <div class="lrList"><input type="text" name="pas" placeholder="设置新密码（6-18位数字或字母）" /></div>
       <div class="lrList"><input type="text" name="pass" placeholder="再次输入密码" /></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     @include("index.public.bottom")
     <script>
         $(function () {
             $("button").click(function () {
                var names=$("#a").val();
//                alert(names);
                 $("#span_tel").text("30s");
                 $("#span_tel").css("pointer-events", "none")
                 _t = setInterval(timess, 1000);
                 var str=/^1[3|5|7]\d{9}$/
                 var srr=/^\d{10}@qq\.com$/
                 if(str.test(names)){
                     $.ajax({
                         url:"{{url('/ajatel')}}",
                         type:"get",
                         data:{names:names},
                         success:function (res) {
                            alert(res);
                         }
                     })
                     return
                 }
                 if(srr.test(names)){
                     $.ajax({
                         url:"{{url('/ajaemail')}}",
                         type:"get",
                         data:{names:names},
                         success:function (res) {
                             alert(res);
                         }
                     })
                     return
                 }
                 alert("请输入正确的手机号或邮箱")
                 return
             })
             function timess() {
                 var _ss = $("#span_tel").text();
                 _ss = parseInt(_ss);
//                  alert(_ss)
                 if (_ss <= 0) {
                     $("#span_tel").text("获取");
                     clearInterval(_t);
                     $("#span_tel").css("pointer-events", "ouat")
                 } else {
                     _ss = _ss - 1;
                     $("#span_tel").text(_ss + "s");
                     $("#span_tel").css("pointer-events", "none")
                 }
             }
         })
     </script>
@endsection
