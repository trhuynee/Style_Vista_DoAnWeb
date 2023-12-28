@extends('admin.index')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
                </div>
                <div class="card-body">
                    <strong>Tên khách hàng: {{ $user->hovaten }}</strong><br>
                    <strong>Số điện thoại: {{ $user->sdt }}</strong><br>
                    <strong>Email: {{ $user->email }}</strong><br>
                    <strong>Địa chỉ: {{ $user->diachi }}</strong>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                </div>
                <div class="card-body">
                    <strong>Trạng thái đơn hàng:
                        @if ($hoadonban->ttvanchuyen == 0)
                            Chuẩn bị đơn hàng
                        @elseif($hoadonban->ttvanchuyen == 1)
                            Đang vận chuyển
                        @elseif($hoadonban->ttvanchuyen == 2)
                            Đã nhận được hàng
                        @elseif($hoadonban->ttvanchuyen == 3)
                            Đã hủy
                        @elseif($hoadonban->ttvanchuyen == 4)
                            Hoàn trả
                        @endif
                    </strong><br>
                    <strong>Trạng thái thanh toán:
                        @if ($hoadonban->tttoan == 0)
                            Chưa thanh toán
                        @else
                            Đã thanh toán
                        @endif
                    </strong><br>
                    <strong>Ngày lập hóa đơn: {{ $hoadonban->ngay_lap_hoa_don }}</strong><br>
                    <strong>Mã đơn hàng: {{ $hoadonban->id }}</strong><br>
                    <strong>Tên sản phẩm: {{ $hoadonban->cthdb->sanpham->tensanpham }}</strong><br>
                    <strong>Số lượng: {{ $hoadonban->cthdb->soluong }}</strong><br>
                    <strong>Kích thước:
                        @if ($hoadonban->cthdb->size == 0)
                            A
                        @elseif ($hoadonban->cthdb->size == 1)
                            B
                        @elseif ($hoadonban->cthdb->size == 2)
                            C
                        @elseif ($hoadonban->cthdb->size == 3)
                            D
                        @elseif ($hoadonban->cthdb->size == 4)
                            E
                        @endif
                    </strong><br>
                    <strong>Màu: {{ $hoadonban->cthdb->chiTietSanPham->mau->tenmau }}</strong><br>
                    <strong>Địa chỉ: {{ $hoadonban->cthdb->diachi }}</strong><br>
                    <hr>
                    <strong>Giá sản phẩm: {{ $hoadonban->cthdb->sanpham->dongia }}</strong><br>
                    <strong>Giảm giá: {{ $hoadonban->cthdb->sanpham->giamgia }}</strong><br>
                    <strong>Số lượng: {{ $hoadonban->cthdb->soluong }}</strong><br>
                    <hr>
                    @php
                        $giamgia = $hoadonban->cthdb->sanpham->dongia - ($hoadonban->cthdb->sanpham->dongia / 100) * $hoadonban->cthdb->sanpham->giamgia;
                        $tong = $giamgia * $hoadonban->cthdb->soluong;
                    @endphp
                    @if ($tong > 499999)
                        <strong>Tổng tiền: {{ $tong }}</strong><br>
                    @else
                        <strong>Tổng tiền: {{ $tong + 19000 }}</strong><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
