<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $title =" Quản lý thông tin cá nhân";
        $search = $request->input('search');
        $searchTrangThai = $request->input('searchTrangThai');

        $listTaiKhoan = User::orderByDesc('id')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                   ;
            })
            ->when($searchTrangThai !== null, function ($query) use ($searchTrangThai) {
                return $query->where('trang_thai', '=', $searchTrangThai);
            })
            ->paginate(2);


        return view('admins.taikhoans.index', compact('title','listTaiKhoan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title =" Thêm Tài Khoản";

        $listChucVu = ChucVu::query()->get();
        return view('admins.taikhoans.create', compact('title','listChucVu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            
            // Xử lý hình ảnh đại diện 
            if ($request->hasFile('anh_dai_dien')) {
                $params['anh_dai_dien'] = $request->file('anh_dai_dien')->store('uploads/taikhoans', 'public');
            } else {
                $params['anh_dai_dien'] = null;
            }
            
            // Thêm sản phẩm
            $taiKhoan = User::query()->create($params);
            
            return redirect()->route('admins.taikhoans.index')->with('success', 'Thêm sản phẩm thành công');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //
         //Lấy thông tin chi tiết
        //Sử dụng quyry buider
        $title = "Chi tiết tài khoản";

        $TaiKhoan = User::query()->find($id);

        //Sử dụng Eloquent
        // $TaiKhoan = TaiKhoan::findOrFail($id);
        $tb_chuc_vu = DB::table('users')->get();
        if(!$TaiKhoan){
            return redirect()->route('taikhoans.index')->with('error','sản phẩm ko tồn tại');

        }
        return view('admins.taikhoans.detail', compact('title','TaiKhoan','tb_chuc_vu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "chỉnh sửa tài khoản";
        //Lấy thông tin chi tiết
        //Sử dụng quyry buider
        $TaiKhoan = User::query()->find($id);

        //Sử dụng Eloquent
        // $TaiKhoan = TaiKhoan::findOrFail($id);
        $tb_chuc_vu = DB::table('users')->get();
        if(!$TaiKhoan){
            return redirect()->route('admins.taikhoans.index')->with('error','sản phẩm ko tồn tại');

        }
        return view('admins.taikhoans.update', compact('title','TaiKhoan','tb_chuc_vu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $TaiKhoan = User::findOrFail($id);
            //Xử lý Hình Ảnh
            if ($request->hasFile('anh_dai_dien')) {
                //Nếu có đẩy hỉnh ảnh thì sẽ xóa hình cũ Thêm hình mới
                if ($TaiKhoan->anh_dai_dien) {
                    User::disk('public')->delete($TaiKhoan->anh_dai_dien);
                }
                $params['anh_dai_dien'] = $request->file('anh_dai_dien')->store('uploads/taikhoan', 'public');
            } else {
                //Nếu không có hình ảnh sẽ lấy lại hình ảnh cũ
                $params['anh_dai_dien'] = $TaiKhoan->anh_dai_dien;
            }
            //Cập nhật dữ liệu
            //Eloquent
            $TaiKhoan->update($params);
            return redirect()->route('admins.taikhoans.index')->with('success', 'Cập nhật  sản phẩm thành công?');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,string $id)
    {
        {
           
            if ($request->isMethod('DELETE')) {
                
                $sanPham = User::findOrFail($id);
    
                if ($sanPham) {
                    
                     $sanPham->delete();
                     
                    return redirect()->route('admins.taikhoans.index')->with('sucess', 'Xóa sản phẩm thành công?');
                }
                return redirect()->route('admins.taikhoans.index')->with('error', 'Không có sản phẩm');
            }
           
    
        }

    }
}
