<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class taiKhoanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('phanquyen', 0)->get();
        return view('admin.tai-khoan.danh-sach-tai-khoan-admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chucvu = \session('chucvu');
        return view('admin.tai-khoan.them-tai-khoan', compact('chucvu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
            $avatarUrl = '/storage/avatars/' . $filename;
        } else {
            $avatarUrl = null;
        }
        $user = new User;
        $user->sdt = $request->input('sdt');
        $user->password = Hash::make($request->input('password'));
        $user->hovaten = $request->input('hovaten');
        $user->email = $request->input('email');
        $user->diachi = $request->input('diachi');
        $user->phanquyen = $request->input('phanquyen');
        $user->avatar = $avatarUrl;
        $user->save();
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
