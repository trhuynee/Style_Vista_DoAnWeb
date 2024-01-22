<?php

namespace App\Http\Controllers;

// danhSachYeuThichController.php
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class danhSachYeuThichController extends Controller
{
    public function themVaoYeuThich($id)
    {
        $product = SanPham::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }

        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            // Lấy danh sách yêu thích từ user
            $dsyt = Auth::user()->danhSachYeuThich;

            // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích của user hay chưa
            if (!$dsyt->contains($id)) {
                // Thêm sản phẩm vào danh sách yêu thích
                $dsyt->push($id);
                // Auth::user()->save();

                return response()->json(['success' => true, 'message' => 'Sản phẩm đã được thêm vào danh sách yêu thích.']);
            }

            return response()->json(['success' => false, 'message' => 'Sản phẩm đã có trong danh sách yêu thích.']);
        }

        return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập để thêm sản phẩm vào danh sách yêu thích.']);
    }
}
