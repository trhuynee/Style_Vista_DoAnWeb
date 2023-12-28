@extends('layout.index')

@section('title', 'Thanh toán')

@section('content')
    <style>
        .cach {
            margin-top: 20px;
        }
    </style>
    <div class="thanh-toan">
        <div class="container">
            <form action="{{ route('khach-hang.xu-li-thanh-toan-1') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="right-content">
                            <table class="table" style="color:#111;">
                                <tbody>
                                    <tr>
                                        <td rowspan="2" style="width:100px;padding-left:0; padding-right:0;">
                                            <img class="img-fluid"
                                                src="https://cdn2.yame.vn/pimg/cart-thumb/28ae7f09-14dc-ed00-7e2f-001a6e0ccc03.jpg?w=70&amp;h=100&amp;c=true"
                                                alt="Áo Thun Cổ Tròn Tay Ngắn Sợi Nhân Tạo Co Giãn Trơn Dáng Vừa Đơn Giản Cosmo 26">
                                            <div>
                                                <input type="hidden" name="__ProductUpc" value="0022206003">
                                                <a href="javascript:void(0);" class="js-removeFromCart"><span
                                                        class="icon-delete"></span> Xóa</a>
                                            </div>
                                        </td>
                                        @foreach ($sanpham as $sp)
                                            <td style="padding-left:0; padding-right:0;">
                                                <p class="mb-1">
                                                    <a href="/shop/ao-thun-don-gian-sale/ao-thun-co-tron-y1-m26-0022206?c=Xám Ghi"
                                                        style="font-size:14px;">{{ $sp['tenSP'] }}</a>
                                                    <input name="idSP" type="hidden" value="{{ $sp['idSP'] }}">
                                                </p>
                                                @foreach ($tenmau as $item)
                                                    <input name="mau" type="hidden" value="{{ $item->id }}">
                                                    <p>Màu: {{ $item->tenmau }}
                                                    </p>
                                                @endforeach
                                                <p>Kích thước:
                                                    @if ($sp['kt'] == 0)
                                                        A
                                                    @elseif ($sp['kt'] == 1)
                                                        B
                                                    @elseif ($sp['kt'] == 2)
                                                        C
                                                    @elseif ($sp['kt'] == 3)
                                                        D
                                                    @elseif ($sp['kt'] == 4)
                                                        E
                                                    @endif
                                                    <input name="kichthuoc" type="hidden" value="{{ $sp['kt'] }}">
                                                </p>
                                                <input name="soluong" type="hidden" value="{{ $sp['soluong'] }}">
                                                <p>Số lượng: {{ $sp['soluong'] }}</p>
                                                <p>Giá: {{ $sp['gia'] }}</p>
                                                <hr>
                                        @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left:0; padding-right:0;">
                                            <div style="display:none;">
                                                <span style="font-size:11px;">Mã giảm giá</span>
                                                <input type="hidden" name="__ProductUpc" value="0022206003">
                                                <input type="hidden" name="__Qty" value="1">
                                                <div class="form-group mb-2">
                                                    <input class="form-control-sm" type="text" placeholder=""
                                                        style="width:150px;" name="__txtVoucher">
                                                </div>
                                                <button type="submit" class="btn-sm btn-outline-secondary mb-2"
                                                    style="height:31px;">Thêm mã</button>
                                            </div>
                                            = <b>{{ $giasp }} <span>đ</span></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="padding-left:0; padding-right:0;">
                                            Giao hàng
                                        </td>
                                        <td>
                                            <div style="font-size:16px; color:#f00;">
                                                @if ($giasp > 499999)
                                                    Miễn phí giao hàng
                                                @else
                                                    19000đ
                                                @endif
                                            </div>
                                            <div style="font-size:16px; color:#111;">* Miễn phí với đơn hàng từ <b>500K</b>.
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" style="padding-left:0; padding-right:0;">
                                            Tổng:
                                        </td>
                                        <td>
                                            <div id="grandTotal" style="font-size:16px; color:#f00;"><b>{{ $tong }}
                                                    <span>đ</span></b></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5>Thông tin đơn hàng</h5>
                        <div class="cach">
                            <input type="text" name="hovaten" class="form-control" id="inputAddress"
                                value="{{ $nguoiDung->hovaten }}" readonly>
                        </div>
                        <div class="row cach">
                            <div class="col-lg-8">
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    value="{{ $nguoiDung->email }}" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="sdt" class="form-control" id="inputAddress2"
                                    value="{{ $nguoiDung->sdt }}" readonly>
                            </div>
                        </div>
                        <div class="row cach">
                            <div class="col-lg-8">
                                <select name="diachi" class="form-control">
                                    @foreach ($diachi as $item)
                                        <option value="{{ $item->diachi }}">{{ $item->diachi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <a href="{{route('khach-hang.trang-dia-chi')}}" class="form-control">Thêm địa chỉ</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
