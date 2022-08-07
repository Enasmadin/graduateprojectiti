@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">


                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('تعديل الحساب') }}</h1>

                        <form method="POST" action="{{ route('profiles.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label for="city" class="form-label text-primary">{{ __('المدينة') }}</label>
                                <input type="text" class="form-control  @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city', $user->city) }}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label text-primary">{{ __('البريد الإلكتروني') }}</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label for="phone_number" class="form-label text-primary">{{ __('رقم المحمول') }}</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number" placeholder="الكمية الإفتراضيه ب 1" name="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label for="userPic" class="form-label text-primary">{{ __('الصورة الشخصية') }}</label>

                                <div class="row">
                                    <div class="col">
                                        <input class="form-control" type="file" id="userPic" multiple
                                            name="profile_pic"
                                            value="{{ $user->profile_pic ? asset('profilepic') . '/' . $user->profile_pic : old('profile_pic') }}">
                                    </div>

                                    <div class="col">
                                        <img class="img-fluid img-thumbnail"
                                            src="{{ asset('profilepic') . '/' . $user->profile_pic }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>


                            </div>

                            <div class="col-12 text-center mt-3 me-auto">
                                <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
