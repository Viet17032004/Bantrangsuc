<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title ="List binh luan";

        $binhLuans = BinhLuan::with(['user', 'sanPham'])->get();
        return view('admins.binhluans.index', compact('binhLuans','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $binhLuan = BinhLuan::with(['user', 'sanPham'])->findOrFail($id);
        return view('admins.binhluans.detail', compact('binhLuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $binhLuan= BinhLuan::findOrFail($id);

        $binhLuan->delete();
       
        return redirect()->route('admins.binhluans.index')->with('succes','Xóa danh mục thành công');
    }
    
}
