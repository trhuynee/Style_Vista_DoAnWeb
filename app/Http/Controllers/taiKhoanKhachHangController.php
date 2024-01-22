<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class taiKhoanKhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('phanquyen', 2)
        ->get();
        return view('admin.tai-khoan.danh-sach-tai-khoan-khach-hang', compact('users'));
    }
    public function thongtinkh()
    {
        $kh = auth()->user();
        return view('user.thong-tin-khach-hang', compact('kh'));
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

    // public function thongtin()
    // {
    //     return view('user.thong-tin-khach-hang');
    // }

    // public function donhang()
    // {
    //     return view('user.don-hang');
    // }

    // public function thaydoimk()
    // {
    //     return view('user.doi-mat-khau');
    // }

    // public function diachi()
    // {
    //     return view('user.dia-chi');
    // }

}
