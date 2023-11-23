<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $tt = User::where('email',$request->input('email'))->first();
        $ttt = $tt->trangthai ?? null;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Không được để trống',
            'email.email' => 'Định dạng không hợp lệ',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);        
        $taiKhoan = $request->only('email', 'password');
        if(Auth::attempt($taiKhoan)){
            $user = Auth::user();
            session(['id' => $user->id, 
            'name' => $user->hovaten, 
            'chucvu' => $user->phanquyen, 
            'avatar'=>$user->avatar,
        ]);
            $name = $user->hovaten;
            $phanQuyen = $user->phanQuyen;
            $chuyenDoi = intval($phanQuyen);
            if($chuyenDoi == 0 || $chuyenDoi == 1 && $ttt == 0){
                alert()->success('Đăng nhập thành công', 'Chào mừng ' . $name . ' đến với trang quản trị');
                return \redirect()->route('admin.trang-chu');
            }
        }else{
                alert()->error('Đăng nhập không thành công', 'Tài khoản hoặc mật khẩu không chính xác! ');
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
     
        $request->validate([
            'hovaten' => 'required|max:30',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'hovaten.required' => 'Không được để trống',
            'hovaten.max' => 'Mật khẩu không quá 30 ký tự',
            'email.required' => 'Không được để trống',
            'email.email' => 'Định dạng không hợp lệ',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);     
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
