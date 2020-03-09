<?php

namespace App\Http\Requests;

use App\Rules\UpperCase;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => ['required','max:50',new UpperCase()],
            'body' => 'required',
            'file'=>['required','max:1024','mimes:jpeg,png,jpg,jepg'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان را پر کنید',
            'body.required' => 'توضیجات را پر کنید',
            'file.required' => 'تصویر را وارد کنید',
            'file.max' => 'فایل ارسالی شما نباید بیش از 1 مگابایت باشد',
            'file.mimes' => 'نوع تصویر مجاز میست',
        ];
    }
}
