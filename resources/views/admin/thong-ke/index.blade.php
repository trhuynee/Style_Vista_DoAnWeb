@extends('admin.index')
@section('title', 'Thống kê đơn hàng')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Doanh thu đơn hàng</h6>
                </div>
                @php
                    $namHienTai = Date('Y');
                @endphp
                <div class="card-body">
                    <form action="{{ route('admin.thong-ke.thong-ke-don-hang') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="inputCity">Tháng</label>
                                <select id="inputState" name="thang" class="form-control">
                                    <option selected value="{{ $thang }}">{{ $thang }}</option>
                                    @for ($i = 0; $i < 13; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputCity">Năm</label>
                                <select id="inputState" name="nam" class="form-control">
                                    <option selected value="{{ $nam }}">{{ $nam }}</option>
                                    @for ($i = $namHienTai; $i >= 2015; $i--)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-sm-10">
                                <label for="inputCity">Sản phẩm</label>
                                <select id="inputState" name="sanpham" class="form-control">
                                    <option selected value="{{ $nam }}">{{ $nam }}</option>
                                    @for ($i = $namHienTai; $i >= 2015; $i--)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="inputCity">Tìm kiếm</label>
                                <button type="submit" style="font-size: 12px"> Xác nhận </button>
                            </div>
                        </div>
                    </form>

                    <div style="margin-top: 10px">
                        <div class="form-group">
                            <label for="inputCity">Số lượng bán ra</label>
                            <input type="text" name="diachi" class="form-control" value="{{ $soluong }}" disabled>
                        </div>
                    </div>
                    <div style="margin-top: 10px">
                        <label for="inputCity">Tổng doanh thu tháng năm</label>
                        <input class="form-control" value="{{ $tong }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <label for="inputCity">test</label>
    <select id="inputState" name="nam" class="form-control">
        @foreach ($kq as $item)
            <option>{{ $item->id }}</option>
        @endforeach
    </select>
@endsection
