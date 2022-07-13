<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRegister extends FormRequest
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
            'fullname' => 'required|string|max:255',  // validate thông tin họ tên bắt buộc phải nhập
            'email' => '|unique:users|required|email', // validate định dạng email và kiểm tra email đã tồn tại hay chưa
            'password' => ['required', 'string', 'min:8', 'confirmed'], // validate thông tin password bắt buộc nhập và phải từ 8 ký tự trở lên
            // 'email' => 'required|email:rfc,dns|unique:users',
            // 'password'=>'required|min:8',
            // 'password2'=>'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'fullname.max' => 'Độ dài tối đa của tên là 255 ký tự ',
            'required' => ':attribute không được bỏ trống',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã được đăng ký',
            'password.required'=>'không để trống',
            'password.min'=>'không được bé hơn 8 ký tự',
        ];
    }
}
