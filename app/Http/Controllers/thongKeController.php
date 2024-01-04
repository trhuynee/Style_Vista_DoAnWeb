<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\hoadonban;
use App\Models\cthdb;
use App\Models\sanpham;


class thongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $nam = $request->input('nam');
        $thang = $request->input('thang');
        if($thang == 0){
            $kq = cthdb::whereHas('hoadonban', function($query) use($nam) {
                $query->where('ttvanchuyen', '2')
                ->whereYear('created_at', $nam);
            })->get();
            $tong = $kq->sum('thanhtien');
            $soluong = $kq->sum('soluong');
        }else{
            $kq = cthdb::whereYear('created_at', $nam)
                        ->whereMonth('created_at', $thang)
                        ->get();
            $tong = $kq->sum('thanhtien');
            $soluong = $kq->sum('soluong');
        }
        return view('admin.thong-ke.index', compact('kq', 'tong', 'soluong', 'nam', 'thang'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function thongKeDonHang(Request $request)
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
