@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('تأكيد البريد الإلكتروني') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('تم مراسلتكم ببريد التأكيد.') }}
                            </div>
                        @endif

                        {{ __('تأكد من البريد الإلكتروني ورابط التأكيد.') }}
                        {{ __('إذا لم يصلك البريد') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('اضغط هنا لإرسال بريد آخر') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
