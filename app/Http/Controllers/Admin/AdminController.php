<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(){
        $tongDonHang = DonHang::count();
        $tongDoangThu = DonHang::sum('tong_tien');
        $totalProducts = SanPham::count();
        $donHangTheoTrangThai = DonHang::select(
            'trang_thai_don_hang',
            DB::raw('count(*) as total')
        )->groupBy('trang_thai_don_hang')->get();
        $pendingOrders = DonHang::where('trang_thai_don_hang', 'da_giao_hang')->count();
        $topSellingProducts = SanPham::withSum('orderItems', 'so_luong')
                                 ->orderBy('order_items_sum_so_luong', 'desc')
                                 ->get();
        return view('admins.dashboard',compact('tongDonHang','tongDoangThu','donHangTheoTrangThai','pendingOrders','topSellingProducts','totalProducts'));
    }
}
