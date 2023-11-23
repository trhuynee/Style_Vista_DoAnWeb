@extends('admin.index')
@section('title', 'Thêm tài khoản')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản @if ($chucvu==0)
                quản trị viên hoặc khách hàng
            @else
                khách hàng
            @endif </h6>
        </div>
        <div class="card-body">
            <form action="{{route('admin.tai-khoan.xu-li-them-tai-khoan-admin')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Họ và tên</label>
                    <input type="text" name="hovaten" class="form-control" id="inputAddress" placeholder="Họ và tên">
                    <div class="error-message">{{ $errors->first('hovaten') }}</div>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Số điện thoại</label>
                    <input type="number" name="sdt" class="form-control" id="inputAddress2" placeholder="Số điện thoại">
                    <div class="error-message">{{ $errors->first('sdt') }}</div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputCity">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control" id="inputCity" placeholder="Địa chỉ">
                        <div class="error-message">{{ $errors->first('diachi') }}</div>
                    </div>
                    @if ($chucvu == 0)
                        <div class="form-group col-md-3">
                            <label for="inputState">Chức vụ</label>
                            <select id="inputState" name="phanquyen" class="form-control">
                                <option selected value=" ">Chức vụ</option>
                                <option value="1" >Quản trị viên</option>
                                <option value="2" >Khách hàng</option>
                            </select>
                            <div class="error-message">{{ $errors->first('phanquyen') }}</div>
                        </div>
                    @else
                        <div class="form-group col-md-3">
                            <label for="inputState">Chức vụ</label>
                            <select id="inputState" name="phanquyen" class="form-control">
                                <option selected value=" ">Chức vụ</option>
                                <option value="2" >Khách hàng</option>
                            </select>
                            <div class="error-message">{{ $errors->first('phanquyen') }}</div>
                        </div>
                    @endif
                    <div class="form-group col-md-4">
                        <label for="inputZip">Hình đại diện</label>
                        <input type="file" name="avatar" class="form-control" id="customFile" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
