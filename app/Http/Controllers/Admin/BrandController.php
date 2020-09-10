<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\Storephp;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_name = request()->brand_name;
        // echo($brand_name);
        $brand_url = request()->brand_url;
        $where = [];
        if($brand_name){
            $where [] = ["brand_name","like","%$brand_name%"];
        }
        if($brand_url){
            $where [] = ["brand_url","like","%$brand_url%"];
        }
        $res = Brand::where("del",1)->where($where)->paginate(2);
        $data = request()->all();
        if(request()->ajax()){
            return view("admin.brand.ajaxpage",['res'=>$res,"data"=>request()->all()]);
        }
     
        return view("admin.brand.index",['res'=>$res,"data"=>request()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.brand.create");
    }

    public function uploads(Request  $request){
        $file = $request->file;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
        $photo = $request->file;
        $extension = $photo->extension();
        $store_result = $photo->store('upload');
        // $store_result = $photo->storeAs('photo', 'test.jpg');
        $data = env('UPLOAD_URL').'/'.$store_result;
        return json_encode(['code'=>1,"message"=>"上传成功","data"=>$data]);
        // print_r($data);exit();
                // dd($);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Storephp $request)
    public function store(Request $request)
    {
        // $validatedData = $request->validate([

        //     'brand_name' => 'required|unique:brand',
        //     'brand_url' => 'required',
        // ],[
        //     'brand_name.required'=>"品牌名不能为空",
        //     'brand_name.unique'=>"品牌名已有",
        //     'brand_url.required'=>"网址不能为空",

        // ]);

        $validator = Validator::make($request->all(),
        [
            'brand_name' => 'required|unique:brand',
                'brand_url' => 'required',
        ],[
            'brand_name.required'=>"品牌名不能为空",
            'brand_name.unique'=>"品牌名已有",
            'brand_url.required'=>"网址不能为空",
        ]);
        if ($validator->fails()) {
            return redirect('brand/create')
            ->withErrors($validator)
            ->withInput();
            }

        $data = $request->except('_token');
        // dd($data);
        $da = [
            "brand_name"=>$data['brand_name'],
            "brand_url"=>$data['brand_url'],
            "brand_desc"=>$data['brand_desc'],
            "brand_log"=>$data['brand_log'],
        ];
       $res = brand::insert($da);
        if($res){
            return redirect("/brand/index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Brand::find($id);
        return view("admin.brand.edit",compact("res"));
        // dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token','file']);
        // dd($data);
        $res = Brand::where("brand_id",$id)->update($data);
        // dd($res);
        if($res){
            return redirect("/brand/index");
        }
    }
    public function ajaxjdjd(Request $request){
        $data = $request->all();
        // $data = Brand::where($data['brand_name'],$data['zi'])->first();
        // dd($data);
        $res = Brand::where("brand_id",$data['brand_id'])->update([$data['brand_name']=>$data['zi']]);
        // dd($res);
        if($res==1){
            // return $message = [
            //     "code"=>0001,
            //     "message"=>"修改成功",
            //     "success"=>true,
            // ];
            return $this->success("修改成功了");
        }
        if($res==0){
           
            return $this->error("未修改");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if($data==[]){
            return $message = [
                "code"=>0002,
                "message"=>"请选择需要删除",
                "success"=>true,
            ];exit;
        }
        $da = $data['id'];
      
        foreach($da as $k=>$v){
            
            $res = Brand::where("brand_id",$v)->update(['del'=>2]);
            //  dd($v);
        }
        // dd($res);
        if($res==1){
            return $message = [
                "code"=>0001,
                "message"=>"删除成功",
                "success"=>true,
            ];exit;
        }
    }
    public function del(){
        $brand_id = request()->all();
        $res = Brand::where("brand_id",$brand_id)->update(['del'=>2]);
        // dd($brand_id);
        if($res==1){
            return $message = [
                "code"=>0001,
                "message"=>"删除成功",
                "success"=>true,
            ];exit;
        }
    }
}
