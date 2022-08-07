@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    طلبية - المنتجات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع المنتجات</h4>
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


                <!-- end errors -->


                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافة منتج
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>سعر</th>
                                <th>الكميه</th>
                                <th>الصورة</th>
                                <th>التاجر</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td><img class="img-fluid w-25"
                                            src="{{ asset('productpic') . '/' . $product->product_pic }}"
                                            alt=""></td>
                                    <td>{{ $product->user->name }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info " data-toggle="modal"
                                            data-target="#edit{{ $product->id }}" title="edit"><i
                                                class="fa fa-edit"></i></button>


                                        <a class="btn btn-danger "
                                            href="{{ route('admin.products.destroy', $product->id) }}"
                                            onclick="event.preventDefault();
              document.getElementById('product-delete{{ $product->id }}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                        <form id="product-delete{{ $product->id }}"
                                            action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        {{-- <form action="{{ route('admin.products.destroy', $product->id )}}" method="post" >
      @method('DELETE')
      @csrf


    <button type="submit"
    class="btn btn-danger"><i class="fa fa-trash"></i></button>

    </form> --}}

                                    </td>
                                </tr>

                                <!-- edit modal Grade -->
                                <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.products.update', $product->id) }}"
                                                method="POST" enctype="multipart/form-data">
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
                                                    <div class="col-12">
                                                        <label for="name"
                                                            class="form-label text-primary">الاسم</label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="names" name="name"
                                                            value="{{ old('name', $product->name) }}">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="price"
                                                            class="form-label text-primary">السعر</label>
                                                        <input type="text"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            id="price" name="price"
                                                            value="{{ old('price', $product->price) }}">
                                                        @error('price')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-12">
                                                        <label for="weight"
                                                            class="form-label text-primary">الوزن</label>
                                                        <input type="text"
                                                            class="form-control @error('weight') is-invalid @enderror"
                                                            id="weight" placeholder="الوزن اختياري" name="weight"
                                                            value="{{ old('weight', $product->weight) }}">
                                                        @error('weight')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-12">
                                                        <label for="quantity"
                                                            class="form-label text-primary">الكمية</label>
                                                        <input type="text"
                                                            class="form-control @error('quantity') is-invalid @enderror"
                                                            id="quantity" placeholder="الكمية الإفتراضيه ب 1"
                                                            name="quantity"
                                                            value="{{ old('quantity', $product->quantity) }}">
                                                        @error('quantity')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>


                                                    <div class="col-12">
                                                        <label for="category"
                                                            class="form-label text-primary">{{ __('أضف تصنيفا') }}</label>
                                                        <select id="category"
                                                            class="form-select form-control  py-2 @error('category_id') is-invalid @enderror"
                                                            name="category_id">

                                                            @foreach ($cats as $cat)
                                                                <option value="{{ old('category_id', $cat->id) }}"
                                                                    name="category_id">{{ $cat->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                        @error('category_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12 my-3">
                                                        <label for="vendor_id"
                                                            class="form-label text-primary">{{ __('التاجر') }}</label>
                                                        <select name="user_id" id="vendor_id"
                                                            class="form-control form-select py-2">
                                                            {{-- <option value="0">{{ __('Choose Product') }}</option> --}}
                                                            @foreach ($users as $user)
                                                                <option value="{{ old('user_id', $user->id) }}">
                                                                    {{ $user->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- @error('product_id')
            <div class="aler alert-danger p-2 mt-1 rounded-1">{{ $message }}</div>
        @enderror --}}
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="productPic" class="form-label text-primary">أضف
                                                            صور المنتج</label>
                                                        <input
                                                            class="form-control @error('product_pic') is-invalid @enderror"
                                                            type="file" id="productPic" multiple
                                                            name="product_pic"
                                                            value="{{ $product->product__pic ? asset('productpic') . '/' . $product->product_pic : old('product_pic') }}">
                                                        @error('product_pic')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>




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
                            @endforeach
                    </table>
                </div>
                <div class="float-right">{{ $products->links() }}</div>
            </div>

        </div>
    </div>





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container ">
                    <form class="row g-3" method="POST" action="{{ route('admin.products.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title container mx-4"
                                id="exampleModalLabel">
                                اضافة منتج
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>





                        </div>
                        <div class="modal-body ">

                            <div class="container row">
                                <div class="col-12">
                                    <label for="name"
                                        class="form-label  text-primary">{{ __('الاسم') }}</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="price"
                                        class="form-label text-primary ">{{ __('السعر') }}</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="weight"
                                        class="form-label text-primary ">{{ __('الوزن') }}</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror"
                                        id="weight" placeholder="الوزن اختياري" name="weight"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="quantity"
                                        class="form-label text-primary ">{{ __('الكمية') }}</label>
                                    <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                        id="quantity" placeholder="الكمية الإفتراضيه ب 1" name="quantity"
                                        value="{{ old('quantity') }}">
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <lab el for="category" class="form-label text-primary">
                                        {{ __('اختر تصنيفا') }}</lab>
                                    <select id="category"
                                        class="form-select overflow-hidden py-2 form-control  @error('category') is-invalid @enderror"
                                        name="category_id">


                                        @foreach ($cats as $cat)
                                            <option value="{{ old('category_id', $cat->id) }}" name="category_id">
                                                {{-- {{ $cat->id == $product->cat_id ? 'selected' : '' }}> --}}
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                        {{-- @foreach ($products as $product)
            <option value="{{ old('id', $product->id) }}"
                {{ $product->id == $post->product_id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach --}}

                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 my-3">
                                    <label for="vendor_id"
                                        class="form-label text-primary">{{ __('التاجر') }}</label>
                                    <select name="user_id" id="vendor_id" class="form-control form-select py-2">
                                        @foreach ($users as $user)
                                            <option value="{{ old('user_id', $user->id) }}">{{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-12">
                                    <label for="productPic"
                                        class="form-label text-primary ">{{ __('أضف صور المنتج') }}</label>
                                    <input class="form-control @error('product_pic') is-invalid @enderror"
                                        type="file" id="productPic" multiple name="product_pic">
                                    @error('product_pic')
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
