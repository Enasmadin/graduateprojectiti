@extends('layouts.app')

@section('content')
    {{-- // TODO --}}
    {{-- <div class="container" style="width: 600px;margin-top: 40px;margin-right: 5%; margin-bottom: 20px;"> --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('clients.create') }}" class="btn btn-outline-dark">{{ __('إضافة عميل') }}</a>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-sm-12 col-md-6 offset-md-0">
                <form class="d-flex" role="search" type="GET">
                    <div class="input-group">
                        <input class="form-control me-2" name="search" type="search" aria-label="Search">
                    </div>
                    <button class="btn btn-outline-primary" type="submit">{{ __('بحث') }}</button>
                </form>
            </div>
        </div>

    </div>


    <div class="container">
        <div class="row my-md-4 my-lg-5">
            @foreach ($clients as $client)
                <div class="col-sm-12 offset-sm-2 col-md-6 col-lg-3 offset-md-0 mb-4 my-4">

                    <div class="card border-secondary shadow-sm text-center h-100" style="max-width: 20rem;">
                        {{-- //TODO --}}
                        {{-- <div class="card-header text-white" style="background-color:#3C66AE"> --}}
                        <div class="card-header fw-bolder fs-5">
                            {{ $client->name }}
                        </div>

                        <div class="card-body text-secondary">
                            <p class="card-text text-dark">
                                <span class="fw-bold">{{ __('العنوان: ') }}</span>
                                {{ $client->adress }}
                            </p>

                            <p class="card-text text-dark">
                                <span class="fw-bold">{{ __('المحمول: ') }}</span>
                                {{ $client->phone_number }}
                            </p>

                            <div class="text-center mb-2">
                                <small class="text-muted">{{ $client->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="row flex-column">
                                <small class="text-muted">
                                    <img src="{{ asset('profilepic') . '/' . $client->user->profile_pic }}"
                                        alt="{{ $client->user->name }}" style="height:40px; width:40px; object-fit:cover;"
                                        class="rounded-circle">
                                </small>
                                <small class="fw-bold">
                                    {{ $client->user->name }}
                                </small>
                            </div>

                            <div class="mt-3">
                                {{-- // TODO --}}
                                {{-- <a class="btn text-white" style="background-color:#3C66AE;" --}}
                                <a class="btn btn-primary" href="{{ route('clients.show', $client->id) }}">
                                    {{ __('عرض') }}
                                </a>
                                {{-- // TODO --}}
                                <a href="{{ route('clients.edit', $client->id) }}"
                                    class="btn btn-outline-secondary">{{ __('تعديل') }}</a>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- @endfor --}}
            @endforeach



        </div>
    </div>
@endsection
