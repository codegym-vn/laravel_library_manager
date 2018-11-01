<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return
            [
                'name_student' => 'required|min:5|max:255',
                'class' => 'required',
                'phone' => 'required|numeric|',
                'email' => 'required|email|max:50',
                'name_book' => 'required',
                'borrowed_day' => 'requied',
            ];

//            [
//                'required' => ':attribute Không được để trống',
//                'min' => ':attribute Không được nhỏ hơn :min',
//                'max' => ':attribute Không được lớn hơn :max',
//                'integer' => ':attribute Chỉ được nhập số',
//                'email' => ':attribute Chỉ được nhập email',
//            ],
//
//            [
//                'name' => 'Tiêu đề',
//                'class' => 'Lớp',
//                'phone' => 'Số điện thoại',
//                'email' => 'email',
//                'name_book' => 'Tên sách',
//                'borrowed_day' => 'Ngày mượn sách'
//            ];
    }
    public function messages()
    {
        return [
            'name_student.require' => 'tên học viên không được để trống',
            'class.require' => 'tên lớp không được để trống',
            'phone.require' => 'số điện thoại không được để trống',
            'email.require' => 'email không được để trống',
            'name_book.require' => 'tên sách không được để trống',
            'borrowed_day.require' => 'ngày mượn sách không được để trống',
            'phone.numeric' => 'số điện thoại phải là số',
            'email.email' => 'email phải là dạng email',
        ];
    }
}
