@extends('layouts.app')

@section('links')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
  integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous"> --}}
@endsection


@section('content')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger alert-block alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <div class="col-12">
                                <img src="{{ asset('productpic' . '/' . $post->product->product_pic) }}"
                                    class="product-image img-fluid w-100" alt="Product Image">
                            </div>

                        </div>
                        <div class="col-12 col-sm-6 text-right">
                            <h4 class="my-3 text-center text-primary">{{ $post->title }}</h4>
                            <p class="mx-4">{{ $post->description }}</p>

                            <hr class="m-4">
                            <h4 class="text-primary text-center m-4">بيانات الطلبية</h4>
                            <div class="mx-4">
                                <h6><span class="text-primary">من:</span> {{ $post->from }}</h6>
                                <h6><span class="text-primary">إلى:</span> {{ $post->to }}</h6>
                                <h6><span class="text-primary">سعر التوصيل المقترح:</span> {{ $post->deliver_price }} جنيه
                                    مصري</h6>
                            </div>
                            <hr class="m-4">
                            <div>
                                <h4 class="text-primary text-center m-4">بيانات المنتج</h4>
                            </div>
                            <div class="mx-4">
                                <h6><span class="text-primary">اسم: </span> {{ $post->product->name }}</h6>
                                <h6><span class="text-primary">سعر: </span> {{ $post->product->price }} جنيه مصري</h6>
                                @if ($post->product->weight)
                                    <h6><span class="text-primary">الحجم: </span> {{ $post->product->weight }} جرام</h6>
                                @endif
                                <h6><span class="text-primary">الكميه: </span> {{ $post->product->quantity }}</h6>
                            </div>
                            <hr class="m-4">
                            <div>
                                <h4 class="text-primary text-center m-4">بيانات التاجر</h4>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('profilepic/' . $post->user->profile_pic) }}"
                                    class="rounded-circle card-img-top w-25">
                            </div>
                            <div class="text-center">
                                <a href="{{ route('profiles.show', $post->user->id) }}"
                                    class="text-center text-decoration-none"> {{ $post->user->name }}</a>
                            </div>




                            <div class="mt-4">

                                @auth
                                    @authDelivery
                                    {{-- @dd($favs->where('delivery_id',auth()->user()->id)->where('post_id',$post->id)->exists()) --}}
                                    @if ($favs->where('delivery_id', auth()->user()->id)->where('post_id', $post->id)->count() > 0)
                                        <small class="text-danger mx-4">هذا المنشور موجود بالفعل في المنشورات المفضله الخاصه
                                            بك</small>
                                    @else
                                        <a href="{{ route('wishlist.store') }}" class="btn btn-default btn-lg btn-flat"
                                            onclick="event.preventDefault();
                document.getElementById('wishlist').submit();">

                                            <i class="fas fa-heart fa-lg mr-2"></i>
                                            اضف الى المفضلة
                                        </a>
                                        <form id="wishlist" action="{{ route('wishlist.store') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            <input hidden name="postId" class="d-none" value="{{ $post->id }}"
                                                type="text">
                                        </form>
                                    @endif
                                    @endauthDelivery
                                @endauth
                            </div>



                        </div>
                    </div>

                </div>
                <!-- /.card-body -->




                <!-- /.card -->

        </section>
        <div class="row text-right m-4">
            <div class="col-sm-12 my-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <div class="row">
                                @foreach ($UserPosts as $post)
                                    <div class="col " style="width: 23rem;">
                                        <div class="card shadow-sm text-center h-100">
                                            <img src="{{ asset('productpic') . '/' . $post->product->product_pic }}"
                                                class="card-img-top img-fluid" alt="{{ $post->product->name }}"
                                                style="height:200px; object-fit:cover;">

                                            <div class="card-body">
                                                <h1 style="color: #007EA7">{{ $post->title }}</h1>
                                                <p class="card-text">
                                                    <span class="text-muted">{{ __('الوصف: ') }}</span>
                                                    {{ Str::words($post->description, 4) }}
                                                </p>
                                                <p class="card-text">
                                                    <span class="text-muted">
                                                        {{ __('التوصيل من: ') }}
                                                    </span>
                                                    {{ $post->from }}
                                                </p>
                                                <p class="card-text">
                                                    <span class="text-muted">{{ __('إلى: ') }}
                                                    </span>
                                                    {{ $post->to }}
                                                </p>

                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}">
                                                        {{ __('عرض') }}
                                                    </a>
                                                    {{-- //FIXME --}}
                                                    {{-- @vendor --}}
                                                    @auth

                                                        @if (auth()->user()->id === $post->user_id)
                                                            <a class="btn btn-outline-primary"
                                                                href="{{ route('posts.edit', $post->id) }}">
                                                                {{ __('تعديل') }}
                                                            </a>
                                                        @endif
                                                    @endauth
                                                    {{-- @endvendor --}}
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- /.content -->
    {{-- </div> --}}
    <!-- /.content-wrapper -->
    <div class="container">
        @auth
            @authDelivery
            <div class="row mt-5 mb-3">
                <div class="col-sm-7 offset-sm-3 offset-md-0 ">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#addcomment" role="button" aria-expanded="false"
                        aria-controls="addcomment">
                        {{ __('اضف تعليقا') }}
                    </a>
                </div>
            </div>
            <div class="row ">
                <div class="col col-md-12 ">
                    <div class="collapse multi-collapse" id="addcomment">
                        <div class="card card-body">
                            <!-- store comment -->
                            <form class="row g-3" method="POST" action="{{ route('comments.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <!-- <input class="hidden" name="post_id" value="{{$post->id}}"> --> --}}
                                <div class="col-12">
                                    <label for="name" class="form-label text-primary">نبذة عن خبرتك</label>
                                    <input value="{{ old('description') }}" type="text"
                                        class="form-control @error('description') is-invalid @enderror" id="description"
                                        name="description">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="price" class="form-label text-primary">تاريخ التسليم</label>
                                    <input type="date" value="{{ old('delivery_date') }}"
                                        class="form-control @error('delivery_date') is-invalid @enderror" id="delivery_date"
                                        name="delivery_date">
                                    @error('delivery_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="weight" class="form-label text-primary">سعر التوصيل</label>
                                    <input value="{{ old('deliver_price') }}" type="text"
                                        class="form-control @error('deliver_price') is-invalid @enderror" id="deliver_price"
                                        name="deliver_price">
                                    @error('deliver_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                            <!-- end store comment -->
                        </div>
                    </div>
                </div>
            </div>
            @endauthDelivery
        @endauth
        <!-- end comment button -->




        <section>
            <div class="row text-right">
                @foreach ($comments as $comment)
                    <div class="col-sm-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    <span class="text-muted">
                                        <img src="{{ asset('profilepic') . '/' . $comment->user->profile_pic }}"
                                            class="card-img-top  rounded-circle" alt="..."
                                            style="width:70px; height:70px;"></span>

                                    <span class="fw-bold fs-5">{{ $comment->user->name }}</span>
                                </div>
                                <p class="card-text">
                                    <span class="text-muted">الوصف:</span>
                                    &nbsp; {{ $comment->description }}
                                </p>
                                <p class="card-text">
                                    <span class="text-muted"> تاريخ التسليم :</span>
                                    &nbsp;{{ $comment->delivery_date }}
                                </p>
                                <p class="card-text">
                                    <span class="text-muted">سعر التوصيل:</span>
                                    &nbsp;{{ $comment->deliver_price }}
                                </p>

                                @auth
                                    @authDelivery
                                    @if (auth()->user()->id === $comment->user_id)
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-primary mx-2 align-self-start" data-bs-toggle="collapse"
                                                href="#commentedit{{ $loop->iteration }}" role="button"
                                                aria-expanded="false"
                                                aria-controls="commentedit{{ $loop->iteration }}">{{ __('تعديل') }}</a>

                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post"
                                                class="mb-3">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger "> حذف </button>
                                            </form>

                                        </div>


                                        <div class="row">
                                            <div class="col col-md-12 col-lg-12">
                                                <div class="collapse multi-collapse" id="commentedit{{ $loop->iteration }}">
                                                    <div class="card card-body">
                                                        <!-- store comment -->
                                                        <form action="{{ route('comments.update', $comment->id) }}"
                                                            method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            {{-- <!-- <input class="hidden" name="post_id" value="{{$post->id}}"> --> --}}
                                                            <div class="col-12">
                                                                <label for="name" class="form-label text-primary">نبذة عن
                                                                    خبرتك</label>
                                                                <input type="text" class="form-control" id="description"
                                                                    name="description"
                                                                    value="{{ old('description', $comment->description) }}">
                                                                @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="price" class="form-label text-primary">تاريخ
                                                                    التسليم</label>
                                                                <input type="date" class="form-control" id="delivery_date"
                                                                    name="delivery_date"
                                                                    value="{{ old('delivery_date', $comment->delivery_date) }}">
                                                                @error('delivery_date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="weight" class="form-label text-primary">سعر
                                                                    التوصيل</label>
                                                                <input type="number" class="form-control" id="deliver_price"
                                                                    name="deliver_price"
                                                                    value="{{ old('deliver_price', $comment->deliver_price) }}">
                                                                @error('deliver_price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>


                                                            <div class="col-12 text-center">
                                                                <button type="submit" class="btn btn-primary">حفظ</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                    @endauthDelivery
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    @endsection


    @section('scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script> --}}
        {{-- <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('lte/dist/js/demo.js')}}"></script> --}}

        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    @endsection
