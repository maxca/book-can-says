<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitFormCreateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //เปิดสิทธิ์
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
            'category' => 'required',
            'name' => 'required',
            'author_name' => 'required',
            'publisher_name' => 'required',
            'total_page' => 'required|numeric',
            'total_chapter' => 'required|numeric',
            'cover_image' => 'required',
            'description' => 'required',
        ];
    }

    public  function messages()
    {
        return [
            // .required ไปเรียกมาจากข้างบน
            'category.required' => 'กรุณาใส่หมวดหมู่',
            'name.required' => 'กรุราใส่ชื่อหนังสือ',
            'author_name.required' => 'กรุณาใส่ชื่อนักเขียน',
            'publisher_name.required' => 'กรุราใส่ชื่อสำนักพิมพ์',
            'total_page.required' => 'กรุณาใส่เลขหน้า',
            'total_chapter.required' => 'กรุณาใส่จำนวนบท',
            'cover_image.required' => 'กรุณาใส่ภาพหน้าปก',
            'description.required' => 'กรุราใส่คำบรรยาย',
        ];
    }
}
