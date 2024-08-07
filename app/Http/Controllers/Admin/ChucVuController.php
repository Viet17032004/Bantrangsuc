<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title ="Danh Sách Chức Vụ";

        $listChucVu = ChucVu::orderBYDesc('id')->get();
        return view('admins.chucvus.index', compact('title','listChucVu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title =" Thêm Chức vụ";
        return view('admins.chucvus.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    
    {
        //
        if($request->method('post')){
            $params = $request->except('_token');
           

            ChucVu::create($params);
            return redirect()->route('admins.chucvus.index')->with('succes','Thêm danh mục thành công');
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
        $danhMuc= ChucVu::findOrFail($id);
        return view('admins.chucvus.update', compact('title','danhMuc'));
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
            $danhMuc= ChucVu::findOrFail($id);
           

            $danhMuc->update($params);
            return redirect()->route('admins.chucvus.index')->with('succes','Cập nhật danh mục thành công');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        {
            //
            $danhMuc= ChucVu::findOrFail($id);
    
            $danhMuc->delete();
           
            return redirect()->route('admins.chucvus.index')->with('succes','Xóa danh mục thành công');
        }
    }
}
