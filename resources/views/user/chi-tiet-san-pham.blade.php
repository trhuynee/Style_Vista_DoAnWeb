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
                        @foreach ($images as $item)
                            @if ($dem == 0)
                                <img src="{{ asset($item->tenimage) }}" alt="">
                                @php
                                    $dem++;
                                @endphp
                            @endif
                        @endforeach
                        <div class="row">
                            @foreach ($images as $item)
                                <div class="col-lg-3">
                                    <img src="{{ asset($item->tenimage) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <span>Mô tả</span>
                    <div class="quote">
                        <p>{!! $sanpham->mota !!}</p>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content">
                        <form action="{{route('khach-hang.xu-li-thanh-toan')}}" method="POST">
                            @csrf
                            <h4>{{ $sanpham->tensanpham }}</h4>
                            <input name="idSP" value="{{ $sanpham->id }}" type="hidden">
                            <input name="tenSP" value="{{ $sanpham->tensanpham }}" type="hidden">
                            <input name="gia" value="{{ $gia }}" type="hidden">
                            <h4 class="price" style="color: red;">Giá giảm: {{ $gia }}₫</h4>
                            <p class="price">Giá gốc: <s>{{ $sanpham->dongia }}₫</s></p>
                            <ul class="stars">
                                <li><i class="fa fa-heart-o" style="font-size:24px;"></i></li>
                            </ul>

                            <div class="quantity-content">
                                <div class="left-content">
                                    <h6>Màu sắc </h6>
                                </div>
                                <div class="right-content">
                                    <select id="inputState" name="mau" class="form-control">
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
                                        @foreach ($ChiTietSanPham1 as $item)
                                            <option value="{{ $item->size }}">
                                                @if ($item->size == 0)
                                                    A
                                                @elseif ($item->size == 1)
                                                    B
                                                @elseif ($item->size == 2)
                                                    C
                                                @elseif ($item->size == 3)
                                                    D
                                                @elseif ($item->size == 4)
                                                    E
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="left-content">
                                    <h6>Số lượng </h6>
                                </div>
                                <div class="right-content">
                                    <input type="number" name="soluong" min="1" max="20" value="1">
                                </div>
                            </div>
                            <div class="total">
                                <div class="main-border-button">
                                    <a href="#">Thêm vào giỏ hàng</a>
                                    <button type="submit">Mua ngay</button>
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
                                                    <h6 class="fw-bold text-primary mb-1">{{ $item->user->hovaten }}</h6>
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

    <!-- ***** Product Area Ends ***** -->
@endsection
