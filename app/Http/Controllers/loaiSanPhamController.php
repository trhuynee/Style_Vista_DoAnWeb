<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use RealRashid\SweetAlert\Facades\Alert;

class loaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loaiSanPham = LoaiSanPham::all();
        return view('admin.loai-san-pham.loai-san-pham', compact('loaiSanPham'));
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
        $request->validate([
            'tenloaisp' => 'required|max:30|unique:loaisanpham,tenloaisp',
            'trangthai' => 'required',
        ],[
            'trangthai.required' => 'Không được để trống',
            'tenloaisp.max' => 'Không quá 30 ký tự',
            'tenloaisp.unique' => 'Loại sản phẩm đã tồn tại',
            'tenloaisp.required' => 'Không được để trống',
        ]);
        $loaiSanPham = new LoaiSanPham;
        $loaiSanPham->tenloaisp = $request->input('tenloaisp');
        $loaiSanPham->trangthai = $request->input('trangthai');
        $loaiSanPham->save();
        Alert()->success('Thành công','Thêm loại sản phẩm thành công.');
        return \redirect()->back();
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
        //
    }
}
