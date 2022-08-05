@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 offset-md-2">

                <div class="card mx-8">
                    <img src="{{ asset('productpic') . '/' . $product->product_pic }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center text-primary">{{ $product->name }} </h5>
                        <p class="card-text  text-center ">السعر: {{ $product->price }}</p>

                        <p class="card-text text-center ">الكمية: {{ $product->quantity }}</p>

                        {{-- <p class="card-text"><small class="text-muted"{{$product->created_at->diffForHumans()}}></small></p> --}}
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-2">

                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">تعديل </a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="post" class="mb-3">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger col-12"> حذف </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
