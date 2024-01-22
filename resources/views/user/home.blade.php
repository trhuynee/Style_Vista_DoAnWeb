@extends('layout.index')

@section('title', 'Trang chủ')

@section('content')
    @foreach ($nhanHieus as $nhanHieu)
        <section class="section" id="men">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>{{ $nhanHieu->tennhanhieu }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="men-item-carousel">
                            <div class="owl-men-item owl-carousel">
                                @php
                                    $ctspNhanHieu = $ctspCacNhanHieu->where('nh_id', $nhanHieu->id);
                                @endphp
                                @if ($ctspNhanHieu->count() > 0)
                                    @foreach ($ctspNhanHieu as $item)
                                        <div class="item">
                                            <div class="thumb">
                                                <div class="hover-content">
                                                    <ul>
                                                        <li><a
                                                                href="{{ route('trang-chi-tiet-san-pham', ['id' => $item->id]) }}"><i
                                                                    class="fa fa-eye"></i></a></li>
                                                        <!-- Kiểm tra đăng nhập hay chưa' -->
                                                        {{-- @if (Auth::check())
                                                            <li>
                                                                <a href="#" id="cart-icon">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="/dang-nhap" id="cart-icon">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </li>
                                                        @endif --}}
                                                    </ul>
                                                </div>
                                                @if ($item->images->isNotEmpty())
                                                    <img src="{{ asset($item->images->first()->tenimage) }}"
                                                        alt="Ảnh sản phẩm">
                                                @endif
                                            </div>
                                            <div class="down-content">
                                                <h5>{{ $item->tensanpham }}</h5>
                                                {{-- <p class="price">{{ $ctsp->gia }}₫</p> --}}
                                                <p class="price"> <s>{{ $item->dongia }}₫</s></p>
                                                <ul class="stars">
                                                    <li><a href="{{ route('trang-danh-sach-yeu-thich', ['id' => $item->id]) }}"
                                                            class="add-to-favorites"
                                                            data-product-id="{{ $item->id }}"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Không tìm thấy sản phẩm cho nhãn hiệu {{ $nhanHieu->tennhanhieu }}.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    {{-- xứ lí hiển thị khi thêm sản phẩm vào giỏ hàng
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#cart-icon').on('click', function(event) {
                event.preventDefault();

                var productId = $(this).data('product-id');

                // Kiểm tra đăng nhập
                @if (Auth::check())
                    // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
                    $.ajax({
                        url: '/them-vao-gio-hang',
                        type: 'POST',
                        data: {
                            productId: productId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert('Sản phẩm đã được thêm vào giỏ hàng.');
                        },
                        error: function(error) {
                            console.error('Lỗi khi thêm sản phẩm vào giỏ hàng.');
                        }
                    });
                @else
                    // Chuyển hướng đến trang đăng nhập
                    window.location.href = '/dang-nhap';
                @endif
            });
        });
    </script> --}}

@endsection
