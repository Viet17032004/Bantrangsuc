<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            //
'ma_san_pham' => 'required|max:10|unique:san_phams,ma_san_pham,'. $this->route('id'),
'ten_san_pham' => 'required|max:255',
'hinh_anh' => 'image|mimes:jpg,jpeg,png,gif',
'gia_san_pham' => 'required|numeric|min:0',
'gia_khuyen_mai' => 'numeric|min:0|lt:gia_san_pham',
'mo_ta_ngan' => 'max:255',
'so_luong' => 'integer|min:0',
'ngay_nhap' => 'required|date',
'danh_muc_id' => 'required|exists:danh_mucs,id',
        ];
    }
    public function messages(): array
    {
        return[
'ma_san_pham.required' => 'Mã sản phẩm bắt buộc điền',
'ma_san_pham.max' => 'Mã sản phẩm không quá 10 ký tự',
'ma_san_pham.unique' => 'mã sản phẩm không được trùng',
'ten_san_pham.required' => 'Tên sản phẩm bắt buộc điền',
'ten_san_pham.max' => 'Tên sản phẩm không vượt quá 255 ký tự',
'hinh_anh.image' => 'không phải ảnh',
'hinh_anh.mimes' => 'ảnh sai định dạng',
'gia_san_pham.required' => 'Giá sản phẩm không được trống',
'gia_san_pham.numeric' => 'Giá sản phẩm phải là số',
'gia_san_pham.min' => 'Giá sản phẩm phải lớn hơn 0',
'gia_khuyen_mai.numeric' => 'Giá khuyến mãi phải là số',
'gia_khuyen_mai.min' => 'Giá khuyến mãi phải lớn hơn 0 hoặc bằng 0',
'gia_khuyen_mai.lt' => 'Giá khuyễn mãi phải nhỏ hơn giá sản phẩm',
'mo_ta_ngan.max' => 'Mô tả ngắn quá dài không được vượt quá 255 ký tự',
'so_luong.integer' => 'Số lượng phải là số dương',
'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 0',
'ngay_nhap.required' => 'Ngày nhập bắt buộc điền',
'ngay_nhap.date' => 'Ngày nhập sai định dạng',
'danh_muc_id.required' => 'Danh mục là bắt buộc',
'danh_muc_id.exists' => 'Danh mục không hợp lệ',

        ];
    }
}
