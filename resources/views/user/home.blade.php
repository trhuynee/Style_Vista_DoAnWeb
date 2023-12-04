@extends('layout.index')

@section('title', 'Home')

{{-- @section('header')
    @parent
@endsection --}}

@section('content')


    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>YaMe</h2>
                        <span>YaMe là thường hiệu thời trang Việt Nam dành cho giới trẻ.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                            @foreach ($ctsp as $item)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{route('trang-chi-tiet-san-pham', ['id' => $item->id])}}"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/men-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$item->tensanpham}}</h4>
                                    <span>{{$item->dongia}}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Men Area Ends ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Ben & Tod</h2>
                        <span>Ben & Tod là một Thương hiệu May mặc hàng Thời trang Nam.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>New Green Jacket</h4>
                                    <span>$75.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Giá</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-03.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Spring Collection</h4>
                                    <span>$130.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Gia</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>SomeHow</h2>
                        <span>Somehow là thương hiệu thời trang B2C.</span>
                    </div>
                </div>
            </div>
        </div>
       <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>New Green Jacket</h4>
                                    <span>$75.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Giá</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-03.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Spring Collection</h4>
                                    <span>$130.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Gia</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Chuottrang</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>New Green Jacket</h4>
                                    <span>$75.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Giá</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-03.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Spring Collection</h4>
                                    <span>$130.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Gia</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Uniqlo</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>New Green Jacket</h4>
                                    <span>$75.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Giá</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-03.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Spring Collection</h4>
                                    <span>$130.00</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="chi-tiet-san-pham"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="assets/images/women-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Tên sản phẩm</h4>
                                    <span>Gia</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->
@endsection
