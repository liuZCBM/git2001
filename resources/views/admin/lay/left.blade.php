<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        @php $name = Route::currentRouteName();  @endphp
        <li @if(strpos($name,'goods')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item" @endif>
          <a class="" href="javascript:;">商品</a>
          <dl class="layui-nav-child">
            <dd @if($name=='goods.create') class="layui-this" @endif><a href="javascript:;">商品添加</a></dd>
            <dd @if($name=='goods') class="layui-this" @endif><a href="javascript:;">商品展示</a></dd>
          </dl>
        </li>
        <li @if(strpos($name,'brand')!==false) class="layui-nav-item layui-nav-itemed" @else class="layui-nav-item" @endif>
          <a href="javascript:;">品牌</a>
          <dl class="layui-nav-child">
            <dd @if($name=='brand.create') class="layui-this" @endif><a href="{{url('/brand/create')}}">品牌添加</a></dd>
            <dd @if($name=='brand.index') class="layui-this" @endif><a href="{{url('/brand/index')}}">品牌展示</a></dd>
          </dl>
        </li>
        
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
    @yield('content')
    </div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/static/layui/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});


layui.use('upload', function(){
  var $ = layui.jquery
  ,upload = layui.upload;

  upload.render({
        elem: '#test10'
        ,url: 'http://www.duoyuan.com/brand/uploads' //改成您自己的上传接口
        ,headers: {
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
        ,done: function(res){
        // layer.msg('上传成功');
        layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.data);
        // console.log(res)
        layui.$('input[name="brand_log"]').attr("value",res.data);
        }
    });
  
  });

    
</script>
</body>
</html>
      