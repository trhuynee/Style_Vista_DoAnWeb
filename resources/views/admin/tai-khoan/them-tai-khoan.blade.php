@extends('admin.index')
@section('title', 'Thêm tài khoản')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản quản trị viên </h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Họ và tên</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Số điện thoại</label>
                    <input type="number" class="form-control" id="inputAddress2" placeholder="Số điện thoại">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Địa chỉ</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Địa chỉ">
                    </div>
                    @if ($chucvu == 0)
                        <div class="form-group col-md-4">
                            <label for="inputState">Chức vụ</label>
                            <select id="inputState" class="form-control">
                                <option selected>Chức vụ</option>
                                <option>Quản trị viên</option>
                                <option>Khách hàng</option>
                            </select>
                        </div>
                    @else
                        <div class="form-group col-md-4">
                            <label for="inputState">Chức vụ</label>
                            <select id="inputState" class="form-control">
                                <option selected>Khách hàng</option>
                            </select>
                        </div>
                    @endif
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
@endsection
