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
                        <h4>ĐỔI MẬT KHẨU</h4>
                        <div class="row">
                            <div class="page-login">
                                <form method="post" action="" id="change_customer_password" accept-charset="UTF-8">
                                    <input name="FormType" type="hidden" value="change_customer_password"><input
                                        name="utf8" type="hidden" value="true">
                                    <p>
                                        Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 6 kí tự
                                    </p>
                                    <div class="form-signup clearfix">
                                        <div class="form-group">
                                            <label for="oldPass">Mật khẩu cũ</label>
                                            <input type="password" name="OldPassword" id="OldPass" required=""
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="changePass">Mật khẩu mới</label>
                                            <input type="password" name="Password" id="changePass" required=""
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmPass">Xác nhận lại mật khẩu </label>
                                            <input type="password" name="ConfirmPassword" id="confirmPass" required=""
                                                class="form-control">
                                        </div>
                                        <button class="btn btn-light">Đặt lại mật khẩu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
