@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')

@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ __('عرض جميع الأعضاء') }}<h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('الرئيسية') }}</a></li>
                <li class="breadcrumb-item active">{{ __('القائمة') }}</li>
            </ol>
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

                <!-- errors -->
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


                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('الاسم') }}</th>
                                <th>{{ __('البريد') }}</th>
                                <th>{{ __('الجنس') }}</th>
                                <th>{{ __('النوع') }}</th>
                                <th>{{ __('الصورة الشخصية') }}</th>
                                <th>{{ __('وجه الرقم القومي') }}</th>
                                <th>{{ __('ظهر الرقم القومي') }}</th>
                                <th>{{ __('المدينة') }}</th>
                                <th>{{ __('رقم المحمول') }}</th>
                                <th>{{ __('الإجراء') }}</th>
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




                                    <td>
                                        <form action="{{ route('users.update', $user->id) }}" method="post"
                                            class="mb-3">

                                            @method('PUT')
                                            @csrf
                                            <label>{{ __('الحالة') }}</label>
                                            <select class="form-control" name="status">

                                                <option value="accepted">{{ __('قبول') }}</option>
                                                <option value="refused">{{ __('رفض') }}</option>

                                            </select>
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('حفظ') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>



                </div>
                <div class="modal-body">
                    <!-- edit form   here -->

                </div>
            </div>
        </div>


        <!-- delete modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->

    </div>
</div>
</div>





<!-- end delete modal -->
</tbody>
@endforeach

</table>
</div>
</div>

</div>
</div>
<!-- here -->

<!-- finished -->
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
