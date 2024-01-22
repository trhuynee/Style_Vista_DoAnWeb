<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\SanPham;

class gioHangController extends Controller
{
    // Trong gioHangController.php
    public function addToCart($id, Request $request)
    {
        // Kiểm tra xem sản phẩm có tồn tại không, và lấy thông tin sản phẩm từ database
        $sanpham = SanPham::find($id);

        if (!$sanpham) {
            return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
        }

        // Lấy giỏ hàng từ session
        $giohang = Session::get('gio-hang',
            []
        );

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $sanphamID = array_search($id, array_column($giohang, 'id'));

        $quantity = $request->input('quantity', 1); // Get the quantity from the request

        if ($sanphamID !== false) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $giohang[$sanphamID]['quantity'] += $quantity;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $giohang[] = [
                'id' => $sanpham->id,
                'name' => $sanpham->tensanpham,
                'price' => $sanpham->dongia,
                'quantity' => $quantity,
                // 'image' => $sanpham->hinhanh, // Thêm thông tin hình ảnh vào giỏ hàng
            ];
        }

        // Lưu giỏ hàng mới vào session
        Session::put('gio-hang', $giohang);

        return response()->json(['message' => 'Đã thêm sản phẩm vào giỏ hàng.']);
    }


    public function showCart()
    {
        // Kiểm tra đăng nhập
        if (Auth::check()) {
            $user = Auth::user();
            $gioHang = session()->get('gio-hang', []);
            $gioHangUser = collect($gioHang)->where('user_id', $user->id)->all();
            $total = 0;

            return view('user.gio-hang', compact('gioHangUser', 'total'));
        } else {
            return redirect()->route('dang-nhap');
        }
    }

}

// public function index()
//     {
//         $gioHang = giohang::all();
//         return view('user.gio-hang', compact('gioHang'));
//     }
