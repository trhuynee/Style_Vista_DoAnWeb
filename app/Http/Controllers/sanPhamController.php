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
            'tensanpham' => 'required|unique:sanpham,tensanpham',
            'loaisanpham' => 'required',
            'nhanhieu' => 'required',
            'mota' => 'required',

        ], [
            'giamgia.max' => 'Không được quá 100',
            'giamgia.required' => 'Không được để trống',
            'giamgia.numeric' => 'Phải là một số',
            'giatien.min' => 'Phải lớn hơn 0',
            'giatien.required' => 'Không được để trống',
            'loaisanpham.required' => 'Không được để trống',
            'nhanhieu.required' => 'Không được để trống',
            'mota.required' => 'Không được để trống',
            'tensanpham' => 'Không được để trống',
            'tensanpham.unique' => 'Tên sản phẩm đã tồn tại',

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
        $images = image::where('sp_id', $id)->get();
        $sanphamcon = ChiTietSanPham::where('sanpham_id', $id)->get();
        return view('admin.san-pham.chi-tiet-san-pham', compact('sanpham', 'sanphamcon', 'loaisanpham', 'nhanhieu','images'));
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
    public function xoaAnh(string $id){
        $image = Image::find($id);
        $image->delete();
        Alert()->success('Thành công', 'Xóa hình ảnh thành công');
        return \redirect()->back();
    }
    public function capNhatSanPham(Request $request, string $id){
        $tensanpham = $request->input('tensanpham');
        $loaisanpham = $request->input('loaisanpham');
        $nhanhang = $request->input('nhanhieu');
        $mota = $request->input('mota');
        $dongia = $request->input('dongia');
        $giamgia = $request->input('giamgia');
        $tensanphamExists = SanPham::where('tensanpham', $tensanpham)->exists();
        $loaisanphamExists = SanPham::where('loaisp_id', $loaisanpham)->exists();
        $nhanhangExists = SanPham::where('nh_id', $nhanhang)->exists();
        $motaExists = SanPham::where('mota', $mota)->exists();
        $dongiaExists = SanPham::where('dongia', $dongia)->exists();
        $giamgiaExists = SanPham::where('giamgia', $giamgia)->exists();

        if ($tensanphamExists && $loaisanphamExists && $nhanhangExists && $motaExists) {
            Alert()->error('Thất bại', 'Không có gì để cập nhật');
            return \redirect()->back();
        }else{
            $sanpham = SanPham::find($id);
            $sanpham->update($request->all());
            Alert()->success('Thành công', 'Cập nhật sản phẩm thành công');
            return \redirect()->back();
        }

    }
    public function themAnh(string $id, Request $request){
        foreach ($request->file('images') as $image) {
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            $hinhAnh = new Image;
            $hinhAnh->sp_id = $id;
            $hinhAnh->tenimage = 'uploads/' . $filename;
            $hinhAnh->save(); 
        }
        Alert()->success('Thành công', 'Thêm ảnh sản phẩm thành công');
        return \redirect()->back();
    }
    public function suaAnh(string $id, Request $request){
        if ($request->hasFile('image')) {
            $hinhAnh = $request->file('image');
            $filename = time() . '.' . $hinhAnh->getClientOriginalExtension();
            $hinhAnh->storeAs('public/uploads', $filename);
            $hinhAnhUrl = '/storage/uploads/' . $filename;
        } else {
            $hinhAnhUrl = null;
        }
        $image = Image::find($id);
        $image->tenimage = $hinhAnhUrl;
        $image->save();
        
        
        Alert()->success('Thành công', 'Sửa ảnh sản phẩm thành công');
        return redirect()->back();
        
    }
}
