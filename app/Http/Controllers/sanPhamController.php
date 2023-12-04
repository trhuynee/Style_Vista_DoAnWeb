<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\Mau;
use App\Models\binhluan;

use App\Models\ChiTietSanPham;
use App\Models\Image;
use App\Models\SanPham;
use App\Models\NhanHieu;

class sanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanPham = SanPham::all();
        return view('admin.san-pham.danh-sanh-san-pham', compact('sanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loaisp = LoaiSanPham::where('trangthai', 0)->get();
        $mau = Mau::where('trangthai', 0)->get();
        $nhanhieu = NhanHieu::where('trangthai', 0)->get();
        return view('admin.san-pham.them-san-pham', compact('loaisp','nhanhieu','mau'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'giatien' => 'required|numeric|min:1',
            'giamgia' => 'required|numeric|max:100',
        ], [
            'giamgia.max' => 'Không được quá 100',
            'giamgia.required' => 'Không được để trống',
            'giamgia.numeric' => 'Phải là một số',
            'giatien.min' => 'Phải lớn hơn 0',
            'giatien.required' => 'Không được để trống',
        ]);     
        $sanPham = new SanPham;
        $sanPham->tensanpham = $request->input('tensanpham');
        $sanPham->loaisp_id = $request->input('loaisanpham');
        $sanPham->nh_id = $request->input('nhanhieu');
        $sanPham->mota = $request->input('mota');
        $sanPham->dongia = $request->input('giatien');
        $sanPham->giamgia = $request->input('giamgia');
        $sanPham->trangthai = '0';
        $sanPham->save();

        foreach ($request->file('images') as $image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $hinhAnh = new Image;
            $hinhAnh->sp_id = $sanPham->id;
            $hinhAnh->tenimage = 'uploads/' . $filename;
            $hinhAnh->save(); 
        }
        Alert()->success('Thành công','Thêm sản phẩm thành công.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = SanPham::find($id);
        $mau = Mau::where('trangthai', 0)->get();
        return view('admin.san-pham.them-san-pham-con', compact('product', 'mau'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kichthuoc' => 'required',
            'mau' => 'required',
            'soluong' => 'required|numeric|min:1',
        ], [
            'soluong.numeric' => 'Phải là một số',
            'giatien.numeric' => 'Phải là một số',
            'kichthuoc.required' => 'Không được để trống',
            'mau.required' => 'Không được để trống',
            'soluong.required' => 'Không được để trống',
            'soluong.min' => 'Phải lớn hơn 0',
        ]);     
        if(ChiTietSanPham::where('mau_id', $request->input('mau'))->exists() && ChiTietSanPham::where('size', $request->input('kichthuoc'))->exists()){
            Alert()->error('Thất bại','Sản phẩm đã tồn tại bạn chỉ có thể chỉnh sửa.');
            return \redirect()->back();
        }
        $ChiTietSanPham = new ChiTietSanPham;
        $ChiTietSanPham->sanpham_id = $request->input('masp');
        $ChiTietSanPham->mau_id = $request->input('mau');
        $ChiTietSanPham->size = $request->input('kichthuoc');
        $ChiTietSanPham->soluong = $request->input('soluong');
        $ChiTietSanPham->trangthai = '0';
        $ChiTietSanPham->save();
        Alert()->success('Thành công','Thêm sản phẩm thành công.');
        return \redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function chiTietSanPham(string $id)
    {
        $loaisanpham = LoaiSanPham::where('trangthai', 0)->get();
        $nhanhieu = NhanHieu::where('trangthai', 0)->get();
        $sanpham = SanPham::find($id);
        $sanphamcon = ChiTietSanPham::where('sanpham_id', $id)->get();
        return view('admin.san-pham.chi-tiet-san-pham', compact('sanpham', 'sanphamcon', 'loaisanpham', 'nhanhieu'));
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function trangchu()
    {
        $ctsp = SanPham::all();
        return view('user.home', compact('ctsp'));
    }
    public function ctsanpham(string $id){
        $binhluan = binhluan::where('sanpham_id', $id)->get();
        $sanpham = SanPham::find($id);
        $images = image::where('sp_id', $id)->get();
        $giamgia = $sanpham->giamgia;
        $dongia = $sanpham->dongia;
        $giaGiam = ($dongia * $giamgia) / 100;
        $gia = $dongia - $giaGiam;
        $ChiTietSanPham = ChiTietSanPham::where('sanpham_id', $id)->get()->unique('mau.tenmau');
        $ChiTietSanPham1 = ChiTietSanPham::where('sanpham_id', $id)->get();

        return view('user.chi-tiet-san-pham', compact('images','ChiTietSanPham','ChiTietSanPham1','gia','binhluan', 'sanpham'));
    }
    public function binhluan(Request $request, string $id){
        $binhluan = new binhluan;
        $binhluan->nguoidung_id = session('id');
        $binhluan->sanpham_id = $id;
        $binhluan->noidung= $request->input('noidung');
        $binhluan->save();
        return \redirect()->back(); 
    }
}
