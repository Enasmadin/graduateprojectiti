@extends('layouts.app')
@section('styles')
    <style>
        .rating-css div {
            color: #ffe400;
            font-size: 10px;
            font-family: sans-serif;
            font-weight: 100;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 30px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        .checked {
            color: #ffd900;
        }
    </style>
@endsection


@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/rate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">
                            {{ __('تقييم ') }}{{ $user->name }}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css card-text">
                            <div class="star-icon">
                                <input type="radio" value="1" name="rate-value" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="rate-value" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="rate-value" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="rate-value" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="rate-value" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('إغلاق') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger alert-block alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row my-3">
            <h2 class="text-center text-primary">
                @vendor($user)
                    {{ __('صفحة التاجر') }}
                @endvendor
                @delivery($user)
                    {{ __('صفحة المندوب') }}
                @enddelivery
            </h2>
        </div>


        <div class="row">
            <div class="card w--md-50">
                <img class="card-img-top rounded-circle m-auto mt-5"
                    src="{{ asset('profilepic') . '/' . $user->profile_pic }}" alt="{{ $user->name }}"
                    style="height: 140px; width:140px; object-fit:cover">

                <div class="card-body text-center">
                    <h4 class="card-title">
                        {{ $user->name }}
                        @auth
                            @if (auth()->user()->id == $user->id)
                                <a href="{{ route('profiles.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                            @endif
                        @endauth
                    </h4>
                    {{-- <div class="rating">
                        <i class="fa fa-star checked"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                        <span>{{ $ratings->count() }} تقييمات</span>
                    </div> --}}

                    {{-- @auth

                        @if (auth()->user()->id != $user->id)
                            <button type="button" class="mt-4 btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                {{ __('تقييم') }}
                            </button>
                        @endif
                    @endauth --}}

                </div>


                {{-- <div class="row mt-5">
                    <h5 class=" text-primary text-center">{{ __('للتواصل') }}</h5>
                </div> --}}


                <div class="row text-center my-3">

                    <div class="col-sm-12 col-md-4 my-sm-1">
                        <i class="fas fa-envelope"></i>
                        <span>
                            {{ $user->email }}
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-4 my-sm-1">
                        <i class="fas fa-house-user"></i>
                        <span>
                            {{ $user->city }}
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-4 my-sm-1">
                        <i class="fas fa-phone"></i>
                        <span>
                            {{ $user->phone_number }}
                        </span>
                    </div>
                </div>




            </div>


            @vendor($user)
                <div class="row mt-2">
                    <h5 class="text-primary text-center mt-5">{{ __('منشوراتي') }}</h5>
                </div>
            @endvendor


            <div class="row mb-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($user->posts as $post)
                        <div class="col">
                            <div class="card shadow-sm my-4 h-100">
                                <img src="{{ asset('productpic') . '/' . $post->product->product_pic }}"
                                    class="card-img-top" alt="{{ $post->product->name }}"
                                    style="height:200px; object-fit:cover;">

                                <div class="card-body text-center">
                                    <h1 style="color: #007EA7"> {{ $post->title }}</h1>

                                    <p class="card-text">
                                        <span class="text-muted">{{ __('الوصف') }}</span> &nbsp;
                                        {{ $post->description }}
                                    </p>
                                    <div class="btn-group text-center">
                                        <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">
                                            {{ __('عرض') }}
                                        </a>
                                    </div>
                                    @auth

                                        @if (auth()->user()->id === $post->user_id)
                                            <a class="btn btn-outline-primary" href="{{ route('posts.edit', $post->id) }}">
                                                {{ __('تعديل') }}
                                            </a>
                                            <a class="btn btn-outline-danger" href="{{ route('posts.destroy', $post->id) }}"
                                                onclick="event.preventDefault();
                                    document.getElementById('delete{{ $post->id }}').submit();">

                                                حذف
                                            </a>
                                            <form id="delete{{ $post->id }}"
                                                action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                class="d-none">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>

    </div>
@endsection
