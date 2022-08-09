@extends('layouts.app')

@section('content')
    <div class="mt-0">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('profilepic/about.webp') }}" class="d-block w-100"
                        style="height: 400px; object-fit:cover">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('profilepic/city-delivery-service-courier-man-on-bike-vector-33700166.webp') }}"
                        class="d-block w-100" style="height: 400px; object-fit:cover">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('profilepic/delivery-colorful-set-vector-35490415.webp') }}" class="d-block w-100"
                        style="height: 400px; object-fit:cover">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('السابق') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('التالي') }}</span>
            </button>
        </div>
    </div>



    <section class="about section-padding mt-3 mb-5 bg-white" id="section_2">
        <div class="container">
            <div class="row">

                <div class=" col-12">
                    <h1 class="m-5 text-center ">
                        <u class="text-white text-decoration-none  bg-info p-2 rounded-3">{{ __('قصتنا') }}</u>
                    </h1>
                </div>


                <div class="col-lg-12 col-12 mt-5 mt-lg-0  mb-5">
                    <h4 class="mt-3 text-center">
                        الآن يمكنك أن تنقل أي شيء بأمان عن طريق

                        طلبية هو تطبيق يتيح لك توصيل طلبياتك إلى زبائنك بشكل احترافي آمن

                    </h4>

                    {{-- <div class="avatar-group border-top py-5 mt-5">
                        <img src="{{ asset('images/avatar/signup.png') }}" class="img-fluid avatar-image" alt="">

                        <img src="{{ asset('images/avatar/login.png" class="img-fluid avatar-image avatar-image-left') }}"
                            alt="">

                        <img src="{{ asset('images/avatar/allposts.png" class="img-fluid avatar-image avatar-image-left') }}"
                            alt="">

                        <img src="{{ asset('images/avatar/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg" class="img-fluid avatar-image avatar-image-left') }}"
                            alt="">

                        <p class="d-inline">120+ People are using this web </p>
                    </div> --}}
                </div>

            </div>
        </div>
    </section>


    <section class="speakers section-padding  " id="section_3">
        <div class="container">
            <div class="row">
                <div class=" col-12">
                    <h1 class="m-3 p-3 text-center ">
                        <u class="text-white text-decoration-none  bg-info p-2 rounded-3">كيفية استخدام تطبيق</u>
                    </h1>
                    <p class="text-center mb-5"> تقدر تستخدمه عن طريق اتباع 4 خطوات</p>
                </div>

            </div>



            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="speakers-thumb speakers-thumb-small">
                            <img src="{{ asset('images/avatar/register.png') }}" style=" width:200px; height:150px"
                                class="img-fluid speakers-image spekers-s" alt="">

                            <div class="speakers-info">
                                <h6 class="speakers-title mb-0 text-info"> الخطوه الأولي </h6>

                                <p class="speakers-text pb-5"> انشاء حساب جديد </p>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="speakers-thumb speakers-thumb-small">
                            <img src="{{ asset('images/avatar/login.png') }} " style=" width:200px; height:150px"
                                class="img-fluid speakers-image spekers-s" alt="">

                            <div class="speakers-info">
                                <h6 class="speakers-title mb-0 text-info"> الخطوه الثانيه

                                </h6>

                                <p class="speakers-text pb-5"> تسجيل الدخول </p>


                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="speakers-thumb speakers-thumb-small">
                            <img src="{{ asset('images/avatar/offer.png') }}" class="img-fluid speakers-image  spekers-s"
                                alt="" style=" width:200px; height:150px">

                            <div class="speakers-info">
                                <h6 class="speakers-title text-info ">الخطوة الثالثة</h6>

                                <p class="speakers-text pb-5">إذا سجلت كمندوب، فيمكنك تقديم عروض على توصيل الطلبيات</p>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="speakers-thumb speakers-thumb-small">
                            <img src="{{ asset('images/avatar/add_product.png') }}" style=" width:200px; height:150px"
                                class="img-fluid speakers-image  spekers-s" alt="">

                            <div class="speakers-info">
                                <h6 class="speakers-title text-info">الخطوة الرابعة</h5>

                                    <p class="speakers-text pb-5">إذا سجلت كتاجر، يمكنك إضافة منتج وعرضه في منشور ومن
                                        كطلبية
                                    </p>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>




    <section class="about section-padding p-3  bg-white" id="section_2">

        <div class="container">
            <div class="row mt-5">
                <div class="container">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8 col-12 mx-auto">
                    <form class="bg-white shadow-lg p-3 rounded-3" action="{{ route('mails.store') }}" method="POST"
                        role="form">
                        @csrf

                        <h2 class="text-info">راسلنا</h2>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 mb-2">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="الاسم"
                                    required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 mb-2">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="البريد الإلكنروني" required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 mb-2">
                                <input type="text" name="title" id="subject"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="العنوان">
                            </div>

                            <div class="col-12 mb-2">
                                <textarea class="form-control @error('name') is-invalid @enderror" rows="5" id="message" name="body"
                                    placeholder="Message"></textarea>

                            </div>
                            <div class="col-12 ">
                                <button type="submit" class="form-control btn btn-info btn-block">ارسل</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </section>



    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
