@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->id }}</h1>
        <p>
            {{ $product->id }} :
            {{ $product->name }}
        </p>
    </div>
@endsection
