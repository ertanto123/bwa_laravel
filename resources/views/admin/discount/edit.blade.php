<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

     <!-- BOXICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/ic_logo.png') }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <title>S'watch</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/ic_logo.png') }}" alt="LOGO" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('admin.discount.index') }}">Discount</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Product</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li> --}}
          </ul>
          @auth
                 <div class="d-flex user-logged nav-item dropdown no-arrow">
                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- cara memanggil data dari auth --}}
                    Halo, {{Auth::user()->name}}!
                    @if (Auth::user()->avatar)
                    <img src="{{Auth::user()->avatar}}" class="user-photo" alt="" style="border-radius: 100%">
                    @else
                    <img src="http://ui-avatars.com/api/?name=admin" class="user-photo" alt="" style="border-radius: 100%">
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto">
                        @if (Auth::user()->is_admin)
                        {{-- <li>
                            <a href="{{route('admin.discount.index')}}" class="dropdown-item">Discount</a>
                        </li> --}}
                        @endif
                        <li>
                            <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                            <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        </li>
                    </ul>
                </a>
            </div>
            @else
           <div class="d-flex">
            <a href="{{route('login')}}" class="btn btn-master btn-secondary login me-3"> Log In </a>
            <a href="{{route('signup')}}" class="btn btn-master btn-primary signup"> Sign Up </a>
          </div>
            @endauth
        </div>
      </div>
    </nav>

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card mt-3">
                <div class="card-header ">
                    Update discount {{$discount->name}}
                </div>
                <div class="card_body m-2">
                    <form action="{{route('admin.discount.update', $discount->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$discount->id}}" >
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}"  value="{{old('name') ?: $discount->name}}" name="name" required>
                            @if ($errors -> has ('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Code</label>
                            <input type="text" class="form-control {{$errors->has('code') ? 'is-invalid' : ''}}" value="{{old('code') ?: $discount->code}}" name="code" required>
                            @if ($errors -> has ('code'))
                            <p class="text-danger">{{$errors->first('code')}}</p>
                            @endif
                        </div>
                         <div class="form-group mb-4">
                                <label for="" class="form-label">Desciption</label>
                                <textarea name="description" cols="0" rows="2" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}">{{old('description') ?: $discount->description}}</textarea>
                                @if ($errors->has('description'))
                                    <p class="text-danger">{{$errors->first('description')}}</p>
                                @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control {{$errors->has('percentage') ? 'is-invalid' : ''}}" min="1" max="100" value="{{old('percentage') ?: $discount->percentage}}" name="percentage" required>
                            @if ($errors -> has ('percentage'))
                            <p class="text-danger">{{$errors->first('percentage')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    @include('components.footer')


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js " integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj " crossorigin="anonymous "></script>
  </body>
</html>


