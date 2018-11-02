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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[

                'name_student' => 'required|min:2|max:255',
                'class' => 'required|min:2',
                'phone' => 'required|numeric|min:2',
                'email' => 'required|email|max:50|min:2',
                'name_book' => 'required|min:10',
                'borrowed_day' => 'required',
        ];

    }
    public function messages()
    {
        return [
            'name_student.required' => 'tên học viên không được để trống',
            'class.required' => 'tên lớp không được để trống',
            'phone.required' => 'số điện thoại không được để trống',
            'email.required' => 'email không được để trống',
            'name_book.required' => 'tên sách không được để trống',
            'borrowed_day.required' => 'ngày mượn sách không được để trống',
            'phone.numeric' => 'số điện thoại phải là số',
            'email.email' => 'email phải là dạng email',
        ];
    }
}
