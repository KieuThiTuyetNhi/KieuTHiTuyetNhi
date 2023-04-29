<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
           'name'=>'required',
           'detail'=>'required',
           'metakey'=>'required',
           'category_id'=>'required',
           'brand_id'=>'required',
           'price_buy'=>'required',
           'metadesc'=>'required'
        ];
    }
     
    public function messages()
    {
        return [
           'name.required'=>'Bạn chưa nhập tên',
           'metakey.required'=>'Chưa nhập từ khóa tìm kiếm',
           'detail.required'=>'Chưa nhập chi tiết',
           'category_id.required'=>'Chưa chon danh mục sản phẩm',
           'brand_id.required'=>'Chưa chọn thương hiệu',
           'price_buy.required'=>'Chưa cho giá bán',
           'metadesc.required'=>'Chưa nhập mô tả'
        ];
    }
}
