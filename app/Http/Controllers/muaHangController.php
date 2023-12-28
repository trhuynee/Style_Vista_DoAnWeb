<?php

namespace App\Http\Controllers;
use App\Models\Mau;
use App\Models\SanPham;
use App\Models\CTHDB;
use App\Models\diachi;
use App\Models\hoadonban;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\ChiTietSanPham;

class muaHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(Auth::check()){
        
        $nguoiDung = Auth::user();
        $diachi = diachi::where('user_id', $nguoiDung->id)->get();
        session()->forget('sanpham');
        $mau = $request->input('mau');
        $kt = $request->input('kt');
        $soluong=$request->input('soluong');
        $gia = $request->input('gia');
        $tenSP = $request->input('tenSP');
        $idSP = $request->input('idSP');
        $sanpham = session()->get('sanpham', []);
        $sanpham[]=[
            'idSP' => $idSP,
            'kt' =>  $kt,
            'mau' =>  $mau,
            'soluong' => $soluong,
            'gia' => $gia,
            'tenSP' => $tenSP,
        ];
        session(['sanpham' => $sanpham]);
        $tenmau = Mau::where('id', $mau)->get();
        $giasp = $gia * $soluong;
        if($giasp>499999){
            $tong = $giasp;
        }else{
            $tong = $giasp + 19000;
        }
        $chiTietSanPham = chitietsanpham::where('sanpham_id', $idSP)
        ->where('mau_id', $mau)
        ->where('size', $kt)
        ->first();
        if($soluong <= $chiTietSanPham->soluong){
            return view('user.thanh-toan', compact('diachi','sanpham', 'tenmau','giasp', 'tong', 'nguoiDung'));
        }
        Alert()->error('Thất bại', 'không đủ số lượng');
        return \redirect()->back();
        }else{
            return redirect()->route('dang-nhap');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mau = $request->input('mau');
        $kt = $request->input('kichthuoc');
        $sl = $request->input('soluong');
        $diachi = $request->input('diachi');
        $idSP = $request->input('idSP');
        $chiTietSanPham = chitietsanpham::where('mau_id', $mau)
        ->where('size', $kt)
        ->first();
        $idct = $chiTietSanPham->id;
        $sp = $chiTietSanPham->sanpham_id;
        //
        $phigiaohang = 19000;
        $sanp = sanpham::where('id', $idSP)->first();
        $tien = ($sanp->dongia - (($sanp->dongia / 100) * $sanp->giamgia)) * $sl;
        if($tien > 499999){
            $tien = ($sanp->dongia - (($sanp->dongia / 100) * $sanp->giamgia)) * $sl;
        }else{
            $tien = (($sanp->dongia - (($sanp->dongia / 100) * $sanp->giamgia)) * $sl) + 19000;

        }
        if($tien > 499999){
            $phigiaohang = 0;
        }
        if(Auth::check()){
                if($sl <= $chiTietSanPham->soluong){
                    $user = Auth::user();
                    $hoadonban = new hoadonban;
                    $hoadonban->ma_kh = $user->id;
                    $hoadonban->ngay_lap_hoa_don = Carbon::now();
                    $hoadonban->save();

                    $CTHD = new CTHDB;
                    $CTHD->ma_hd = $hoadonban->id;
                    $CTHD->sp_id = $sp;
                    $CTHD->chitietietsp_id = $idct;
                    $CTHD->soluong = $sl;
                    $CTHD->giaohang = $phigiaohang;
                    $CTHD->thanhtien = $tien;
                    $CTHD->diachi = $diachi;
                    $CTHD->save();

                    $tongsl = $chiTietSanPham->soluong - $sl; 

                    $ctsp = chitietsanpham::find($idct);
                    $ctsp->update(['soluong' => $tongsl]);

                    return \redirect()->route('khach-hang.trang-don-hang');
                }else{
                    Alert()->error('Thất bại', 'Số lượng không đủ');
                }            
        }else{
            return \redirect()->route('dang-nhap');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if(Auth::check()){
            $user = Auth::user();
            $donhang = hoadonban::where('ma_kh', $user->id)->get();
        }else{
            return \redirect()->route('dang-nhap');
        }
        return view('user.don-hang', compact('donhang'));
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
    public function huyHang(string $id)
    {
        $hoadonban = hoadonban::find($id);
        $CTHDB = CTHDB::where('ma_hd', $hoadonban->id)->first();
        $sp = chitietsanpham::where('id', $CTHDB->chitietietsp_id)->first();
        $sp->update(['soluong' => $CTHDB->soluong + $sp->soluong]);
        $hoadonban->update(['ttvanchuyen' => 3, 'updated_at' => Carbon::now()]);

        return \redirect()->back();
    }
    public function nhanHang(string $id)
    {
        $hoadonban = hoadonban::find($id);
        $hoadonban->update(['ttvanchuyen' => 2, 'updated_at' => Carbon::now()]);

        return \redirect()->back();
    }
    public function hoanTra(string $id)
    {
        $hoadonban = hoadonban::find($id);
        

        $CTHDB = CTHDB::where('ma_hd', $hoadonban->id)->first();
        $sp = chitietsanpham::where('id', $CTHDB->chitietietsp_id)->first();
        $sp->update(['soluong' => $CTHDB->soluong + $sp->soluong]);

        $hoadonban->update(['ttvanchuyen' => 4, 'updated_at' => Carbon::now()]);
        return \redirect()->back();
    }
     /**
     * Địa chỉ
     */
    public function diaChiIndex()
    {
        if(Auth::check()){
            $user = Auth::user();
            $diachi = diachi::where('user_id', $user->id)->get();
            return view('user.dia-chi', compact('diachi'));
        }else{
            return view('login');
        }
    }
    public function themDiaChi(Request $request)
    {
        $diachi = diachi::create($request->all());
        Alert()->success('Thành công','Thêm địa chỉ thành công.');
        return \redirect()->back();
    }
     /**
     * kết thúc
     */
}
