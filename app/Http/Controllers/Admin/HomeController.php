<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    public function index(Request $request){
        //Lấy 10 sản phẩm mới nhất
        $sanPhamMoi = SanPham::latest()->take(10)->get();
    
         // Lấy 4 danh mục đầu tiên
         $categories = DanhMuc::take(4)->get();

         // Lấy sản phẩm theo danh mục được chọn
         $selectedCategoryId = $request->get('san_pham_id');
         $products = SanPham::query();
 
         if ($selectedCategoryId) {
             $products->where('san_pham_id', $selectedCategoryId);
         }
 
         $products = $products->get();
     
    
   
    return view('clients.trangchu',compact('sanPhamMoi','categories','products'));
    }
}
