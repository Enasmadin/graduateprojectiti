@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    توصيلة - المنتجات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع المنشورات</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">القائمة</li>
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
                    اضافة منشور
                </button>
                <br><br>
                @if ($posts->count() == 0)
                    <div class="text-center col col-md-12">

                        {{ __('لاتوجد  منشورات ') }}

                    </div>
                @else
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>الوصف</th>
                                    <th>سعر التوصيل</th>
                                    <th>اسم المنتج</th>
                                    <th>صورة المنتج</th>
                                    <th>اسم التاجر</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                @endif
                <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->deliver_price }}</td>
                            <td>{{ $post->product->name }}</td>
                            <td><img class="card-img-top"
                                    src="{{ asset('productpic') . '/' . $post->product->product_pic }}"
                                    class="card-img-top img-fluid" alt="{{ $post->product->name }}"></td>
                            <td>{{ $post->user->name }}</td>

                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-info mr-1" data-toggle="modal"
                                        data-target="#edit{{ $post->id }}" title="edit"><i
                                            class="fa fa-edit"></i></button>


                                    <a class="btn btn-danger " href="{{ route('admin.posts.destroy', $post->id) }}"
                                        onclick="event.preventDefault();
document.getElementById('product-delete{{ $post->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <form id="product-delete{{ $post->id }}"
                                        action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
            </div>
            <div class="float-right">{{ $posts->links() }}</div>
        </div>

        <!-- edit modal Grade -->
        <div class="modal fade" id="edit{{ $post->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title" id="exampleModalLabel">
                                تعديل
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>


                        </div>
                        <div class="modal-body">
                            <!-- edit form   here -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">{{ __('عنوان المنشور') }}</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror" id="title"
                                            name="title" value="{{ old('title', $post->title) }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('الوصف') }}</label>
                                        <input type="text" name="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            id="description" value="{{ old('description', $post->description) }}">
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="from" class="form-label">{{ __('من') }}</label>
                                        <input type="text" name="from"
                                            class="form-control @error('from') is-invalid @enderror" id="from"
                                            value="{{ old('from', $post->from) }}">
                                        @error('from')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="to" class="form-label">{{ __('الى') }}</label>
                                        <input type="text" name="to"
                                            class="form-control @error('to') is-invalid @enderror" id="to"
                                            value="{{ old('to', $post->to) }}">
                                        @error('to')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="deliver_price" class="form-label">{{ __('سعر التوصيل') }}</label>
                                        <input type="text" name="deliver_price"
                                            class="form-control @error('deliver_price') is-invalid @enderror"
                                            id="deliver_price"
                                            value="{{ old('deliver_price', $post->deliver_price) }}">
                                        @error('deliver_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <button type="submit" class="btn btn-primary">{{ __('ارسال') }}</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        {{-- @foreach ($users as $user)
<br> {{$user->name}}

    @foreach ($user->products as $product)

    <br> {{$product->user_id}}
    @endforeach
@endforeach --}}

        </table>
    </div>
</div>

</div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container ">
                <form class="row g-3" method="POST" action="{{ route('admin.posts.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title container mx-4"
                            id="exampleModalLabel">
                            اضافة منشور
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>





                    </div>
                    <div class="modal-body ">
                        <div class="container row">
                            <div class="col-12">
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
                            <div class="col-12">
                                <label for="description" class="form-label text-primary">{{ __('الوصف') }}</label>
                                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                    id="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
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
                            <div class="col-12">
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

                            <div class="col-12">
                                <label for="deliver_price"
                                    class="form-label text-primary">{{ __('سعر التوصيل') }}</label>
                                <input type="text" name="deliver_price"
                                    class="form-control @error('deliver_price') is-invalid @enderror"
                                    id="deliver_price" value="{{ old('deliver_price') }}">
                                @error('deliver_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-12">
                                <label for="product_id"
                                    class="form-label text-primary">{{ __('اختر المنتج') }}</label>
                                <select class="form-select @error('product_id') is-invalid @enderror"
                                    name="product_id" id="product_id" value="{{ old('product_id') }}">
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
                        </div>

                        <div class="col-12 my-3">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                            <button type="submit" class="btn btn-success">حفظ</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

@endsection
