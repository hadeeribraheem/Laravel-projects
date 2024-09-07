<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6A9C89;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/products">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact/">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products/create">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Edit Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/welcome">Profile</a>
                </li>
               @guest
                   <li class="nav-item">
                       <a class="nav-link" href="/auth/login">Login</a>
                   </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
