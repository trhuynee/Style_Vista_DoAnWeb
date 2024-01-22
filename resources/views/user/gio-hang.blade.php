@extends('layout.index')

@section('title', 'Giỏ hàng')

@section('content')
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>GIỎ HÀNG CỦA BẠN</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <!-- Bảng hiển thị sản phẩm trong giỏ hàng -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        {{-- <th scope="col">Hình Ảnh</th> --}}
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $gioHangUser = session('gio-hang', []);
                        $total = 0;
                    @endphp

                    @foreach ($gioHangUser as $index => $item)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            {{-- <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="max-width: 50px;"></td> --}}
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['price'] }}₫</td>
                            <td>{{ $item['quantity'] * $item['price'] }}₫</td>
                            @php
                                $total += $item['quantity'] * $item['price'];
                            @endphp
                        </tr>
                    @endforeach

                    @if (empty($gioHangUser))
                        <tr>
                            <td colspan="6">Giỏ hàng trống.</td>
                        </tr>
                    @endif

                </tbody>
            </table>

            <!-- Tổng giá trị đơn hàng -->
            <div class="text-right">
                <h4>Tổng Tiền: {{ $total }}₫</h4>
            </div>

            <!-- Nút thanh toán -->
            <div class="text-right mt-4">
                <a href="/thanh-toan" class="btn btn-primary">Thanh Toán</a>
            </div>
        </div>
    </section>
@endsection
