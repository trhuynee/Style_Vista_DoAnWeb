@extends('admin.index')
@section('title', 'Đơn hàng mới')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng mới</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên đơn hàng</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Địa chỉ</th>
                            <th>Chức năng</th>
                            <th>Chi tiết đơn hàng</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên đơn hàng</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Địa chỉ</th>
                            <th>Chức năng</th>
                            <th>Chi tiết đơn hàng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($donhang as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->cthdb->sanpham->tensanpham }}</td>
                                <td>{{ $item->cthdb->soluong }}</td>
                                <td>{{ $item->cthdb->thanhtien }}</td>
                                <td>{{ $item->cthdb->diachi }}</td>
                                <td>
                                    <form action="{{ route('admin.don-hang.xu-li-giao-don-hang', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit">Tiến hàng giao</button>
                                    </form>
                                    <a href="#" class="btn"
                                        style="background-color: rgb(182, 182, 182); color:rgb(255, 255, 255)"
                                        data-toggle="modal" data-target="#logoutModal1">Hủy đơn hàng</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.don-hang.chi-tiet-don-hang', ['id' => $item->id]) }}">
                                        <button type="submit">Chi tiết đơn hàng</button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                            <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hủy đơn hàng?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Xác nhận hủy đơn hàng!.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Hủy</button>
                                            <form
                                                action="{{ route('admin.don-hang.xu-li-don-hang-huy', ['id' => $item->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit">Xác nhận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
