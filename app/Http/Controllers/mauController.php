<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mau;
use RealRashid\SweetAlert\Facades\Alert;

class mauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mau = Mau::all();
        return view('admin.mau.danh-sach-mau', compact('mau'));
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
            'tenmau' => 'required|max:30|unique:mau,tenmau',
            'trangthai' => 'required',
        ],[
            'trangthai.required' => 'Không được để trống',
            'tenmau.max' => 'Không quá 30 ký tự',
            'tenmau.unique' => 'Màu sản phẩm đã tồn tại',
            'tenmau.required' => 'Không được để trống',
        ]);
        $mau = new Mau;
        $mau->tenmau = $request->input('tenmau');
        $mau->trangthai = $request->input('trangthai');
        $mau->save();
        Alert()->success('Thành công','Thêm màu sản phẩm thành công.');
        return \redirect()->route('admin.mau-san-pham.mau-san-pham');
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
