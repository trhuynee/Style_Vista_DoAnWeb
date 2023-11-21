<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $taiKhoan = $request->only('email', 'password');
        if(Auth::attempt($taiKhoan)){
            $user = Auth::user();
            session(['id' => $user->id, 'name' => $user->hovaten, 'chucvu' => $user->phanquyen]);
            $phanQuyen = $user->phanQuyen;
            $chuyenDoi = intval($phanQuyen);
            if($chuyenDoi == 0 || $chuyenDoi == 1){
                return \redirect()->route('admin.trang-chu');
            }
        }else{
            return redirect('dang-nhap');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        
        $password = $request->input('password');
        $user = new User();
        $user->hovaten = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($password);
        $user->save();
        return redirect()->back();
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
