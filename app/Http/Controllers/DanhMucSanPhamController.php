<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucSanPhamController extends Controller
{
    //
    public function index(DanhMuc $category){
        $categories = DanhMuc::all();
        $products = $category->sanPhams;
        
        return view('clients.danhmucsanpham', compact('category', 'products','categories'));
    }
}
