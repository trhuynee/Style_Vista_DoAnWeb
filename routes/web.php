<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\loginController;
use App\Http\controllers\sanPhamController;
use App\Http\controllers\taiKhoanKhachHangController;
use App\Http\controllers\taiKhoanAdminController;
use App\Http\controllers\mauController;
use App\Http\controllers\nhanHieuController;
use App\Http\controllers\loaiSanPhamController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/dang-nhap',[loginController::class,'login'])->name('xu-li-dang-nhap');
Route::get('/dang-nhap', function () {
    return view('login');
})->name('dang-nhap');

Route::get('/',[sanPhamController::class,'trangchu'])->name('trang-chu-nguoi-dung');
Route::get('/chi-tiet-san-pham/{id}', [sanPhamController::class, 'ctsanpham'])->name('trang-chi-tiet-san-pham');
Route::post('/chi-tiet-san-pham/{id}',[sanPhamController::class,'binhluan'])->name('xu-li-binh-luan');

Route::get('/gioi-thieu', function () {
    return view('user.gioi-thieu');
})->name('trang-gioi-thieu');

Route::get('/san-pham', function () {
    return view('user.san-pham');
})->name('trang-san-pham');
Route::get('/lien-he', function () {
    return view('user.lien-he');
})->name('trang-lien-he');


Route::get('/gio-hang', function () {
    return view('user.gio-hang');
})->name('trang-gio-hang');

Route::get('/404', function () {
    return view('404');
})->name('trang-loi');

/**
     * đăng xuất
 */
Route::post('/dang-xuat', function () {
    Auth::logout();
    session()->flush();
    return redirect()->route('dang-nhap');
})->name('dang-xuat');

Route::post('/dang-nhap',[loginController::class,'login'])->name('xu-li-dang-nhap');
Route::post('/dang-ki',[loginController::class,'register'])->name('xu-li-dang-ki');
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', [loginController::class, 'index'])->name('trang-chu');
    /**
     * tài khoản
     */
    Route::group(['prefix' => '/tai-khoan-admin', 'as' => 'tai-khoan-admin.'], function (){
        Route::get('/danh-sach-tai-khoan-admin', [taiKhoanAdminController::class, 'index'])->name('danh-sach-tai-khoan-admin');
    });

    Route::group(['prefix' => '/tai-khoan-khach-hang', 'as' => 'tai-khoan-khach-hang.'], function (){
        Route::get('/danh-sach-tai-khoan-khach-hang', [taiKhoanKhachHangController::class, 'index'])->name('danh-sach-tai-khoan-khach-hang');
    });

    Route::group(['prefix' => '/tai-khoan', 'as' => 'tai-khoan.'], function (){
        Route::get('/them-tai-khoan', [taiKhoanAdminController::class, 'create'])->name('them-tai-khoan-admin');
        Route::get('/chinh-sua-tai-khoan/{id}', [taiKhoanAdminController::class, 'show'])->name('chinh-sua-tai-khoan');
        Route::post('/them-tai-khoan', [taiKhoanAdminController::class, 'store'])->name('xu-li-them-tai-khoan-admin');
        Route::post('/chinh-sua-tai-khoan/xoa-tai-khoan/{id}', [taiKhoanAdminController::class, 'destroy'])->name('xu-li-xoa-tai-khoan');
        Route::post('/chinh-sua-tai-khoan/cap-nhat-trang-thai/{id}', [taiKhoanAdminController::class, 'update'])->name('cap-nhat-trang-thai-tai-khoan');
        Route::post('/chinh-sua-tai-khoan/cap-nhat-mat-khau/{id}', [taiKhoanAdminController::class, 'editPassWord'])->name('cap-nhat-mat-khau');
        Route::post('/chinh-sua-tai-khoan/{id}', [taiKhoanAdminController::class, 'edit'])->name('xu-li-cap-nhat-tai-khoan');
    });
    /**
     * Sản phẩm
     */
    Route::group(['prefix' => '/san-pham', 'as' => 'san-pham.'], function (){
        Route::get('/danh-sach-san-pham', [sanPhamController::class, 'index'])->name('danh-sach-san-pham');
       /** Route::get('/chi-tiet-san-pham', [sanPhamController::class, 'create'])->name('chi-tiet-san-pham');*/
        Route::get('/them-san-pham', [sanPhamController::class, 'create'])->name('them-san-pham');
        Route::get('/chi-tiet-san-pham/{id}', [sanPhamController::class, 'chiTietSanPham'])->name('chi-tiet-san-pham');
        Route::post('/them-san-pham', [sanPhamController::class, 'store'])->name('xu-li-them-san-pham');
        Route::get('/them-san-pham-con/{id}', [sanPhamController::class, 'show'])->name('them-san-pham-con');
        Route::post('/them-san-pham-con/{id}', [sanPhamController::class, 'update'])->name('xu-li-them-san-pham-con');
        Route::post('/xoa-hinh/{id}', [sanPhamController::class, 'xoaAnh'])->name('xu-li-xoa-hinh');
    });
    Route::group(['prefix' => '/loai-san-pham', 'as' => 'loai-san-pham.'], function (){
        Route::get('/loai-san-pham', [loaiSanPhamController::class, 'index'])->name('loai-san-pham');
        Route::post('/loai-san-pham/them-loai-san-pham', [loaiSanPhamController::class, 'store'])->name('them-loai-san-pham');
    });
    Route::group(['prefix' => '/mau-san-pham', 'as' => 'mau-san-pham.'], function (){
        Route::get('/mau-san-pham', [mauController::class, 'index'])->name('mau-san-pham');
        Route::post('/mau-san-pham/them-mau-san-pham', [mauController::class, 'store'])->name('them-mau-san-pham');
    });
    Route::group(['prefix' => '/nhan-hieu-san-pham', 'as' => 'nhan-hieu-san-pham.'], function (){
        Route::get('/nhan-hieu-san-pham', [nhanHieuController::class, 'index'])->name('nhan-hieu-san-pham');
        Route::post('/nhan-hieu-san-pham/them-nhan-hieu-san-pham', [nhanHieuController::class, 'store'])->name('them-nhan-hieu-san-pham');
    });
});
