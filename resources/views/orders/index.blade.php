@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($orders->count() == 0)
            <h3>{{ __('لا يوجد طلبيات') }}</h3>
            {{-- <a class="btn btn-primary" href="{{ route('orders.create') }}">{{ __('Add Order') }}</a> --}}
        @else
            <div class="row">
                <button class="btn btn-primary col-2 h-25 me-3">{{ __('إضافة منتج') }}</button>
            </div>

            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-md-4 col-lg-3 col-lg-xs-12">
                        <div class="card mt-3 p-2 h-100">
                            <img src="{{ asset('productpic') . '/' . $order->post->product->product_pic }}"
                                class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title ">{{ $order->post->product->name }}</h5>
                                <p class="card-text m-auto">{{ $order->post->title }}</p>
                                <p class="card-text">{{ $order->post->description }}</p>
                                <a href="{{ route('orders.show', $order->id) }}"
                                    class="btn btn-primary">{{ __('تفاصيل الطلبية') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif


    @endsection
