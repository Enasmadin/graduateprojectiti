@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">

                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('إضافة منتج') }}</h1>


                        <div class="container mb-5">
                            <form class="row g-3" method="POST" action="{{ route('products.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-12">
                                    <label for="name" class="form-label  text-primary">{{ __('الاسم') }}</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="price" class="form-label text-primary ">{{ __('السعر') }}</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="weight" class="form-label text-primary ">{{ __('الوزن') }}</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                        id="weight" placeholder="الوزن اختياري" name="weight"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="quantity" class="form-label text-primary ">{{ __('الكمية') }}</label>
                                    <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                        id="quantity" placeholder="الكمية الإفتراضيه ب 1" name="quantity"
                                        value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <lab el for="category" class="form-label text-primary">
                                        {{ __('اختر تصنيفا') }}</lab>
                                    <select id="category"
                                        class="form-select overflow-hidden  @error('category') is-invalid @enderror"
                                        name="category_id">


                                        @foreach ($cats as $cat)
                                            <option value="{{ old('category_id', $cat->id) }}" name="category_id">
                                                {{-- {{ $cat->id == $product->cat_id ? 'selected' : '' }}> --}}
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                        {{-- @foreach ($products as $product)
                                        <option value="{{ old('id', $product->id) }}"
                                            {{ $product->id == $post->product_id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach --}}

                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="productPic"
                                        class="form-label text-primary ">{{ __('أضف صور المنتج') }}</label>
                                    <input class="form-control @error('product_pic') is-invalid @enderror" type="file"
                                        id="productPic" multiple name="product_pic">
                                    @error('product_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">{{ __('اضافة') }}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
