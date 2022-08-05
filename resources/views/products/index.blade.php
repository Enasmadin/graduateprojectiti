@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($products->count() == 0)
            <h3 class="mb-3">{{ __('لا توجد منتجات') }}</h3>
            <a class="btn btn-primary" href="{{ route('products.create') }}">{{ __('اضف منتجا جديدا') }}</a>
        @else
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <form class="d-flex" role="search" type="get" action="{{ route('posts.index') }}">
                        @csrf

                        <input class="form-control me-2" name="search" type="search" aria-label="Search">

                        <button class="btn btn-primary" type="submit">{{ __('ابحث') }}</button>
                    </form>
                </div>

                <div class="col-sm-4 col-md-3 offset-md-0">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">{{ __('اضف منتجا') }}</a>
                </div>
            </div>
        @endif
    </div>


    <div class="container pb-3 mt-5">
        <div class="row">
            @foreach ($products as $product)
                {{-- <div class="card col-4 d-flex justify-content-between" style="margin-left:2px;"  > --}}

                <div class="col-sm-12 col-md-4 col-lg-2 offset-sm-3 offset-md-0 offset-lg-0 mb-4" style="width: 20rem;">

                    <div class="card">

                        <img src="{{ asset('productpic') . '/' . $product->product_pic }}" class="card-img-top"
                            alt="{{ $product->name }}" style="height:200px; object-fit:cover;">

                        <div class="card-body">

                            <h5 class="card-title text-center text-primary">{{ $product->name }}</h5>


                            <p class="card-text text-center">
                                <span class="text-muted">{{ __('السعر: ') }}</span>
                                {{ $product->price }}
                            </p>

                            <p class="card-text text-center">
                                {{ __('الكمية: ') }}
                                {{ $product->quantity }}
                            </p>

                            <div class="text-center">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="btn btn-outline-primary">{{ __('عرض') }}</a>

                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-outline-warning">{{ __('تعديل') }}</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                    class="d-inline">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">{{ __('حذف') }}</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
