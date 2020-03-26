@extends('layouts.index')
@section('title',"购物车")
@section('content')
    <header>
        <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>购物车</h1>
        </div>
    </header>
    <div class="head-top">
        <img src="/static/index/images/head.jpg" />
    </div><!--head-top/-->
    <table class="shoucangtab">
        <tr>
            <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$cratNum}}</strong>件商品</span></td>
            <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;">
                <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
            </td>
        </tr>
    </table>
    @foreach($cratInfo as $v)
    <div class="dingdanlist">
        <table>
            {{--<tr>--}}
                {{--<td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 全选</a></td>--}}
            {{--</tr>--}}
            <tr>
                <td width="4%"><input class="che" goods_id="{{$v->goods_id}}" type="checkbox" name="1" /></td>
                <td class="dingimg" width="15%"><img src="{{env("UPDATES_URL")}}{{$v->goods_img}}" /></td>
                <td width="50%">
                    <h3>{{$v->goods_name}}</h3>
                    {{--/<time>下单时间：2015-08-11  13:51</time>--}}
                </td>
                <td align="right">数量<input type="text"  value="{{$v->crat_num}}"  /></td>
            </tr>
            <tr>
                <th colspan="4" class="a">¥<strong class="orange">{{$v->is_hot==1 ? $v->goods_price/2*$v->crat_num : $v->goods_price*$v->crat_num}}</strong></th>
            </tr>
        </table>
    </div><!--dingdanlist/-->
    @endforeach

    <div class="height1"></div>
    <div class="gwcpiao">
        <table>
            <tr>
                <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
                <td width="50%">总计：<strong id="zong" class="orange">¥00.00</strong></td>
                <td width="40%"><a href="javascript:;" class="jiesuan">去结算</a></td>
            </tr>
        </table>
    </div><!--gwcpiao/-->

</div><!--maincont-->
    <script>
        $(function () {
            $(document).on("click",".che",function () {
//                alert(1)
                var _che = $(".che:checked");
                var goods_id = "";
                _che.each(function(index) {
                    goods_id += $(this).parents("tr").next("tr").find(".orange").text() + ","
                })
                goods_id = goods_id.substr(0, goods_id.length - 1)
                // console.log(goods_id);
                $.ajax({
                    url: "{{url('/getMoney')}}",
                    type: "get",
                    data: {
                        goods_id: goods_id
                    },
                    success: function(res) {
                        $("#zong").text("￥" + res);
                    }
                })
//                $("#zong").html(goods_id)
//                alert(_money)
            })
            $(document).on("click",".jiesuan",function () {
                {{--{{url('/pay')}}--}}
                var _che = $(".che:checked");
                var goods_id="";
                _che.each(function(index) {
                    goods_id += $(this).attr("goods_id") + ","
                })
                goods_id = goods_id.substr(0, goods_id.length - 1)
                // console.log(goods_id);
                $.ajax({
                    url: "{{url('/pay')}}",
                    type: "get",
                    data: {
                        goods_id: goods_id
                    },
                    success: function(res) {
//                        $("#zong").text("￥" + res);
//                        alert(res)
                        if(res==1111){
                            alert("确认结算成功")
                            location.href="{{url('/payDo')}}"
                        }
                    }
                })
//                alert(goods_id)
            })
        })
    </script>
@endsection