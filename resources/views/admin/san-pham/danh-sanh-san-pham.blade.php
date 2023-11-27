@extends('admin.index')
@section('title', 'danh sách sản phẩm')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Nhãn hàng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Nhãn hàng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($sanPham as $item)
                            <tr>
                                <td>{{ $item->tensanpham }}</td>
                                <td>{{ $item->loaisanpham->tenloaisp }}</td>
                                <td>{{ $item->nhanhieu->tennhanhieu }}</td>
                                <td>
                                    @if ($item->trangthai == 0)
                                        Xuất bản
                                    @else
                                        Nháp
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.san-pham.chi-tiet-san-pham', ['id' => $item->id])}}" style="color: red">Chi tiết sản phẩm</a>
                                    <a href="{{ route('admin.san-pham.them-san-pham-con', ['id' => $item->id]) }}">Thêm sản phẩm con</a>
                                </td>
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
