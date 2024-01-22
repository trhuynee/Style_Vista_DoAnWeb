@extends('layout.index')

@section('title', 'Sản phẩm')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/chi-tiet-san-pham-ng-dung') }}">
@endsection
@section('content')

    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="left-images">
                        @php
                            $dem = 0;
                        @endphp

                        <div class="container">
                            @foreach ($images as $item)
                                @if ($dem == 0)
                                    <img class="main-image" src="{{ asset($item->tenimage) }}" alt="">
                                    @php
                                        $dem++;
                                    @endphp
                                @endif
                            @endforeach

                            <div class="row">
                                @foreach ($images as $item)
                                    <div class="col-lg-3">
                                        <img class="thumbnail" src="{{ asset($item->tenimage) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <span>Mô tả</span>
                    <div class="quote">
                        <p>{!! $sanpham->mota !!}</p>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content">
                        {{-- <form action="{{ route('khach-hang.xu-li-thanh-toan') }}" method="POST"> --}}
                        <form action="" method="POST">
                            @csrf
                            <div class="product-details">
                                <h4>{{ $sanpham->tensanpham }}</h4>
                                <div class="price-section">
                                    <h5 class="discounted-price">Giá giảm: {{ $gia }}₫</h5>
                                    <p class="original-price">Giá gốc: <s>{{ $sanpham->dongia }}₫</s></p>
                                </div>
                            </div>
                            <div class="quantity-content">
                                <div class="left-content">
                                    <h6>Màu sắc </h6>
                                </div>
                                <div class="right-content">
                                    <select id="inputState" name="mau" class="form-control">
                                        <option value="">-- Chọn màu --</option>
                                        @foreach ($ChiTietSanPham as $item)
                                            <option value="{{ $item->mau->id }}">{{ $item->mau->tenmau }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="left-content">
                                    <h6>Kích thước </h6>
                                </div>
                                <div class="right-content">
                                    <select id="inputState" name="kt" class="form-control">
                                        <option value="">-- Chọn size --</option>
                                        @foreach ($ChiTietSanPham1 as $item)
                                            <option value="{{ $item->size }}">
                                                @if ($item->size == 0)
                                                    S
                                                @elseif ($item->size == 1)
                                                    M
                                                @elseif ($item->size == 2)
                                                    L
                                                @elseif ($item->size == 3)
                                                    XL
                                                @elseif ($item->size == 4)
                                                    2XL
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="error-message">{{ $errors->first('kt') }}</div>
                                </div>
                                <div class="left-content">
                                    <h6>Số lượng </h6>
                                </div>
                                <div class="right-content">
                                    <input type="number" name="soluong" min="1" max="20" value="1">
                                </div>
                                <div class="error-message">{{ $errors->first('soluong') }}</div>
                            </div>
                            <div class="total">
                                <div class="main-border-button">
                                    @if (Auth::check())
                                        <a onclick="addToCart()" href="#" id="add-to-cart-btn"
                                            data-sanpham-id="{{ $sanpham->id }}">Thêm vào giỏ hàng</a>
                                    @else
                                        <a href="/dang-nhap">Đăng nhập</a>
                                    @endif
                                    <a href="/thanh-toan">Mua ngay</a>
                                </div>
                            </div>


                        </form>
                        <?php
                        $avatar = session('avatar');
                        ?>
                        <div class="row d-flex justify-content-center" style="margin-top: 20px">
                            <div class="col-md-12 ">
                                <div class="card">
                                    @foreach ($binhluan as $item)
                                        <div class="card-body">
                                            <div class="d-flex flex-start align-items-center">
                                                @if ($item->user->avatar == null)
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                        src="{{ asset('img/avatar.png') }}" alt="avatar" width="40"
                                                        height="40" />
                                                @else
                                                    <img class="rounded-circle shadow-1-strong me-3"
                                                        src="{{ $item->user->avatar }}" alt="avatar" width="40"
                                                        height="40" />
                                                @endif
                                                <div>
                                                    <h6 class="fw-bold text-primary mb-1">{{ $item->user->hovaten }}
                                                    </h6>
                                                    <p class="text-muted small mb-0">
                                                        {{ $item->created_at }}
                                                    </p>
                                                </div>
                                            </div>

                                            <p class="mt-3 mb-4 pb-2">
                                                {{ $item->noidung }}

                                            </p>

                                            <div class="small d-flex justify-content-start">
                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="fa-solid fa-thumbs-up"></i>
                                                    <p class="mb-0">Like</p>
                                                </a>
                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="far fa-comment-dots me-2"></i>
                                                    <p class="mb-0">Comment</p>
                                                </a>
                                                <a href="#!" class="d-flex align-items-center me-3">
                                                    <i class="fas fa-share me-2"></i>
                                                    <p class="mb-0">Share</p>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                        <div class="d-flex flex-start w-100">
                                            @if ($avatar == null)
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="{{ asset('img/avatar.png') }}" alt="avatar" width="40"
                                                    height="40" />
                                            @else
                                                <img class="rounded-circle shadow-1-strong me-3" src="{{ $avatar }}"
                                                    alt="avatar" width="40" height="40" />
                                            @endif
                                            <div class="form-outline w-100">
                                                <form action="{{ route('xu-li-binh-luan', ['id' => $sanpham->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <textarea class="form-control" name="noidung" id="textAreaExample" rows="4" style="background: #ffffff;"></textarea>
                                                    <label class="form-label" for="textAreaExample">Message</label>
                                                    <div class="float-end mt-2 pt-1">
                                                        <button type="submit" class="btn btn-primary btn-sm">Post
                                                            comment</button>
                                                        <button type="button"
                                                            class="btn btn-outline-primary btn-sm">Cancel</button>
                                                    </div>
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
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function addToCart() {
            event.preventDefault();

            var productId = $('#add-to-cart-btn').data('sanpham-id');

            // Kiểm tra đăng nhập
            @if (Auth::check())
                // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
                $.ajax({
                    url: '/them-vao-gio-hang/' + productId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.message);
                        // Chuyển hướng đến trang giỏ hàng sau khi thêm vào giỏ hàng
                        window.location.href = '/gio-hang';
                    },
                    error: function(error) {
                        console.error('Lỗi khi thêm sản phẩm vào giỏ hàng.');
                    }
                });
            @else
                // Chuyển hướng đến trang đăng nhập
                window.location.href = '/dang-nhap';
            @endif
        }

        $(document).ready(function() {
            $('#add-to-cart-btn').on('click', addToCart);
        });
    </script>
    {{-- Thông báo không bỏ trống màu, size, số lượng
    <script>
        function addToCart() {
            var selectedMau = document.getElementById('inputMau').value;
            var selectedSize = document.getElementById('inputSize').value;
            var selectedSoLuong = document.getElementById('inputSoLuong').value;

            // Kiểm tra nếu màu, size, hoặc số lượng chưa được chọn
            if (selectedMau === "") {
                document.getElementById('errorMau').innerHTML = "Vui lòng chọn màu.";
                return;
            } else {
                document.getElementById('errorMau').innerHTML = "";
            }

            if (selectedSize === "") {
                document.getElementById('errorSize').innerHTML = "Vui lòng chọn size.";
                return;
            } else {
                document.getElementById('errorSize').innerHTML = "";
            }

            if (selectedSoLuong === "") {
                document.getElementById('errorSoLuong').innerHTML = "Vui lòng nhập số lượng.";
                return;
            } else {
                document.getElementById('errorSoLuong').innerHTML = "";
            }

            // Gọi hàm thêm vào giỏ hàng nếu mọi thứ đều hợp lệ
            addToCartAjax();
        }

        function addToCartAjax() {
            // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
            $.ajax({
                url: '/them-vao-gio-hang/' + productId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    // Chuyển hướng đến trang giỏ hàng sau khi thêm vào giỏ hàng
                    window.location.href = '/gio-hang';
                },
                error: function(error) {
                    console.error('Lỗi khi thêm sản phẩm vào giỏ hàng.');
                }
            });
        }

        $(document).ready(function() {
            $('#add-to-cart-btn').on('click', addToCart);
        });
    </script> --}}

@endsection
