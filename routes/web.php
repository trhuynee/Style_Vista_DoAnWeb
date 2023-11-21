<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\loginController;
use App\Http\controllers\sanPhamController;
use App\Http\controllers\taiKhoanAdminController;


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

Route::get('/dang-nhap', function () {
    return view('login');
});
Route::get('/', function () {
    return view('user.index');
})->name('trang-chu-nguoi-dung');
Route::get('/404', function () {
    return view('404');
})->name('trang-loi');
Route::post('/dang-nhap',[loginController::class,'login'])->name('xu-li-dang-nhap');
Route::post('/dang-ki',[loginController::class,'register'])->name('xu-li-dang-ki');
Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::get('/', [loginController::class, 'index'])->name('trang-chu');
    /**
     * tài khoản
     */
    Route::group(['prefix' => '/tai-khoan', 'as' => 'tai-khoan.'], function (){
        Route::get('/danh-sach-tai-khoan-admin', [taiKhoanAdminController::class, 'index'])->name('danh-sach-tai-khoan-admin');
        Route::get('/them-tai-khoan-admin', [taiKhoanAdminController::class, 'create'])->name('them-tai-khoan-admin');
    });
    /**
     * Sản phẩm
     */
    Route::group(['prefix' => '/san-pham', 'as' => 'san-pham.'], function (){
        Route::get('/danh-sach-san-pham', [sanPhamController::class, 'index'])->name('san-pham');
    });
});
