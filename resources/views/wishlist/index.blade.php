@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($favs->count() == 0)
            <h3 class="mb-3">لا يوجد شئ في المفضلة</h3>

        @else
           
        @endif
    </div>



    <div class="container pb-3 mt-5">
        <div class="d-grid gap-3">
            <div class="row">
                @foreach ($favs as $fav)
                    <div class="col-sm-12 col-md-4 col-lg-2 offset-sm-2 offset-md-0 offset-lg-0 mb-4" style="width: 23rem;">
                        <div class="card shadow-sm text-center h-100">
                            <img src="{{ asset('productpic') . '/' . $fav->post->product->product_pic }}"
                                class="card-img-top img-fluid" alt="{{ $fav->post->product->name }}"
                                style="height:200px; object-fit:cover;">

                            <div class="card-body">
                                <h1 style="color: #007EA7">{{ $fav->post->title }}</h1>
                                <p class="card-text">
                                    <span class="text-muted">{{ __('الوصف: ') }}</span>
                                    {{ Str::words($fav->post->description, 4) }}
                                </p>
                                <p class="card-text">
                                    <span class="text-muted">
                                        {{ __('التوصيل من: ') }}
                                    </span>
                                    {{ $fav->post->from }}
                                </p>
                                <p class="card-text">
                                    <span class="text-muted">{{ __('إلى: ') }}
                                    </span>
                                    {{ $fav->post->to }}
                                </p>

                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('posts.show', $fav->post->id) }}">
                                        {{ __('عرض') }}
                                    </a>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <a href="{{ route('profiles.show', $fav->post->user->id) }}" style="text-decoration:none ">
                                    <img src="{{ asset('profilepic') . '/' . $fav->post->user->profile_pic }}"
                                        class="col-12 card-img-top  rounded-circle" alt="{{ $fav->post->user->name }}"
                                        style="width:70px; height:70px; object-fit:cover;">
                                </a>
                                <small class="col-12 fw-bold fs-6" style="color: #007EA7">{{ $fav->post->user->name }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
