@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">


                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('تعديل المنشور') }}</h1>


                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label text-primary">{{ __('العنوان') }}</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                    value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label text-primary">{{ __('الوصف') }}</label>
                                <input type="text" name="description"
                                    class="form-control @error('description') is-invalid @enderror" id="description"
                                    value="{{ old('description', $post->description) }}">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="from" class="form-label text-primary">{{ __('من') }}</label>
                                <input type="text" name="from"
                                    class="form-control @error('from') is-invalid @enderror" id="from"
                                    value="{{ old('from', $post->from) }}">
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="to" class="form-label text-primary">{{ __('إلى') }}</label>
                                <input type="text" name="to" class="form-control @error('to') is-invalid @enderror"
                                    id="to" value="{{ old('to', $post->to) }}">
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="deliver_price" class="form-label text-primary">{{ __('سعر التوصيل') }}</label>
                                <input type="text" name="deliver_price"
                                    class="form-control @error('deliver_price') is-invalid @enderror" id="deliver_price"
                                    value="{{ old('deliver_price', $post->deliver_price) }}">
                                @error('deliver_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label for="product_id" class="form-label text-primary">{{ __('المنتح') }}</label>
                                {{-- // FIXME --}}
                                {{-- {{ dd($post->product->count()) }} --}}
                                {{-- @if ($post->product->count() > 0) --}}

                                <select name="product_id" id="product_id"
                                    class="form-select @error('product_id') is-invalid @enderror">
                                    {{-- <option value="0">{{ __('Choose Product') }}</option> --}}
                                    @foreach ($products as $product)
                                        <option value="{{ old('product_id', $product->id) }}"
                                            {{ $product->id == $post->product_id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- @else
                                    <a href="{{ route('products.create') }}"
                                        class="btn btn-primary">{{ __('اضف منتجنا') }}</a>
                                @endif --}}
                            </div>

                            <div class="col-12 text-end">
                                <a href="{{ route('clients.index') }}"
                                    class="btn btn-outline-danger">{{ __('إلغاء') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
