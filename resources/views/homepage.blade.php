@extends('layouts.app')

@section('content')
    <div class="mt-0">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('profilepic/1658230283-radwaProfile.jpg') }}" class="d-block w-100" style="height: 400px; object-fit:cover">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('profilepic/1658241513-ShadyProfile.png') }}" class="d-block w-100" style="height: 400px; object-fit:cover">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('profilepic/1658195093-UserProfile.png') }}" class="d-block w-100" style="height: 400px; object-fit:cover">
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



    <section class="about section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12">
                    <h2 class="my-4">
                        <u class="text-info">{{ __('قصتنا') }}</u>
                    </h2>
                </div>

                <div class="col-lg-6 col-12">
                    <h3 class="mb-3">{{ __('أهمية نقل بضاعتكم عبر الإنترنت') }}</h3>

                    <p>{{ __('الآن يمكنك أن تنقل أي شيء بأمان') }}</p>


                </div>

                <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                    <h4>
                        طلبية هو تطبيق يتيح لك توصيل طلبياتك إلى زبائنك بشكل احترافي آمن
                    </h4>

                    <div class="avatar-group border-top py-5 mt-5">
                        <img src="{{ asset('images/avatar/portrait-good-looking-brunette-young-asian-woman.jpg') }}"
                            class="img-fluid avatar-image" alt="">

                        <img src="{{ asset('images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg" class="img-fluid avatar-image avatar-image-left') }}"
                            alt="">

                        <img src="{{ asset('images/avatar/senior-man-white-sweater-eyeglasses.jpg" class="img-fluid avatar-image avatar-image-left') }}"
                            alt="">

                        <img src="{{ asset('images/avatar/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg" class="img-fluid avatar-image avatar-image-left') }}"
                            alt="">

                        {{-- <p class="d-inline">120+ People are using this web </p> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="speakers section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="speakers-text-info">
                        <h2 class="mb-4">
                            كيفية استخدام تطبيق
                            <u class="text-info">
                                طلبية
                            </u>
                        </h2>

                        <p>في (6 خطوات) يمكنك استخدامه</p>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="speakers-thumb">
                        <img src="{{ asset('images/avatar/register.png') }}" class="img-fluid speakers-image"
                            alt="">

                        <small class="speakers-featured-text">Featured</small>

                        <div class="speakers-info">

                            <h5 class="speakers-title mb-0">الخطوة الأولى</h5>

                            <p class="speakers-text mb-0">إنشاء حساب</p>

                            <ul class="social-icon">
                                <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                <li><a href="#" class="social-icon-link bi-google"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="speakers-thumb speakers-thumb-small">
                                <img src="{{ asset('images/avatar/login.png') }}"
                                    class="img-fluid speakers-image spekers-s" alt="">

                                <div class="speakers-info">
                                    <h5 class="speakers-title mb-0">الخطوة الثانية</h5>

                                    <p class="speakers-text mb-0">تسجيل دخول</p>


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="speakers-thumb speakers-thumb-small">
                                <img src="{{ asset('images/avatar/Screenshot (43).png') }}"
                                    class="img-fluid speakers-image  spekers-s" alt="">

                                <div class="speakers-info">
                                    <h5 class="speakers-title mb-0">الخطوة الثالثة</h5>

                                    <p class="speakers-text mb-0">إذا سجلت كمندوب، فيمكنك تقديم عروض على توصيل الطلبيات</p>


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="speakers-thumb speakers-thumb-small">
                                <img src="{{ asset('images/avatar/Screenshot (44).png') }}"
                                    class="img-fluid speakers-image  spekers-s" alt="">

                                <div class="speakers-info">
                                    <h5 class="speakers-title mb-0">الخطوة الرابعة</h5>

                                    <p class="speakers-text mb-0">إذا سجلت كتاجر، يمكنك إضافة منتج وعرضه في منشور ومن كطلبية
                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="speakers-thumb speakers-thumb-small">
                                <img src="{{ asset('images/avatar/Screenshot (44).png') }}"
                                    class="img-fluid speakers-image spekers-s" alt="">

                                <div class="speakers-info">
                                    <h5 class="speakers-title mb-0">الخطوة الخامسة</h5>

                                    <p class="speakers-text mb-0">ثم يمكنك تقييم المندوب كما يمكنه ذلك أيضا</p>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>




    <section class="contact section-padding" id="section_7">
        <div class="container">
            <div class="row my-5">

                <div class="col-lg-8 col-12 mx-auto">
                    <form class="bg-white shadow-lg p-3 rounded-3" action="#" method="POST" role="form">
                        @csrf

                        <h2 class="text-info">راسلنا</h2>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 mb-2">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="الاسم" required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 mb-2">
                                <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                    class="form-control" placeholder="البريد الإلكنروني" required="">
                            </div>

                            <div class="col-lg-4 col-md-4 col-12 mb-2">
                                <input type="text" name="subject" id="subject" class="form-control"
                                    placeholder="الرسالة">
                            </div>

                            <div class="col-12 mb-2">
                                <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>

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
