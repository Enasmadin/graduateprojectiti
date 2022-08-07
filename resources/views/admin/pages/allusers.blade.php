@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    طلبية - المستخدين
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع الاعضاء</h4>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <!-- add Grade -->

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- end errors -->


                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافة مستخدم
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>النوع</th>
                                <th>الحالة</th>
                                <th>الصورة الشخصية</th>
                                <th>صورة البطاقة الامامية</th>
                                <th>الصورة البطاقة الخلفية</th>
                                <th> المدينة </th>
                                <th> رقم الموبايل </th>
                                <th> ادمن</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td><img class="card-img-top"
                                            src="{{ asset('profilepic') . '/' . $user->profile_pic }}" alt="">
                                    </td>
                                    <td><img class="card-img-top"
                                            src="{{ asset('nationalidpic') . '/' . $user->national_id_first_pic }}"
                                            alt=""></td>
                                    <td><img class="card-img-top"
                                            src="{{ asset('nationalidpic') . '/' . $user->national_id_second_pic }}"
                                            alt=""></td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->is_admin }}</td>



                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $user->id }}" title="edit"><i
                                                class="fa fa-edit"></i></button>


                                        <form action="{{ route('admines.destroy', $user->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf


                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>

                                        </form>

                                    </td>
                                </tr>

                                <!-- edit modal Grade -->
                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admines.update', $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        edit
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>



                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- edit form   here -->

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="name">{{ __('Name') }}</label>

                                                                    <input type="text" id="name" name="name"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        value="{{ $user->name ? $user->name : old('name') }}">
                                                                    @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>

                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="email">{{ __('Your Email') }}</label>

                                                                    <input type="email" id="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        name="email"
                                                                        value="{{ $user->email ? $user->email : old('email') }}">

                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>




                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <label class="form-label"
                                                                        for="phone_number">{{ __('Phone Number') }}</label>
                                                                    <input type="number" id="phone_number"
                                                                        name="phone_number"
                                                                        class="form-control
                                                @error('phone_number') is-invalid @enderror"
                                                                        value="{{ $user->phone_number ? $user->phone_number : old('phone_number') }}">
                                                                    @error('phone_number')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>



                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                                <div class="form-outline flex-fill mb-0">
                                                                    <img class="card-img-top"
                                                                        src="{{ asset('profilepic') . '/' . $user->profile_pic }}"
                                                                        alt="">


                                                                    <label class="form-label"
                                                                        for="profile_pic">{{ __('Upload Profile Picture') }}
                                                                    </label>
                                                                    <input
                                                                        class="form-control @error('profile_pic') is-invalid @enderror"
                                                                        type="file" name="profile_pic"
                                                                        id="profile_pic"
                                                                        value="{{ $user->profile_pic ? asset('profilepic') . '/' . $user->profile_pic : old('profile_pic') }}" />
                                                                    @error('profile_pic')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <div class="small text-muted mt-2">
                                                                        {{ __('Upload your profile picture. Max file size 50 MB') }}
                                                                    </div>
                                                                </div>
                                                            </div>








                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>

                                                                <div class="form-outline flex-fill mb-0">
                                                                    <img class="card-img-top"
                                                                        src="{{ asset('nationalidpic') . '/' . $user->national_id_first_pic }}"
                                                                        alt="">
                                                                    <label class="form-label"
                                                                        for="national_id_pic">{{ __('Upload National ID') }}
                                                                    </label>
                                                                    <input
                                                                        class="form-control @error('national_id_first_pic') is-invalid @enderror"
                                                                        type="file" name="national_id_first_pic"
                                                                        id="national_id_first_pic"
                                                                        value="{{ $user->national_id_first_pic ? asset('nationalidpic') . '/' . $user->national_id_first_pic : old('national_id_first_pic') }}" />
                                                                    @error('national_id_first_pic')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror

                                                                    <div class="form-outline flex-fill mb-0">
                                                                        <img class="card-img-top"
                                                                            src="{{ asset('nationalidpic') . '/' . $user->national_id_second_pic }}"
                                                                            alt="">
                                                                        <input
                                                                            class="form-control @error('national_id_second_pic') is-invalid @enderror"
                                                                            type="file"
                                                                            name="national_id_second_pic"
                                                                            id="national_id_second_pic"
                                                                            value="{{ $user->national_id_second_pic ? asset('nationalidpic') . '/' . $user->national_id_second_pic : old('national_id_second_pic') }}" />
                                                                        @error('national_id_second_pic')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                        <div class="small text-muted mt-2">
                                                                            {{ __('Upload your National ID picture. Max file size 50 MB') }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <h6 class="mb-0 me-4">{{ __('city') }}</h6>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <select class="form-select" name="city"
                                                                        value="{{ $user->city ? $user->city : old('city') }}">

                                                                        <option value="cairo">Cairo</option>
                                                                        <option value="minya">Minya</option>
                                                                        <option value="alex">Alex</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <h6 class="mb-0 me-4">{{ __('Gender') }}</h6>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        type="radio" name="gender"
                                                                        id="femaleGender" value="female"
                                                                        {{ $user->gender == 'female' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="femaleGender">{{ __('Female') }}</label>
                                                                </div>
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        type="radio" name="gender" id="maleGender"
                                                                        value="male"
                                                                        {{ $user->gender == 'male' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="maleGender">{{ __('Male') }}</label>
                                                                </div>
                                                                @error('gender')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>


                                                            <h6 class="mb-0 me-4">{{ __('Role') }}</h6>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('role') is-invalid @enderror"
                                                                        type="radio" name="role"
                                                                        id="femaleGender" value="vendor"
                                                                        {{ $user->role == 'vendor' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="femaleGender">{{ __('vendor') }}</label>
                                                                </div>
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        type="radio" name="role" id="maleGender"
                                                                        value="delivery"
                                                                        {{ $user->role == 'delivery' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="maleGender">{{ __('delivery') }}</label>
                                                                </div>
                                                                @error('role')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <br><br>
                                                            <h6 class="mb-0 me-4">{{ __('Admin') }}</h6>

                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('is_admin') is-invalid @enderror"
                                                                        type="radio" name="is_admin"
                                                                        id="femaleGender" value="0"
                                                                        {{ $user->is_admin == '0' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="femaleGender">{{ __('No') }}</label>
                                                                </div>
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        type="radio" name="is_admin"
                                                                        id="maleGender" value="1"
                                                                        {{ $user->is_admin == '1' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="maleGender">{{ __('Yes') }}</label>
                                                                </div>
                                                                @error('is_admin')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>



                                                            <div class="d-flex flex-row align-items-center mb-4">
                                                                <div class="form-check form-check-inline mb-0 me-4">

                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">اغلاق</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">حفظ</button>

                                                                </div>
                                                            </div>
                                                            <br><br>
                                                        </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete modal -->
                                <!-- Button trigger modal -->
                            @endforeach

                    </table>
                </div>
                <div class="float-right">{{ $users->links() }}</div>
            </div>

        </div>
    </div>
    <!-- here -->

    <!-- add modal Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admines.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">

                        <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title" id="exampleModalLabel">
                            اضافة مستخدم
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>



                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add form   here -->

                        <div class="row container">
                            <!-- register -->






                            <div class="col-12">
                                <label class="form-label text-primary" for="name">الاسم كامل</label>

                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-12">
                                <label class="form-label text-primary" for="email">البريد الالكتروني</label>

                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label class="form-label text-primary" for="password">كلمة السر</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label class="form-label text-primary" for="password_confirmation">تأكيد كلمة
                                    السر</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" />
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-12">
                                <label class="form-label text-primary" for="phone_number">رقم التليفون</label>
                                <input type="number" id="phone_number" name="phone_number"
                                    class="form-control
                                                @error('phone_number') is-invalid @enderror"
                                    value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-12">
                                <label class="form-label text-primary" for="profile_pic">رفع الصورة الشخصية</label>
                                <input class="form-control @error('profile_pic') is-invalid @enderror" type="file"
                                    name="profile_pic" id="profile_pic" />
                                @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="small text-muted mt-2">
                                    ثم برفع صورتك الشخصية على أن لا تتجاوز 5 ميجا بايت
                                </div>
                            </div>





                            <div class="col-12 mt-3">
                                <label class="form-label text-primary" for="genderr">النوع</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('gender') is-invalid @enderror"
                                            type="radio" name="gender" id="femaleGender" value="female" />
                                        <label class="form-check-label" for="femaleGender">أنثى</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('gender') is-invalid @enderror"
                                            type="radio" name="gender" id="maleGender" value="male" />
                                        <label class="form-check-label" for="maleGender">ذكر</label>
                                    </div>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label text-primary" for="city">المدينه</label>


                                <select class="form-control form-select py-2" name="city">
                                    <option disabled selected>City</option>
                                    <option value="cairo">Cairo</option>
                                    <option value="minya">Minya</option>
                                    <option value="alex">Alex</option>
                                </select>
                            </div>



                            <div class="col-12 mt-3">
                                <label class="form-label text-primary" for="nationalid">قم برفع وجهي بطاقة الرقم
                                    القزمي</label>
                                <input class="form-control @error('national_id_first_pic') is-invalid @enderror"
                                    type="file" name="national_id_first_pic" id="national_id_first_pic" />
                                @error('national_id_first_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-outline flex-fill mb-0">
                                    <input class="form-control @error('national_id_second_pic') is-invalid @enderror"
                                        type="file" name="national_id_second_pic" id="national_id_second_pic" />
                                    @error('national_id_second_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="small text-muted mt-2">
                                        قم برفع بطاقة الرقم القومي على أن لا تتجاوز الصورة الواحده 5 ميجا بايت
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-3">
                                <label class="form-label text-primary" for="role">نوع المستخدم</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('role') is-invalid @enderror"
                                            type="radio" name="role" id="femaleGender" value="vendor" />
                                        <label class="form-check-label" for="femaleGender">تاجر</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('gender') is-invalid @enderror"
                                            type="radio" name="role" id="maleGender" value="delivery" />
                                        <label class="form-check-label" for="maleGender">مندوب شحن</label>
                                    </div>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <label class="form-label text-primary" for="role">أدمن</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('is_admin') is-invalid @enderror"
                                            type="radio" name="is_admin" id="femaleGender" value="0" />
                                        <label class="form-check-label" for="femaleGender">لا</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('gender') is-invalid @enderror"
                                            type="radio" name="is_admin" id="maleGender" value="1" />
                                        <label class="form-check-label" for="maleGender">نعم</label>
                                    </div>
                                    @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <!-- end register -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                <button type="submit" class="btn btn-success">حفظ</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <!-- finished -->
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
