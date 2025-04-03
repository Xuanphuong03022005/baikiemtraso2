<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'name'       => 'required|string|min:3',
            'user_name'  => 'required|string|min:4|unique:users,user_name',
            'phone'      => 'required|digits_between:10,11',
            'email'      => 'required|email|unique:users,email',
            'birthday'   => 'required|date|before_or_equal: today',
            'address'    => 'required|string|min:5',
            'password'   => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Họ và tên không được để trống.',
            'name.min'           => 'Họ và tên phải có ít nhất 3 ký tự.',
            'user_name.required' => 'Tên đăng nhập không được để trống.',
            'user_name.min'      => 'Tên đăng nhập phải có ít nhất 4 ký tự.',
            'user_name.unique'   => 'Tên đăng nhập đã tồn tại.',
            'phone.required'     => 'Số điện thoại không được để trống.',
            'phone.digits_between' => 'Số điện thoại phải có 10 hoặc 11 chữ số.',
            'email.required'     => 'Email không được để trống.',
            'email.email'        => 'Email không hợp lệ.',
            'email.unique'       => 'Email đã được đăng ký.',
            'birthday.required'  => 'Ngày sinh không được để trống.',
            'birthday.before_or_equal'    => 'Không được quá ngày hiện tại.',
            'address.required'   => 'Địa chỉ không được để trống.',
            'address.min'        => 'Địa chỉ phải có ít nhất 5 ký tự.',
            'password.required'  => 'Mật khẩu không được để trống.',
            'password.min'       => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}
