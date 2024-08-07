<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function chiTietSanPham(string $id){
       // Lấy thông tin sản phẩm cùng với bình luận
        $sanPham = SanPham::with('binhLuans.user')->withCount('binhLuans')->findOrFail($id); 
        
       // Lấy danh mục của sản phẩm hiện tại
    $danhMucId = $sanPham->danh_muc_id; // Giả sử bạn có trường danhMuc_id trong model SanPham

    // Lấy danh sách sản phẩm khác cùng loại
    $listSanPham = SanPham::where('danh_muc_id', $danhMucId)
                           ->where('id', '<>', $id) // Loại bỏ sản phẩm hiện tại khỏi danh sách
                           ->get();
        
        // Trả về view cùng với dữ liệu sản phẩm và bình luận
        return view('clients.sanphams.chitiet', compact('sanPham', 'listSanPham'));
    }
    
}
