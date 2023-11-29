@extends('layout.index')

@section('title', 'Giới thiệu')

@section('content')

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="img/about-left-image.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>GIỚI THIỆU VỀ STYLE VISTA</h4>
                        <span>Mô tả ở đây</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Mô tả ở đây</p>
                        </div>
                        <p>Mô tả ở đây</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>THÀNH VIÊN</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/team-member-01.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Thành viên 1</h4>
                            <span>Công việc</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/team-member-02.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Thành viên 2</h4>
                            <span>Công việc</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/team-member-03.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Thành viên 3</h4>
                            <span>Công việc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>DỊCH VỤ</h2>
                        {{-- <span>Details to details is what makes Hexashop different from the other themes.</span> --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Chính Sách Bảo Hành</h4>
                        <p>Chi tiết hơn</p>
                        <img src="assets/images/service-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Chính Sách Đổi Trả</h4>
                        <p>Chi tiết hơn</p>

                        <img src="assets/images/service-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Chăm Sóc Khách Hàng</h4>
                        <p>Chi tiết hơn</p>
                        <img src="assets/images/service-03.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area Ends ***** -->
@endsection
