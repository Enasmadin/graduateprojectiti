@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    طلبية - التصنيفات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الفئات</h4>
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




                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافة فئة
                </button>
                <br><br>

@if ($categories->count() == 0)
<div class="text-center col col-md-12">

{{ __('لاتوجد  فئات ') }}

</div>

@else


                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>id</th>
                                <th>الاسم</th>
                                <th>تم الانشاء في</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        @endif
                        <tbody>


                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $category->id }}" title="edit" style="width: 34px; height: 34px; margin:1px; display: inline-block;">
                                            <i
                                                class="fa fa-edit" ></i></button>


                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="width: 34px; height: 34px; margin:1px; display: inline-block;">
                                            @method('DELETE')
                                            @csrf


                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>

                                        </form>

                                    </td>
                                </tr>

                                <!-- edit modal Grade -->
                                <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('categories.update', $category->id) }}"
                                                method="POST">
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
                                                            <label for="name" class="mr-sm-2">الاسم:</label>
                                                            <input id="name" type="text" name="name"
                                                                class="form-control" value="{{ $category->name }}"
                                                                required>
                                                            {{-- <!-- <input id="id"  type="hidden" name="id" class="form-control" value="{{$category->id}}"> --> --}}
                                                        </div>

                                                        <br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-success">حفظ</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete modal -->
                                <!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('categories.destroy', $category->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf

                                                    {{ trans('Grades_trans.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id"
                                                        class="form-control" value="{{ $category->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-success">حفظ</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end delete modal -->
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="float-right">{{ $categories->links() }}</div>
            </div>

        </div>
    </div>
    <!-- here -->

    <!-- add modal Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title" id="exampleModalLabel">
                        اضافة فئة
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>



                    </button>
                </div>
                <div class="modal-body">
                    <!-- add form   here -->
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="Name" class="mr-sm-2">الاسم
                                    :</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>

                            <br><br>
                        </div>
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
