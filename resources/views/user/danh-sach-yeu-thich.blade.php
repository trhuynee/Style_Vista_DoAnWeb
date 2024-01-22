@extends('layout.index')

@section('title', 'Danh sách yêu thích')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Danh Sách Yêu Thích</h2>

        <!-- Danh sách sản phẩm yêu thích -->
        <ul class="list-group">
            @foreach ($dsyt as $product)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <p>Giá: ${{ $product->price }}</p>

                            <!-- Form for removing item from favorites -->
                            <form action="{{ route('removeFromFavorites', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa khỏi yêu thích</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
