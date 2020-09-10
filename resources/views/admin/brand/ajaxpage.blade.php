@foreach($res as $k=>$v)
          <tr brand_id="{{$v->brand_id}}">
            <td id="danxuan"><input type="checkbox"  name="id" value="{{$v->brand_id}}"></td>
            <td>{{$v->brand_id}}</td>
            <td brand_name="brand_name" name="{{$v->brand_name}}">
                <span class="name_a">{{$v->brand_name}}</span>
                <input type="text" class="name_s" value="{{$v->brand_name}}" style="display:none">
            </td>
            <td><img src="{{$v->brand_log}}" with="60" height="60"></td>
            <td brand_name="brand_url" name="{{$v->brand_url}}">
                <span class="name_a">{{$v->brand_url}}</span>
                <input type="text" class="name_s" value="{{$v->brand_url}}" style="display:none">
            </td>
            <td>{{$v->brand_desc}}</td>
            <td>
                <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="layui-btn">修改</a>
                <a href="JavaScript:;" brand_id="{{$v->brand_id}}" class="layui-btn layui-btn-danger san">删除</a>
            </td>
          </tr>
        @endforeach
          <tr>
            <td colspan="6">
                {{$res->appends($data)->links('vendor.pagination.adminshop')}}
            </td>
          </tr>