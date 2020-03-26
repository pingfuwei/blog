
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
        <td colspan="5">{{$xw->links()}}</td>
    </tr>

    </tbody>
</table>