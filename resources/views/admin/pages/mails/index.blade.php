@extends('admin.layouts.master')
@section('css')

@section('title')
    طلبية - البريد
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> البريد</h4>
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

                @if ($mails->count() == 0)
                <div class="text-center col col-md-12">

              {{ __('لا توجد رسائل   ') }}

                </div>

            @else



                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريدالالكتروني</th>
                                <th>العنوان</th>
                                <th>محتوة الرساله</th>
                                <th>الاجراء </th>
                            </tr>
                        </thead>
                        @endif
                        <tbody>


                            @foreach ($mails as $mail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mail->name }}</td>
                                    <td>{{ $mail->email }}</td>
                                    <td>{{ $mail->title }}</td>
                                    <td>{{ $mail->body }}</td>
                                    <td>


                                        <form action="{{ route('admin.mails.destroy', $mail->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>

                                        </form>

                                    </td>
                                </tr>
                        </tbody>
                        @endforeach

                    </table>
                </div>
                <div class="float-right">{{ $mails->links() }}</div>
            </div>

        </div>
    </div>

@endsection
@section('js')

@endsection
