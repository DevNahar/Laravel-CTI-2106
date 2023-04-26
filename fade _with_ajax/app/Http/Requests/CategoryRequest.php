<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_name'=>'required' ,
            'category_image' => 'mimes:jpg,bmp,png',
            'category_image'=>'file|max:1024',
            //  'category_image'=>'required|image' ,   // accept all image
            //  'category_image'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required'=>'category name den' ,




        ];
    }
}
