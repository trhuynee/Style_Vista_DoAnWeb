@extends('layout.index')

@section('title', 'Thông tin khách hàng')

@section('content')
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-content">
                        <li><a href="/thong-tin-khach-hang">Thông tin tài khoản</a></li>
                        <li><a href="/thong-tin-khach-hang/don-hang">Đơn hàng của bạn</a></li>
                        <li><a href="/thong-tin-khach-hang/doi-mat-khau">Đổi mật khẩu</a></li>
                        <li><a href="/thong-tin-khach-hang/dia-chi">Sổ địa chỉ</a></li>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <form action="{{ route('khach-hang.xu-li-dia-chi') }}" method="POST">
                                    @csrf
                                    <h5>Thêm địa chỉ</h5>
                                    @php
                                        $dem = 1;
                                        if (Auth::check()) {
                                            $user = Auth::user();
                                        }
                                    @endphp
                                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                                    <input name="diachi" type="text">
                                    <button>Thêm địa chỉ</button>
                                </form>
                            </div>
                            <div class="col-lg-7">
                                <h5>Danh sách địa chỉ</h5>
                                <table>
                                    <th>
                                        STT
                                    </th>
                                    <th>
                                        Địa chỉ
                                    </th>
                                    @foreach ($diachi as $item)
                                        <tr>
                                            <td>{{$dem}}</td>
                                            <td>{{$item->diachi}}</td>
                                        </tr>
                                        @php
                                            $dem++;
                                        @endphp
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
