@extends('layout.index')

@section('title', 'Thông tin khách hàng')

@section('content')
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-content">
                        <li><a href="/thong-tin-khach-hang">Thông tin tài khoản</a></li>
                        <li><a href="/don-hang">Đơn hàng của bạn</a></li>
                        <li><a href="/doi-mat-khau">Đổi mật khẩu</a></li>
                        <li><a href="/dia-chi">Sổ địa chỉ</a></li>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="right-content">
                        <h4>THÔNG TIN KHÁCH HÀNG</h4>
                        <p><strong>Họ tên: </strong>{{ $kh->hovaten }}</p>
                        <p><strong>Email: </strong>{{ $kh->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
