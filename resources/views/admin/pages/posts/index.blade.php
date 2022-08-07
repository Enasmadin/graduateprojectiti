@extends('admin.layouts.master')
@section('css')

@section('title')
    طلبية - المنشورات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع المنشورات</h4>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <!-- end errors -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <!-- add Grade -->

            <div class="card-body">



                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>سعر التوصيل</th>
                                <th>الحالة</th>
                                <th>اسم المنتج</th>
                                <th>صورة المنتج</th>
                                <th>اسم التاجر</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->deliver_price }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ $post->product->name }}</td>
                                    <td><img class="card-img-top"
                                            src="{{ asset('productpic') . '/' . $post->product->product_pic }}"
                                            alt=""></td>
                                    <td>{{ $post->user->name }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $post->id }}" title="edit"><i
                                                class="fa fa-edit"></i></button>


                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf


                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i></button>

                                        </form>

                                    </td>
                                </tr>

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
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="title"
                                                                    class="form-label">{{ __('Title') }}</label>
                                                                <input type="text" name="title"
                                                                    class="form-control @error('title') is-invalid @enderror"
                                                                    id="title" name="title"
                                                                    value="{{ old('title', $post->title) }}">
                                                                @error('title')
                                                                    <div class="aler alert-danger p-2 mt-1 rounded-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description"
                                                                    class="form-label">{{ __('Description') }}</label>
                                                                <input type="text" name="description"
                                                                    class="form-control @error('description') is-invalid @enderror"
                                                                    id="description"
                                                                    value="{{ old('description', $post->description) }}">
                                                                @error('description')
                                                                    <div class="aler alert-danger p-2 mt-1 rounded-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="from"
                                                                    class="form-label">{{ __('From') }}</label>
                                                                <input type="text" name="from"
                                                                    class="form-control @error('from') is-invalid @enderror"
                                                                    id="from"
                                                                    value="{{ old('from', $post->from) }}">
                                                                @error('from')
                                                                    <div class="aler alert-danger p-2 mt-1 rounded-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="to"
                                                                    class="form-label">{{ __('To') }}</label>
                                                                <input type="text" name="to"
                                                                    class="form-control @error('to') is-invalid @enderror"
                                                                    id="to" value="{{ old('to', $post->to) }}">
                                                                @error('to')
                                                                    <div class="aler alert-danger p-2 mt-1 rounded-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deliver_price"
                                                                    class="form-label">{{ __('Deliver Price') }}</label>
                                                                <input type="text" name="deliver_price"
                                                                    class="form-control @error('deliver_price') is-invalid @enderror"
                                                                    id="deliver_price"
                                                                    value="{{ old('deliver_price', $post->deliver_price) }}">
                                                                @error('deliver_price')
                                                                    <div class="aler alert-danger p-2 mt-1 rounded-1">
                                                                        {{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="product_id"
                                                                    class="form-label">{{ __('Product') }}</label>
                                                                <select name="product_id" id="product_id">
                                                                    {{-- <option value="0">{{ __('Choose Product') }}</option> --}}
                                                                    @foreach ($post->user->products as $product)
                                                                        <option value="{{ old('id', $product->id) }}"
                                                                            {{ $product->id == $post->product_id ? 'selected' : '' }}>
                                                                            {{ $product->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- @error('product_id')
                        <div class="aler alert-danger p-2 mt-1 rounded-1">{{ $message }}</div>
                    @enderror --}}
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Submit') }}</button>
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



                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                اضافة مستخدم
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>



                                                <p class="h1 text-center text-primary">
                                                    {{ __('إضافة منشور') }}
                                                </p>

                                                <form action="{{ route('admin.posts.store') }}" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="title"
                                                            class="form-label">{{ __('العنوان') }}</label>
                                                        <input type="text" name="title"
                                                            class="form-control @error('title') is-invalid @enderror"
                                                            id="title" value="{{ old('title') }}">
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="description"
                                                            class="form-label">{{ __('الوصف') }}</label>
                                                        <textarea type="text" name="description" class="form-control @error('name') is-invalid @enderror"
                                                            id="description" value="{{ old('description') }}"></textarea>

                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="from"
                                                            class="form-label">{{ __('من') }}</label>
                                                        <input type="text" name="from"
                                                            class="form-control  @error('name') is-invalid @enderror"
                                                            id="from" value="{{ old('from') }}">
                                                        @error('from')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="to"
                                                            class="form-label">{{ __('إلى') }}</label>
                                                        <input type="text" name="to"
                                                            class="form-control  @error('name') is-invalid @enderror"
                                                            id="to" value="{{ old('to') }}">
                                                        @error('to')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="deliver_price"
                                                            class="form-label">{{ __('سعر التوصيل') }}</label>
                                                        <input type="number" name="deliver_price"
                                                            class="form-control  @error('name') is-invalid @enderror"
                                                            id="deliver_price" value="{{ old('deliver_price') }}"
                                                            min="0">
                                                        @error('deliver_price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>






                                                    {{-- <label for="product_id" class="form-label">{{ __('اختر المنتج') }}</label>
                        <input class="form-control" list="productList" id="product_id"
                            placeholder="{{ __('ابحث عن المنتج') }}">
                        <datalist id="productList">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </datalist> --}}





                                                    {{-- <label for="client_id" class="form-label">{{ __('اختر الزبون') }}</label>
                        <input class="form-control" list="clientsList" id="client_id" placeholder="{{ __('ابحث عن الزبون') }}">
                        <datalist id="clientsList">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </datalist> --}}




                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق</button>

                                                <button type="submit" class="btn btn-success">حفظ</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            @endsection
                            <!-- delete modal -->
                            <!-- Button trigger modal -->

                            <!-- here -->
                            {{--
