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
        <div class="col-lg-12">
            <section class="main-cart-page main-container col1-layout">
                <div class="main container hidden-xs">
                    <div class="col-main cart_desktop_page cart-page">
                        <div class="cart page_cart hidden-xs">
                            <form action="/cart" method="post" novalidate="" class="margin-bottom-0">
                                <div class="bg-scroll">
                                    <div class="cart-thead">
                                        <div style="width: 17%;">Hình ảnh</div>
                                        <div style="width: 33%"><span class="nobr">Tên sản phẩm</span></div>
                                        <div style="width: 15%" class="a-center"><span class="nobr">Đơn giá</span></div>
                                        <div style="width: 14%" class="a-center">Số lượng</div>
                                        <div style="width: 15%" class="a-center">Thành tiền</div>
                                        <div style="width: 6%">Xoá</div>
                                    </div>
                                    <div class="cart-tbody"></div>
                                </div>
                            </form>
                            {{-- <div class="cart-collaterals cart_submit row">
                                <div class="totals col-sm-12 col-md-12 col-xs-12">
                                    <div class="totals">
                                        <div class="inner">
                                            <table class="table shopping-cart-table-total margin-bottom-0"
                                                id="shopping-cart-totals-table">
                                                <colgroup>
                                                    <col>
                                                    <col>
                                                </colgroup>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="20" class="a-right"></td>
                                                        <td class="a-right"><span>Tổng tiền:</span> <strong><span
                                                                    class="totals_price price">0₫</span></strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <ul class="checkout">
                                                <li class="clearfix"><button
                                                        class="btn btn-primary button btn-proceed-checkout f-right"
                                                        title="Tiến hành đặt hàng" type="button"
                                                        onclick="window.location.href='/checkout'"><span
                                                            style=" text-transform: initial; ">Tiến hành đặt
                                                            hàng</span></button><button
                                                        class="btn btn-gray margin-right-15 f-right"
                                                        title="Tiếp tục mua hàng" type="button"
                                                        onclick="window.location.href='/collections/all'"><span
                                                            style=" text-transform: initial; ">Tiếp tục mua
                                                            hàng</span></button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="bg-cart-page" style="min-height: auto">
                                <p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="/">cửa hàng</a> để tiếp tục
                                    mua sắm.</p>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="cart-mobile hidden-md hidden-lg hidden-sm">
                    <form action="/cart" method="post" novalidate="" class="margin-bottom-0">
                        <div class="header-cart" style="background:#fff;">

                            <div class="title-cart">
                                <h3>Giỏ hàng của bạn</h3>
                            </div>

                        </div>

                        <div class="header-cart-content" style="background:#fff;">
                            <div class="cart_page_mobile content-product-list"></div>
                            <div class="header-cart-price" style="">
                                <div class="title-cart ">
                                    <h3 class="text-xs-left">Tổng tiền</h3><a
                                        class="text-xs-right totals_price_mobile">0₫</a>
                                </div>
                                <div class="checkout"><button class="btn-proceed-checkout-mobile"
                                        title="Tiến hành thanh toán" type="button"
                                        onclick="window.location.href='/checkout'"><span>Tiến hành thanh
                                            toán</span></button><button class="btn-proceed-checkout-mobile margin-top-10"
                                        title="Tiếp tục mua hàng" type="button"
                                        onclick="window.location.href='/collections/all'"><span>Tiếp tục mua
                                            hàng</span></button></div>
                            </div>
                        </div>

                    </form>

                </div> --}}

            </section>
        </div>
    </section>
@endsection
