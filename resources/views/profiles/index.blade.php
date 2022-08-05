@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    {{-- @foreach ($users as $user) --}}
    {{-- <h1>{{ $user->name }}</h1> --}}
    {{-- @endforeach --}}

    {{-- @dd($user) --}}
@endsection
