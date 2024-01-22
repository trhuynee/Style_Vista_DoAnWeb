@extends('layout.index')

@section('title', 'Sản phẩm')

@section('content')
    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($sanPham as $sanpham)
                    <div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="/chi-tiet-san-pham/{{ $sanpham->id }}"><i class="fa fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                @foreach ($sanpham->images as $item)
                                    @if ($loop->first)
                                        <img class="main-image" src="{{ asset($item->tenimage) }}" alt="">
                                    @endif
                                @endforeach
                            </div>
                            <div class="down-content">
                                <h4>{{ $sanpham->tensanpham }}</h4>
                                <span><s>{{ $sanpham->dongia }}₫</s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection
