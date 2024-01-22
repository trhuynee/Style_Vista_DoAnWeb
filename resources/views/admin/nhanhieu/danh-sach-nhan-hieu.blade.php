@extends('admin.index')
@section('title', 'Nhãn hiệu sản phẩm')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới nhãn hiệu sản phẩm</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.nhan-hieu-san-pham.them-nhan-hieu-san-pham') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="inputEmail4">Tên nhãn hiệu sản phẩm</label>
                        <input type="text" name="tennhanhieu" class="form-control"
                            placeholder="Tên nhãn hiệu sản phẩm">
                        <div class="error-message">{{ $errors->first('tennhanhieu') }}</div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Trạng thái</label>
                        <select id="inputState" name="trangthai" class="form-control">
                            <option selected value=" ">Trạng thái</option>
                            <option value="0">Xuất bản</option>
                            <option value="1">Nháp</option>
                        </select>
                        <div class="error-message">{{ $errors->first('trangthai') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách nhãn hiệu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên nhãn hiệu</th>
                            <th>Trạng thái</th>
                            <th>Ngày đăng</th>
                            <th>Ngày cập nhật</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên nhãn hiệu</th>
                            <th>Trạng thái</th>
                            <th>Ngày đăng</th>
                            <th>Ngày cập nhật</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($nhanhieu as $item)
                            <tr>
                                <td>{{ $item->tennhanhieu }}</td>
                                <td>
                                    @if ($item->trangthai == 0)
                                        Xuất bản
                                    @else
                                        Nháp
                                    @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="#">Xem chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@section('scr')
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
