@extends('layouts.index')
@section('title',"收货地址管理")
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>收货地址</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url('/addressDo')}}" method="post" class="reg-login">
         @csrf
      <div class="lrBox">
       <div class="lrList"><input type="text" name="names" placeholder="收货人" /></div>
       <div class="lrList"><input type="text" placeholder="详细地址" /></div>

        <select class="province" name="sf">
         <option value="">省份/直辖市</option>
            @foreach($region as $v)
            <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
        </select>

        <select class="province" name="qx">
         <option>区县</option>
        </select>

        <select class="province" name="xx">
         <option>详细地址</option>
        </select>
       <div class="lrList"><input type="text" name="sj" placeholder="手机" /></div>
          <div class="lrList2"><input type="hidden" class="mr" value="2" name="mr" placeholder="设为默认地址" /> <a class="a">设为默认</a></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="保存" />
      </div>
     </form><!--reg-login/-->
     @include("index.public.bottom")
     <script>
         $(function () {
             $(document).on("change",".province",function () {
                 var _this=$(this)
                 _this.nextAll("select").html("<option value=''>请选择</option>")
                 var id = _this.val();
//                 alert(id)

                 $.ajax({
                     url: "{{url('/addresAja')}}",
                     type: "get",
                     data: {
                         id: id
                     },
                     dataType: "json",
                     success: function(res) {
                         // console.log(res.font)
                         var _option = "<option value=''>请选择</option>";
                         for (var i in res) {
                             _option += "<option value='" + res[i]["id"] + "'>" + res[i]["name"] + "</option>"
                         }
                         _this.next("select").html(_option);
                     }
                 })
//                 alert(_this);
             })
             $(document).on("click",".a",function () {
                    $(".mr").val(1);
             })
         })
     </script>
     @endsection