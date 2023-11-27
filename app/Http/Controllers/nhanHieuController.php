<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanHieu;
use RealRashid\SweetAlert\Facades\Alert;

class nhanHieuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhanhieu = NhanHieu::all();
        return view('admin.nhanhieu.danh-sach-nhan-hieu', compact('nhanhieu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tennhanhieu' => 'required|max:30|unique:nhanhieu,tennhanhieu',
            'trangthai' => 'required',
        ],[
            'trangthai.required' => 'Không được để trống',
            'tennhanhieu.unique' => 'Tên nhãn hiệu sản phẩm đã tồn tại',
            'tennhanhieu.max' => 'Không quá 30 ký tự',
            'tennhanhieu.required' => 'Không được để trống',
        ]);
        $nhanhieu = new NhanHieu;
        $nhanhieu->tennhanhieu = $request->input('tennhanhieu');
        $nhanhieu->trangthai = $request->input('trangthai');
        $nhanhieu->save();
        Alert()->success('Thành công','Thêm nhãn hiệu sản phẩm thành công.');
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
