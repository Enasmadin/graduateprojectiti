@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="accordion" id="accordionExample">

                    @if ($posts->count() == 0)
                        <div class="row">
                            <div class="col">
                                <h3>{{ __('لا يوجد طلبيات') }}</h3>
                                <a class="btn btn-primary" href="{{ route('orders.store') }}">{{ __('اضف طلبية') }}</a>
                            </div>
                        </div>
                    @else
                        <div class="accordion" id="accordionExample">

                            @foreach ($posts as $post)

                                @if($post->comment->count() > 0)
                                    <div class="accordion-item">

                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#acc{{ $loop->iteration }}" aria-expanded="true"
                                                aria-controls="acc{{ $loop->iteration }}">
                                                {{ $post->title }}
                                            </button>
                                        </h2>


                                        <div id="acc{{ $loop->iteration }}" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample ">


                                            <div class="accordion-body">
                                                <div class="table-responsive table-condensed">
                                                    <table class="table table-hover table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="text-muted ">#</th>
                                                                <th scope="col"class="text-primary">الاسم</th>
                                                                <th scope="col" class="text-primary">السعر</th>
                                                                <th scope="col"class="text-primary">التفاصيل</th>
                                                                <th scope="col"class="text-primary">تاريخ التوصيل
                                                                </th>
                                                                <th scope="col"class="text-primary">الاجراء</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($post->comment as $comment)
                                                                <tr>
                                                                    <th scope="row" class="text-muted">
                                                                        {{ $loop->iteration }}
                                                                    </th>
                                                                    <td> {{ $comment->user->name }} </td>
                                                                    <td class="text-danger">
                                                                        {{ $comment->deliver_price }}</td>
                                                                    <td class="text-break">
                                                                        {{ $comment->description }}</td>
                                                                    <td>{{ $comment->delivery_date }}</td>
                                                                    @if(App\Models\Order::where('post_id', $post->id)->exists())
                                                                    <td class="text-nowrap"> هناك طلبية بالفعل لهذا المنشور </td>
                                                                    @else
                                                                    <td class="text-nowrap">
                                                                        <button type="button" class="btn btn-success"
                                                                            onclick="event.preventDefault();
                                                                    document.getElementById('accept-form').submit();  "
                                                                            value="{{ $comment->id }}"
                                                                            >{{ __('قبول') }}
                                                                        </button>
                                                                        {{-- <button type="button" class="btn btn-danger"
                                                                            onclick="event.preventDefault();
                                                                    document.getElementById('refuse-form').submit();">{{ __('رفض') }}</button> --}}
                                                                    </td>
                                                                    <form id="accept-form" action="{{ route('orders.store') }}"
                                                                        method="POST" class="d-none">
                                                                        @csrf
                                                                        <input class="d-none" type="text"
                                                                            value="{{ $comment->id }}" name="commentid">
                                                                    </form>
                                                                    <form id="refuse-form" action="{{ route('orders.index') }}"
                                                                        method="POST" class="d-none">
                                                                        @csrf
                                                                        @method('delete')
                                                                    </form>
                                                                    @endif
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p>
                                        <span class="bg-dark text-white p-1 rounded">{{ $post->title }}</span>
                                        {{ __('ليس عليه عروض') }}
                                    </p>
                                @endif
                            @endforeach
                        </div>
                </div>
            </div>
            @endif
        </div>
    @endsection
