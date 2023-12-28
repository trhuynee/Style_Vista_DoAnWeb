<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoadonban;
use App\Models\CTHDB;
use App\Models\mau;
use App\Models\user;
use App\Models\chitietsanpham;
use Carbon\Carbon;




class donHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function donHangHuy()
    {
        $donhang = hoadonban::where('ttvanchuyen', 3)->get();
        return view('admin.don-hang.don-hang-huy', compact('donhang'));
    }
    public function donHangMoi()
    {
        $donhang = hoadonban::where('ttvanchuyen', 0)->get();
        return view('admin.don-hang.don-hang-moi', compact('donhang'));
    }
    public function donHangDangGiao()
    {
        $donhang = hoadonban::where('ttvanchuyen', 1)->get();
        return view('admin.don-hang.don-hang-dang-giao', compact('donhang'));
    }
    public function donHangHoanTat()
    {
        $donhang = hoadonban::where('ttvanchuyen', 2)->get();
        return view('admin.don-hang.don-hang-hoan-tat', compact('donhang'));
    }
    public function donHangHoanTra()
    {
        $donhang = hoadonban::where('ttvanchuyen', 4)->get();
        return view('admin.don-hang.don-hang-hoan-tra', compact('donhang'));
    }
    public function huyDonHang(string $id)
    {
        $hoadonban = hoadonban::find($id);
        $CTHDB = CTHDB::where('ma_hd', $hoadonban->id)->first();
        $sp = chitietsanpham::where('id', $CTHDB->chitietietsp_id)->first();
        $sp->update(['soluong' => $CTHDB->soluong + $sp->soluong]);
        $hoadonban->update(['ttvanchuyen' => 5]);
        return \redirect()->back();
    }
    public function giaoDonHang(string $id)
    {
        $hoadonban = hoadonban::find($id);
        $CTHDB = CTHDB::where('ma_hd', $hoadonban->id)->first();
        $sp = chitietsanpham::where('id', $CTHDB->chitietietsp_id)->first();
        $sp->update(['soluong' => $CTHDB->soluong + $sp->soluong]);
        $hoadonban->update(['ttvanchuyen' => 1, 'updated_at' => Carbon::now()]);
        return \redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hoadonban = hoadonban::find($id);
        $user = User::where('id', $hoadonban->ma_kh)->first();
        return view('admin.don-hang.chi-tiet-don-hang', compact('hoadonban','user'));
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
