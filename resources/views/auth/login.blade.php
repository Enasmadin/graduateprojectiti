@extends('layouts.app')

@section('content')
    <section class="vh-100">

        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="background.webp" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                    <h1 class="text-center">{{ __('تسجيل دخول') }}</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">{{ __('البريد الإلكتروني') }}</label>
                            <input type="email" id="email"
                                class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">{{ __('كلمة السر') }}</label>
                            <input type="password" id="password"
                                class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                name="password" autocomplete="new-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-outline mb-4 d-grid gap-2">
                            <button style="background: #3C66AE;border:#3C66AE;color:white" type="submit"
                                class="btn  btn-lg "> {{ __('تسجيل') }}</button>
                        </div>

                    </form>
                </div>

            </div>
    </section>
@endsection
