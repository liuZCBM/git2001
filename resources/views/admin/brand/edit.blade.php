@extends('admin.lay.left')
@section('content')
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <legend>
        <span class="layui-breadcrumb">
            <a href="/">首页</a>
            <a href="/demo/">添加</a>
        </span>
        </legend>
    </fieldset>
    @if ($errors->any())
    <div class="alert alert-danger" style="color:red;">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
    <form class="layui-form" action="{{url('/brand/update/'.$res->brand_id)}}" lay-filter="example" method="post">
    @csrf
    
    <input type="hidden" name="brand_log" value="">
        <div class="layui-form-item">
        <label class="layui-form-label">品牌名字：</label>
        <div class="layui-input-block">
            <input type="text" name="brand_name" lay-verify="title" value="{{$res->brand_name}}" autocomplete="off" placeholder="品牌名字" class="layui-input">
        </div>
        </div>

        <div class="layui-form-item">
        <label class="layui-form-label">品牌logo：</label>
        <div class="layui-input-block">
        
            <div class="layui-upload-drag" id="test10">
                <i class="layui-icon"></i>
                <p>点击上传，或将文件拖拽到此处</p>

                <div @if(!$res->brand_log) class="layui-hide" @endif id="uploadDemoView">
                    <hr>
                    <img src="{{$res->brand_log}}" alt="上传成功后渲染" style="max-width: 196px">
                    
                </div>
            </div>
        </div>
        </div>

        <div class="layui-form-item">
        <label class="layui-form-label">品牌url：</label>
        <div class="layui-input-block">
            <input type="text" name="brand_url" value="{{$res->brand_url}}" lay-verify="title" autocomplete="off" placeholder="" class="layui-input">
        </div>
        </div>

        <div class="layui-form-item">
        <label class="layui-form-label">品牌介绍：</label>
        <div class="layui-input-block">
            <textarea name="brand_desc" id="" cols="30" lay-verify="title" autocomplete="off" placeholder="" class="layui-input" rows="10">{{$res->brand_desc}}</textarea>
        </div>
        </div>


        
        <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="reset" class="layui-btn layui-btn-normal" id="LAY-component-form-getval">重置</button>
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
        </div>
    </form>
    
    </div>
  </div>
  <script>
  
  
  </script>

@endsection