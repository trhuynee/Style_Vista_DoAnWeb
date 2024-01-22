<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>@yield('title')</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">


</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="{{ asset('img/logo.png') }}">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="/" class="active">Trang chủ</a></li>
                        <li class="scroll-to-section"><a href="san-pham">Sản Phẩm</a></li>
                        <li class="scroll-to-section"><a href="gioi-thieu">Giới thiệu</a></li>
                        {{-- <li class="scroll-to-section"><a href="single-product">Single Product</a></li> --}}
                        <li class="scroll-to-section"><a href="lien-he">Liên hệ</a></li>
                        <li class="scroll-to-section"><a href="lien-he"><i class="fa fa-search"
                                    style="font-size:20px"></i></a></li>
                        <li class="scroll-to-section"><a href="gio-hang"><i class="fa fa-shopping-cart"
                                    style="font-size:20px"></i></a> </li>
                        <li class="scroll-to-section"><a href="danh-sach-yeu-thich"><i class="fa fa-heart-o"
                                    style="font-size:16px;"></i></a></li>
                        <?php
                        $kt = Auth::check();
                        ?>
                        @if ($kt)
                            <li class="scroll-to-section">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="thong-tin-khach-hang" role="button"
                                        id="userDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ session('name') }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="thong-tin-khach-hang">Thông tin</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Đăng xuất
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="scroll-to-section"><a href="{{ route('dang-nhap') }}"><i
                                        class="fa fa-user"></i></a></li>
                        @endif

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Đăng xuất?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Xác nhận đăng xuất!!!.</div>
                                <form action="{{ route('dang-xuat') }}" method="POST">
                                    @csrf
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Hủy</button>
                                        <button class="btn btn-primary" type="submit">Đăng xuất</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        {{-- </div> --}}
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/banner-1.png') }}" alt="" class="w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner-2.png') }}" alt="" class="w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner-3.png') }}" alt="" class="w-100">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

    </div>
    @yield('content')
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="/img/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">65 Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Tp.Hồ Chí Minh</a>
                            </li>
                            <li><a href="#">stylevistashop@company.com</a></li>
                            <li><a href="#">010-020-0340</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping</h4>
                    <ul>
                        <li><a href="#">Yame</a></li>
                        <li><a href="#">Ben & Tod</a></li>
                        <li><a href="#">SomeHow</a></li>
                        <li><a href="#">Chuottrang</a></li>
                        <li><a href="#">Uniqlo</a></li>

                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Liên Hệ</h4>
                    <ul>
                        <li><a href="trang-chu">Trang chủ</a></li>
                        <li><a href="gioi-thieu">Giới thiệu</a></li>
                        <li><a href="lien-he">Liên hệ</a></li>

                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2023

                            {{-- <br>Design: <a href="https://templatemo.com" target="_parent"
                                title="free css templates">TemplateMo</a> --}}
                        </p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>


    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

    {{-- chuyển hình ảnh con --}}
    <script>
        $(document).ready(function() {
            $('.thumbnail').hover(
                function() {
                    $('.main-image').attr('src', $(this).attr('src')).fadeIn();
                },
                function() {
                    // No action on mouseout
                }
            );
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-favorites').on('click', function(e) {
                e.preventDefault();

                var productId = $(this).data('product-id');
                var isFavorite = $(this).data('favorite-status') === 'true';

                $.ajax({
                    url: '/them-vao-yeu-thich/' + productId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            isFavorite = !isFavorite;
                            $(this).data('favorite-status', isFavorite ? 'true' : 'false');
                            $(this).html('<i class="fa fa-heart' + (isFavorite ? '-red' :
                                '-o') + '"></i>');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                    }
                });
            });
        });
    </script>
</body>

</html>
