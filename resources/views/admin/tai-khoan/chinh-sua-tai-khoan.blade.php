@extends('admin.index')
@section('title', 'Chỉnh sửa tài khoản')
@section('content')
    <div class="form-row">
        <div class="form-group col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa tài khoản @if ($user->phanquyen == 0)
                            quản trị viên
                        @else
                            khách hàng
                        @endif
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tai-khoan.xu-li-cap-nhat-tai-khoan', ['id' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    placeholder="{{ $user->email }}" readonly>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Họ và tên</label>
                            <input type="text" name="hovaten" class="form-control" id="inputAddress"
                                placeholder="{{ $user->hovaten }}">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Số điện thoại</label>
                            <input type="number" name="sdt" class="form-control" id="inputAddress2"
                                placeholder="{{ $user->sdt }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="inputCity">Địa chỉ</label>
                                <input type="text" name="diachi" class="form-control" id="inputCity"
                                    placeholder="{{ $user->diachi }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="inputState">Chức vụ</label>
                                <select id="inputState" name="phanquyen" class="form-control">
                                    @if ($user->phanquyen == 1)
                                        <option selected value="1">Quản trị viên</option>
                                    @else
                                        <option selected value="2">Khách hàng</option>
                                    @endif
                                    </option>
                                    @if ($user->phanquyen == 1)
                                        <option value="1">Quản trị viên</option>
                                        <option value="2">Khách hàng</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Hình đại diện</label>
                                <input type="file" name="avatar" class="form-control" id="customFile" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận chỉnh sửa</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chức năng </h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal"
                            data-target="#logoutModal1">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Xóa tài khoản</span>
                        </a>
                    </div>
                    <form action="{{ route('admin.tai-khoan.cap-nhat-trang-thai-tai-khoan', ['id' => $user->id]) }}"
                        method="POST">
                        @csrf
                        @if ($user->trangthai == 0)
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning btn-icon-split" name="phanquyen"
                                    value="1">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">Vô hiệu hóa tài khoản</span>
                                </button>
                            </div>
                        @else
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-icon-split" name="phanquyen"
                                    value="0">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Kích hoạt tài khoản</span>
                                </button>
                            </div>
                        @endif
                    </form>


                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal"
                        data-target="#logoutModal2">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Đổi mật khẩu</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa tài khoản?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Xác nhận xóa tài khoản!!!.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <form action="{{ route('admin.tai-khoan.xu-li-xoa-tai-khoan', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tai-khoan.cap-nhat-mat-khau', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Mật khẩu mới...">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Xác nhận</button>
                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            var passwordInput = document.querySelector('input[name="password"]');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        }
    </script>

@endsection
