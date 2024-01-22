@extends('admin.index')
@section('title', 'Thêm sản phẩm')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới sản phẩm</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.san-pham.xu-li-them-san-pham') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Tên sản phẩm</label>
                        <input type="text" name="tensanpham" class="form-control" placeholder="Tên sản phẩm">
                        <div class="error-message">{{ $errors->first('tensanpham') }}</div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Loại sản phẩm</label>
                        <select id="inputState" name="loaisanpham" class="form-control">
                            <option selected value=" ">Loại sản phẩm</option>
                            @foreach ($loaisp as $item)
                                <option value="{{ $item->id }}">{{ $item->tenloaisp }}</option>
                            @endforeach
                        </select>
                        <div class="error-message">{{ $errors->first('loaisanpham') }}</div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Nhãn hiệu</label>
                        <select id="inputState" name="nhanhieu" class="form-control">
                            <option selected value=" ">Nhãn hiệu</option>
                            @foreach ($nhanhieu as $item)
                                <option value="{{ $item->id }}">{{ $item->tennhanhieu }}</option>
                            @endforeach
                        </select>
                        <div class="error-message">{{ $errors->first('nhanhieu') }}</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputEmail4">Giá tiền</label>
                        <input type="number" name="giatien" class="form-control" placeholder="Giá tiền">
                        <div class="error-message">{{ $errors->first('giatien') }}</div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Giảm giá</label>
                        <input type="number" name="giamgia" class="form-control" placeholder="Giảm giá">
                        <div class="error-message">{{ $errors->first('giamgia') }}</div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Link tạo URL hình ảnh</label>
                        <button class="form-control"><a href="https://www.base64-image.de/">Tạo URL</a></button>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="editor" name="mota"></textarea>
                </div>
                <div class="error-message">{{ $errors->first('mota') }}</div>
                <div class="form-group col-md-4">
                    <label for="#">Hình sản phẩm</label>
                    <input type="file" name="images[]" id="images" multiple accept="image/*">
                    <div id="preview-container"></div>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@section('scr')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#images').on('change', function() {
                previewImages(this);
            });

            function previewImages(input) {
                var previewContainer = $('#preview-container');
                previewContainer.empty();

                if (input.files && input.files.length > 0) {
                    for (var i = 0; i < input.files.length; i++) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var img = $('<img>').attr('src', e.target.result).addClass('preview-image');
                            previewContainer.append(img);
                        };

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            }
        });
    </script>

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

    <style>
        .preview-image {
            max-width: 100px;
            max-height: 100px;
            margin: 5px;
        }
    </style>

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@endsection
