@extends('admin.index')
@section('title', 'thêm sản phẩm con')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới sản phẩm con</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.san-pham.xu-li-them-san-pham-con', ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Mã sản phẩm</label>
                        <input type="text" name="masp" class="form-control" value="{{$product->id}}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Tên sản phẩm</label>
                        <input type="text" name="tensanpham" class="form-control" value="{{$product->tensanpham}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Loại sản phẩm</label>
                        <input type="text" name="tensanpham" class="form-control" value="{{$product->loaisanpham->tenloaisp}}" readonly>
                        <div class="error-message">{{ $errors->first('tensanpham') }}</div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Nhãn hàng</label>
                        <input type="text" name="tensanpham" class="form-control" value="{{$product->nhanhieu->tennhanhieu}}" readonly>
                        <div class="error-message">{{ $errors->first('tensanpham') }}</div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputState">Kích thước</label>
                        <select id="inputState" name="kichthuoc" class="form-control">
                            <option selected value=" ">Kích thước</option>
                                <option value="0">A</option>
                                <option value="1">B</option>
                                <option value="2">C</option>
                                <option value="3">D</option>
                                <option value="4">E</option>
                        </select>
                        <div class="error-message">{{ $errors->first('kichthuoc') }}</div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Màu</label>
                        <select id="inputState" name="mau" class="form-control">
                            <option selected value=" ">Màu</option>
                            @foreach ($mau as $item)
                                <option value="{{ $item->id }}">{{ $item->tenmau }}</option>
                            @endforeach
                        </select>
                        <div class="error-message">{{ $errors->first('mau') }}</div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Giá tiền</label>
                        <input type="number" name="giatien" class="form-control" placeholder="Giá tiền">
                        <div class="error-message">{{ $errors->first('giatien') }}</div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Giảm giá</label>
                        <input type="number" name="giamgia" class="form-control" placeholder="Giảm giá">
                        <div class="error-message">{{ $errors->first('giamgia') }}</div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputEmail4">Số lượng</label>
                        <input type="number" name="soluong" class="form-control" placeholder="Số lượng">
                        <div class="error-message">{{ $errors->first('soluong') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận thêm sản phẩm con</button>
            </form>
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
@endsection
