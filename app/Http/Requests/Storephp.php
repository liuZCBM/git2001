<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storephp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_name' => 'required|unique:brand',
            'brand_url' => 'required',
        ];
    }

    public function messages(){
        return [
                'brand_name.required'=>"品牌名不能为空",
                'brand_name.unique'=>"品牌名已有",
                'brand_url.required'=>"网址不能为空",
        ];
    }
}
