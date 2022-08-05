@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">


                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('إضافة منشور') }}</h1>

                        <div class="container">
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="title" class="form-label text-primary">{{ __('العنوان') }}</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title"
                                        value="{{ old('title') }}" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="description" class="form-label text-primary">{{ __('الوصف') }}</label>
                                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                        id="description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="from" class="form-label text-primary">{{ __('من') }}</label>
                                    <input type="text" name="from"
                                        class="form-control  @error('from') is-invalid @enderror" id="from"
                                        value="{{ old('from') }}">
                                    @error('from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="to" class="form-label text-primary">{{ __('إلى') }}</label>
                                    <input type="text" name="to"
                                        class="form-control  @error('to') is-invalid @enderror" id="to"
                                        value="{{ old('to') }}">
                                    @error('to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deliver_price"
                                        class="form-label text-primary">{{ __('سعر التوصيل') }}</label>
                                    <input type="text" name="deliver_price"
                                        class="form-control @error('deliver_price') is-invalid @enderror" id="deliver_price"
                                        value="{{ old('deliver_price') }}">
                                    @error('deliver_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_id" class="form-label text-primary">{{ __('اختر المنتج') }}</label>
                                    <select class="form-select @error('product_id') is-invalid @enderror" name="product_id"
                                        id="product_id" value="{{ old('product_id') }}">
                                        {{-- // FIXME --}}

                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    <div>
                                        @error('product_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="client_id" class="form-label text-primary">{{ __('اختر الزبون') }}</label>
                                    <select class="form-select @error('client_id') is-invalid @enderror" name="client_id"
                                        id="client_id" value="{{ old('client_id') }}">

                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                <div>
                                    @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                </div>

                                <div class="d-flex justify-content-between my-5">
                                    <a href="{{ route('clients.create') }}"
                                        class="btn btn-secondary">{{ __('زبون جديد') }}</a>

                                    <div class="text-end">
                                        <a href="{{ route('posts.index') }}"
                                            class="btn btn-outline-secondary">{{ __('رجوع') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('اضف') }}</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
