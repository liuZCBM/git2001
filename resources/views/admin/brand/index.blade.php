@extends('admin.lay.left')
@section('content')
  
  <table class="layui-table">
    <colgroup>
      <col width="150">
      <col width="150">
      <col width="200">
      <col>
    </colgroup>
    <div>
    <form action="" method="">
      <input type="text" name="brand_name" placeholder="品牌名" value="{{$data['brand_name']??''}}" style='padding:0.15em; width:220px; height:31px;'>
      <input type="text" name="brand_url" placeholder="品牌url"  value="{{$data['brand_url']??''}}" style='padding:0.15em; width:220px; height:31px;'>
      <input type="submit" class="layui-btn" value="搜索">
      </form>
    </div>
      
    <thead>
      <tr>
        <th width="6%" id="quanxuan">全选<input type="checkbox" ></th>
        <th>品牌id</th>
        <th>品牌名字</th>
        <th>品牌logo</th>
        <th>品牌url</th>
        <th>品牌介绍</th>
        <th>操作  &nbsp; &nbsp; &nbsp; <a href="JavaScript:;" class="layui-btn layui-btn-danger dan">删除已选中</a></th>
      </tr> 
    </thead>
    <tbody>
        @foreach($res as $k=>$v)
          <tr brand_id="{{$v->brand_id}}" ids="{{$v->brand_id}}">
            <td id="danxuan"><input type="checkbox"  name="id" value="{{$v->brand_id}}"></td>
            <td>{{$v->brand_id}}</td>
            <!-- <td brand_name="brand_name" name="{{$v->brand_name}}">
                <span class="name_a">{{$v->brand_name}}</span>
                <input type="text" class="name_s" value="{{$v->brand_name}}" style="display:none">
            </td> -->
            <td brand_name="brand_name" name="{{$v->brand_name}}">
                <span class="brand_a">{{$v->brand_name}}</span>
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
    </tbody>
    
  </table>
 
<script src="/static/layui/jquery.js"></script>
<script>
// $(".brand_a").click(function(){
//   var brand_name = $(this).text();
//   var id = $(this).parents("tr").attr("ids");
//   $(this).parent().html('<input type=text class="changename input_name_'+id+'" value='+brand_name+'>');
//   var aa = $('.input_name_'+id).val('').focus('').val(brand_name);
//   console.log(id);
// })
// ajax分页
$(document).on("click",".layui-laypage-default a",function(){
  var url = $(this).attr("href");
  $.get(url,function(res){
      // alert(res);
      $("tbody").html(res);
  });
    return false;
})
// 点击全部选中
$(document).on("click","#quanxuan input",function(){
  var xuan = $(this).prop("checked",true);
            if(xuan){
              $("#danxuan input").prop("checked",true);
            }else{
              $("#danxuan input").prop("checked",false);
            }
})

$(document).on("click",".san",function(){
    var brand_id = $(this).attr("brand_id");
    
  if(window.confirm("是否删除")){
    var data = {};
    data.brand_id = brand_id;
    var url = "{{url('/brand/del')}}";
    $.ajax({
      type:"get",
      url:url,
      data:data,
      datetype:"json",
      success:function(res){
        console.log(res);
        history.go(0);
      }
    })
  }
})
// 即点即改
    $(document).ready(function(){
      $(document).on("click",".name_a",function(){
            var _this = $(this);
            _this.hide();
            _this.next("input").show();

            $(".name_s").blur(function(){
                var _this = $(this);

                var zi = _this.val();
                var name = _this.parents("td").attr("name");
                // console.log(name);return;
                if(zi==""){
                  alert("内容不能为空");
                  history.go(0);
                  return;
                }
                if(zi==name){
                  alert("此品牌已有");
                  // history.go(0);
                  _this.prev("span").text(zi).show();
                  _this.hide();
                  return;
                }
                var brand_id = _this.parents("tr").attr("brand_id");
                var brand_name = _this.parent("td").attr("brand_name");
                var data = {};
                data.brand_name = brand_name;
                data.brand_id = brand_id;
                data.zi = zi;
               var url = "{{url('/brand/ajaxjdjd')}}";
                $.ajax({
                    type:"get",
                    data:data,
                    url:url,
                    dataType:"json",
                    success:function(res){
						// console.log(res)
					    if(res.code==0){
                _this.prev("span").text(zi).show();
                _this.hide();
              // alert(res.message);
              // history.go(0);
						  }
                    }
              })
            })
          })
	    })
  // 删除多条
  $(document).on("click",".dan",function(){
      var id=[];
      $("input[name='id']:checked").each(function(){
      id.push($(this).val());
      });
      var data ={};
      data.id = id;
      var url = "{{url('/brand/destroy')}}";
                $.ajax({
                    type:"get",
                    data:data,
                    url:url,
                    dataType:"json",
                    success:function(res){
                      
                      if(res.code==0002){
                        alert(res.message);
                      }
						            console.log(res)
                        history.go(0);
                    }
            })
      // console.log(id);
    })




</script>
  @endsection