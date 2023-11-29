@extends('admin.index')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="form-row">
        <div class="form-group col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="m-0 font-weight-bold text-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Chi tiết sản phẩm
                                    và chỉnh sửa</a>
                            </p>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="card-body">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Mã sản phẩm</label>
                                            <input type="number" name="masp" class="form-control" id="inputEmail4"
                                                value="{{ $sanpham->id }}" readonly>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="inputAddress">Tên sản phẩm</label>
                                            <input type="text" name="tensanpham" class="form-control" id="inputAddress"
                                                value="{{ $sanpham->tensanpham }}">
                                            <div class="error-message">{{ $errors->first('tensanpham') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Loại sản phẩm</label>
                                            <select id="inputState" name="loaisanpham" class="form-control">
                                                <option selected value="{{ $sanpham->loaisanpham->id }}">
                                                    {{ $sanpham->loaisanpham->tenloaisp }}</option>
                                                @foreach ($loaisanpham as $item)
                                                    <option value="{{ $item->id }}">{{ $item->tenloaisp }}</option>
                                                @endforeach

                                            </select>
                                            <div class="error-message">{{ $errors->first('loaisanpham') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Nhãn hiệu</label>
                                            <select id="inputState" name="nhanhieu" class="form-control">
                                                <option selected value="{{ $sanpham->nhanhieu->id }}">
                                                    {{ $sanpham->nhanhieu->tennhanhieu }}</option>
                                                @foreach ($nhanhieu as $item)
                                                    <option value="{{ $item->id }}">{{ $item->tennhanhieu }}</option>
                                                @endforeach
                                            </select>
                                            <div class="error-message">{{ $errors->first('nhanhieu') }}</div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea id="editor" name="mota">{{ $sanpham->mota }}</textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Xác nhận chỉnh sửa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-md-3">
            <div class="form-group">
                <div class="card shadow mb-4">
                    <div class="card-header py-3" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p class="m-0 font-weight-bold text-primary">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Chức năng</a>
                                    </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal"
                                                data-target="#logoutModal1">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Xóa sản phẩm con</span>
                                            </a>
                                        </div>
                                        <form action="#" method="POST">
                                            @csrf
                                            @if ($sanpham->trangthai == 1)
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-icon-split"
                                                        name="phanquyen" value="0">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Kích hoạt sản phẩm</span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-warning btn-icon-split"
                                                        name="phanquyen" value="0">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="text">Vô hiệu hóa</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="card shadow mb-4">
                    <div class="card-header py-3" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p class="m-0 font-weight-bold text-primary">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Hình ảnh
                                        sản phẩm</a>
                                    </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal"
                                                data-target="#logoutModal1">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Xóa sản phẩm con</span>
                                            </a>
                                        </div>
                                        <form action="#" method="POST">
                                            @csrf
                                            @if ($sanpham->trangthai == 1)
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-icon-split"
                                                        name="phanquyen" value="0">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="text">Kích hoạt sản phẩm</span>
                                                    </button>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-warning btn-icon-split"
                                                        name="phanquyen" value="0">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="text">Vô hiệu hóa</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
                    <form action="#" method="POST">
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
                    <form action="#" method="POST">
                        @csrf
                        <input type="password" name="password" class="form-control form-control-user"
                            id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mật khẩu mới...">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Xác nhận</button>
                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm con</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Kích thước</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Kích thước</th>
                            <th>Số lượng</th>
                            <th>Giá tiền</th>
                            <th>Giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sanphamcon as $item)
                            <tr>
                                <td>{{ $item->sanpham->tensanpham }}</td>
                                <td>{{ $item->mau->tenmau }}</td>
                                @if ($item->size == 0)
                                    <td>A</td>
                                @elseif ($item->size == 0)
                                    <td>B</td>
                                @elseif ($item->size == 0)
                                    <td>C</td>
                                @elseif ($item->size == 0)
                                    <td>D</td>
                                @else
                                    <td>E</td>
                                @endif
                                <td>{{ $item->soluong }}</td>
                                <td>{{ $item->dongia }}</td>
                                <td>{{ $item->giamgia }}%</td>
                                <td>
                                    @if ($item->trangthai == 0)
                                        Xuất bản
                                    @else
                                        Nháp
                                    @endif
                                </td>
                                <td>Chỉnh sửa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@section('scr')
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@endsection
