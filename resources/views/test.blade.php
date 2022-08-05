@extends('layouts.app')

@section('content')

{{-- @dd(users); --}}
{{-- profile_pic" => 
        "national_id_first_pic" => 
        "national_id_second_pic" => --}}
@foreach ($users  as $user)

    <div class="card">
        <div class="card-header">{{ $user->name }}</div>
        <div class="card-body">
            <p>{{ $user->email }}</p>
            <p>{{ $user->password }}</p>
            <img src="{{ asset('profilepic'). '/'. $user->profile_pic }}" alt="" srcset="">

            <p>{{ asset('profilepic'). '/'. $user->profile_pic }}</p>
        </div>
    </div>
    
@endforeach


@endsection