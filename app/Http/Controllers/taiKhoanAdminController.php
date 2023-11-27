<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class taiKhoanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('phanquyen', 1)->get();
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
        $request->validate([
            'sdt' => 'required|size:10',
            'hovaten' => 'required|max:30',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'diachi' => 'required|max:255',
            'phanquyen' => 'required',
        ], [
            'sdt.required' => 'Không được để trống',
            'sdt.size' => 'Số điện thoại phải đủ 10 số',
            'email.required' => 'Không được để trống',
            'email.unique' => 'email đã tồn tại',
            'email.email' => 'Định dạng không hợp lệ',
            'hovaten.required' => 'Không được để trống',
            'hovaten.max' => 'Mật khẩu không quá 30 ký tự',
            'password.required' => 'Không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'diachi.max' => 'Địa chỉ không quá 255 ký tự',
            'diachi.required' => 'Không được để trống',
            'phanquyen.required' => 'Không được để trống',
        ]);     
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
        Alert()->success('Thành công','Thêm tài khoản thành công.');
        return \redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)    
    {
        $user = User::where('id', $id)->first();
        if(!$user){
            return view('404');
        }
        return view('admin.tai-khoan.chinh-sua-tai-khoan', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPassWord(Request $request, string $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return \redirect()->back();
    }
    public function edit(Request $request, string $id)
    {
        $request->validate([
            'sdt' => 'required|size:10',
            'hovaten' => 'required|max:30',
            'diachi' => 'required|max:255',
        ], [
            'sdt.required' => 'Không được để trống',
            'sdt.size' => 'Số điện thoại phải đủ 10 số',
            'hovaten.required' => 'Không được để trống',
            'hovaten.max' => 'Mật khẩu không quá 30 ký tự',
            'diachi.max' => 'Địa chỉ không quá 255 ký tự',
            'diachi.required' => 'Không được để trống',
        ]);     
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('public/avatars', $filename);
            $avatarUrl = '/storage/avatars/' . $filename;
        } else {
            $avatarUrl = null;
        }
        $user = User::find($id);
        $user->hovaten = $request->input('hovaten') ?? $user->hovaten;
        $user->sdt = $request->input('sdt') ?? $user->sdt;
        $user->diachi = $request->input('diachi') ?? $user->diachi;
        $user->phanquyen = $request->input('phanquyen') ?? $user->phanquyen;
        $user->avatar = $avatarUrl ?? $user->avatar;
        $user->updated_at = now();
        $user->save();
        Alert()->success('Thành công','Chỉnh sửa tài khoản thành công.');
        return redirect()->back();
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->trangthai = $request->input('phanquyen');
        $user->save();
        return \redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $phanquyen = $user->phanquyen;
        if($user){
            if($phanquyen==1){
                $user->delete();
                return \redirect()->route('admin.tai-khoan-admin.danh-sach-tai-khoan-admin');
            }else{
                $user->delete();
                return \redirect()->route('admin.tai-khoan-khach-hang.danh-sach-tai-khoan-khach-hang');
            }
            
        }else{
            return redirect()->route('admin.trang-chu');
        }
    }
}
