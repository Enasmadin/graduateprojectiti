@extends('layouts.post')

@section('links')
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
@endsection


@section('content')

<div class="container">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>E-commerce</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">E-commerce</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$post->title}}</h3>
              <div class="col-12">
                <img src="{{asset('productpic' . '/' . $post->product->product_pic)}}" class="product-image" alt="Product Image">
              </div>

            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$post->title}}</h3>
              <p>{{$post->description}}</p>

              <hr>
              <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div>

              <h4 class="mt-3">Size <small>Please select one</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                   سعر المنتج
                  </h2>
                   <h2 class="mb-0">
                    {{$post->product->price}}
                  </h2>
                <h4 class="mt-0">
                    <small>سعر التوصيل المقترح</small>
                    <small>{{$post->deliver_price}} </small>
                </h4>
              </div>

              <div class="mt-4">

                @auth
                @authDelivery
                <a  href="{{route('wishlist.store')}}" class="btn btn-default btn-lg btn-flat"  onclick="event.preventDefault();
                document.getElementById('wishlist').submit();">

                    <i class="fas fa-heart fa-lg mr-2"></i>
                    Add to Wishlist
                </a>
                <form id="wishlist" action="{{ route('wishlist.store') }}" method="POST"
                class="d-none">
                @csrf
                <input hidden name="postId" class="d-none" value="{{$post->id}}" type="text">
            </form>
                @endauthDelivery
                @endauth
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="container" lang="en">
  @auth
  @authDelivery
  <div class="row">
    <div class="col col-md-12">
        <div class="collapse multi-collapse" id="addcomment">
            <div class="card card-body">
                <!-- store comment -->
                <form class="row g-3" method="POST" action="{{ route('comments.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- <!-- <input class="hidden" name="post_id" value="{{$post->id}}"> --> --}}
                    <div class="col-12">
                        <label for="name" class="form-label text-primary">نبذة عن خبرتك</label>
                        <input value="{{old('description')}}" type="text" class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="price" class="form-label text-primary">تاريخ التسليم</label>
                        <input type="date" value="{{old('delivery_date')}}" class="form-control @error('delivery_date') is-invalid @enderror"
                            id="delivery_date" name="delivery_date">
                            @error('delivery_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="weight" class="form-label text-primary">سعر التوصيل</label>
                        <input value="{{old('deliver_price')}}" type="text" class="form-control @error('deliver_price') is-invalid @enderror"
                            id="deliver_price" name="deliver_price">
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





<div class="row">
@foreach ($post->comment as $comment)
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
                                href="#commentedit{{ $loop->iteration }}" role="button" aria-expanded="false"
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
                                        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            {{-- <!-- <input class="hidden" name="post_id" value="{{$post->id}}"> --> --}}
                                            <div class="col-12">
                                                <label for="name" class="form-label text-primary">نبذة عن
                                                    خبرتك</label>
                                                <input type="text"
                                                    class="form-control"
                                                    id="description" name="description"
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
                                                <input type="date"
                                                    class="form-control"
                                                    id="delivery_date" name="delivery_date"
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
                                                <input type="number"
                                                    class="form-control"
                                                    id="deliver_price" name="deliver_price"
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
</div>
</div>
@endsection


@section('scripts')
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('lte/dist/js/demo.js')}}"></script>
@endsection
