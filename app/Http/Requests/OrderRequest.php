<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_nguoi_nhan' =>'required|string|max:255',
            'so_dien_thoai_nguoi_nhan' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',

            'emial_nguoi_nhan' => 'required|string|email|max:255',
            'dia_chi_nguoi_nhan' => 'required|string|max:255',
        ];
    }
    public function messages()

    {
        return[
        'ten_nguoi_nhan.required' =>'Tên là bắt buộc',
        'ten_nguoi_nhan.string' =>'Tên phải là chuỗi ký tự',
        'ten_nguoi_nhan.max' =>'Tên không vượt quá 255 kí tự',
        'so_dien_thoai_nguoi_nhan.required' =>'Số điện thoại là bắt buộc',
        'so_dien_thoai_nguoi_nhan.string' =>'Số điện thoại phải là chuỗi kí tự',
        'so_dien_thoai_nguoi_nhan.regex' =>'Định dạng số điện thoại không hợp lệ',
        'so_dien_thoai_nguoi_nhan.min' =>'Số điện thoại phải có ít nhất 10 ký tự',
        'emial_nguoi_nhan.required' => 'Email là bắt buộc',
        'emial_nguoi_nhan.string' => 'Email phải là chuỗi ký tự',
        'emial_nguoi_nhan.email' => 'Emial phải là một một địa chỉ email hợp lệ',
        'emial_nguoi_nhan.max' => 'email không được quá 255 ký tự',
        'dia_chi_nguoi_nhan.required' => 'Địa chỉ là bắt buộc',
        'dia_chi_nguoi_nhan.string' => 'Địa chỉ phải là một chuỗi ký tự',
        'dia_chi_nguoi_nhan.max' => 'Địa chỉ không được vượt quá 255 ký tự',
        ];

    }
}
