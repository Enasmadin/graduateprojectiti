@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row"
            style="background: url(https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp) center center no-repeat">

            <div class="col-sm-12 col-md-6">
                <div class="card text-black rounded-3 shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ __('اشترك الآن') }}</p>

                                <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="d-flex align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="name">{{ __('الاسم') }}</label>

                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="d-flex  align-items-center mb-4">

                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email">{{ __('البريد الإلكتروني') }}</label>

                                            <input type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="password">{{ __('كلمة السر') }}</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label"
                                                for="password_confirmation">{{ __('تأكيد كلمة السر') }}
                                            </label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror" />
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="phone_number">{{ __('رقم المحمول') }}</label>
                                            <input type="text" id="phone_number" name="phone_number"
                                                class="form-control
                                                @error('phone_number') is-invalid @enderror"
                                                value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="profile_pic">{{ __('إضافة صورة للحساب') }}
                                            </label>
                                            <input class="form-control @error('profile_pic') is-invalid @enderror"
                                                type="file" name="profile_pic" id="profile_pic" />
                                            @error('profile_pic')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="small text-muted mt-2">
                                                {{ __('الصورة يجب ألا تتعدى 50 ميجابايت') }}
                                            </div>
                                        </div>
                                    </div>




                                    <h6 class="mb-0 me-4">{{ __('النوع') }}</h6>

                                    <div class=" mb-2">
                                        <div class="form-check form-check-inline my-3 me-4">
                                            <input {{ old('gender') == 'female' ? 'checked' : '' }}
                                                class="form-check-input @error('gender') is-invalid @enderror"
                                                type="radio" name="gender" id="femaleGender" value="female" />
                                            <label class="form-check-label" for="femaleGender">{{ __('أنثى') }}</label>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-check form-check-inline my-3 me-4">
                                            <input {{ old('gender') == 'male' ? 'checked' : '' }}
                                                class="form-check-input @error('gender') is-invalid @enderror"
                                                type="radio" name="gender" id="maleGender" value="male" />
                                            <label class="form-check-label" for="maleGender">{{ __('ذكر') }}</label>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div>

                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="mb-4">
                                            <select class="form-select @error('city') is-invalid @enderror" name="city"
                                                value="{{ old('city') }}">
                                                <option disabled selected>المدينة</option>
                                                <option value="cairo">القاهرة</option>
                                                <option value="minya">المنيا</option>
                                                <option value="alex">الآسكندرية</option>
                                                <option value="alex">أسوان</option>
                                            </select>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label"
                                                for="national_id_pic">{{ __('الوجه الأمامي للرقم القومي') }}
                                            </label>
                                            <input
                                                class="form-control @error('national_id_first_pic') is-invalid @enderror"
                                                type="file" name="national_id_first_pic" id="national_id_first_pic" />
                                            @error('national_id_first_pic')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex  align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label"
                                                for="national_id_pic">{{ __('الوجه الخلفي للرقم القومي') }}
                                            </label>
                                            <input
                                                class="form-control @error('national_id_second_pic') is-invalid @enderror"
                                                type="file" name="national_id_second_pic"
                                                id="national_id_second_pic" />
                                            @error('national_id_second_pic')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <h6 class="mb-0 me-4">{{ __('نوع المستخدم') }}</h6>

                                    <div class="d-flex align-items-center mb-2">
                                        <div class="form-check form-check-inline my-3 me-4">
                                            <input {{ old('role') == 'vendor' ? 'checked' : '' }}
                                                class="form-check-input @error('role') is-invalid @enderror"
                                                type="radio" name="role" id="vendorUser" value="vendor" />
                                            <label class="form-check-label" for="vendorUser">{{ __('تاجر') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline my-3 me-4">
                                            <input {{ old('delivery') == 'delivery' ? 'checked' : '' }}
                                                class="form-check-input @error('role') is-invalid @enderror"
                                                type="radio" name="role" id="deliveryUser" value="delivery" />
                                            <label class="form-check-label"
                                                for="deliveryUser">{{ __('مندوب توصيل') }}</label>
                                        </div>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button class="btn btn-primary btn-lg">{{ __('اشترك') }}</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
