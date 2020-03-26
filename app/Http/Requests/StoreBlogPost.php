<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            "goods_name"=>"required|unique:goods|max:20",
            "goods_price"=>"required",
        ];
    }
    public function messages(){
        return[
            "goods_name.required"=>"商品名称必填",
            "goods_name.unique"=>"商品名称已存在",
            "goods_name.max"=>"商品名称最大20",
            "goods_price.required"=>"商品售价必须填",
        ];

    }
}
