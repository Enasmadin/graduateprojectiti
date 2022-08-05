@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 offset-md-2">

                <div class="card mx-8">

                    <div class="card-body">
                        <h5 class="card-title text-center text-primary">{{ $clients->name }} </h5>
                        <p class="card-text  text-center ">
                            <span class="fw-bold">{{ __('العنوان: ') }}</span>
                            <span>{{ $clients->adress }}</span>
                        </p>

                        <p class="card-text text-center ">
                            <span class="fw-bold">{{ __('رقم المحمول: ') }}</span>
                            <span>{{ $clients->phone_number }}</span>
                        </p>

                        {{-- <p class="card-text">
                            <small class="text-muted"{{ $product->created_at->diffForHumans() }}></small>
                        </p> --}}
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto mt-2">
                        <a href="{{ route('clients.edit', $clients->id) }}" class="btn btn-warning">{{ __('تعديل ') }}</a>

                        <form action="{{ route('clients.destroy', $clients->id) }}" method="post" class="mb-3">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger col-12">{{ __('حذف') }}</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection


















<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      {{-- @dd($data) --}}
      <div class="container text-center my-5">
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
         
          <h3>name: </h3>
          <h5 class="card-title">{{ $clients['name'] }}</h5>
          <h3>address: </h3>
          <p class="card-text">{{ $clients['adress'] }}</p>
          <h3>phone: </h3>
          <p class="card-text">{{ $clients['phone_number'] }}</p>
          <a href="{{ route('clients.edit', $clients->id) }}" class="btn btn-warning">تعديل </a>
          
          <form action= "{{ route('clients.destroy', $clients->id) }}" method="post" class="mb-3">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="btn btn-danger col-12"> حذف  </button>
            
          </form>
        </div>
      </div>
    </div>
  


    </body>
</html> -->
