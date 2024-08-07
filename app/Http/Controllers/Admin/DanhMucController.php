<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title ="Danh Mục Sản Phẩm";

        $listDanhMuc = DanhMuc::orderBYDesc('trang_thai')->get();
        return view('admins.danhmucs.index', compact('title','listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title =" Thêm Danh Mục Sản Phẩm";
        return view('admins.danhmucs.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DanhMucRequest $request)
    
    {
        //
        if($request->method('post')){
            $params = $request->except('_token');
            if($request->hasFile('hinh_anh')){
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs','public');
            }else{
                $filepath = null;
            }
            $params['hinh_anh'] = $filepath;

            DanhMuc::create($params);
            return redirect()->route('admins.danhmucs.index')->with('succes','Thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title =" Sửa Danh Mục Sản Phẩm";
        $danhMuc= DanhMuc::findOrFail($id);
        return view('admins.danhmucs.edit', compact('title','danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
          //
          if($request->method('put')){
            $params = $request->except('_token','_method');
            $danhMuc= DanhMuc::findOrFail($id);
            if($request->hasFile('hinh_anh')){
                if($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
                    Storage::disk('public')->delete($danhMuc->hinh_anh);
                }
                $filepath = $request->file('hinh_anh')->store('uploads/danhmucs','public');
            }else{
$filepath = $danhMuc->hinh_anh;

            }
            $params['hinh_anh'] = $filepath;

            $danhMuc->update($params);
            return redirect()->route('admins.danhmucs.index')->with('succes','Cập nhật danh mục thành công');
    }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $danhMuc= DanhMuc::findOrFail($id);

        $danhMuc->delete();
        if($danhMuc->hinh_anh && Storage::disk('public')->exists($danhMuc->hinh_anh)){
            Storage::disk('public')->delete($danhMuc->hinh_anh);
        }
        return redirect()->route('admins.danhmucs.index')->with('succes','Xóa danh mục thành công');
    }
}
