<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-9/assets/css/registration-9.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <!-- Font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
        rel="stylesheet"
    />
</head>
<body>
<!--- ====== nav bar ====== --->
<header class="header d-flex align-items-center fixed-top">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" placeholder="Search">
            <button type="submit" id="Search_btn"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <nav class="header-nav ms-auto pt-2">
        <ul class="d-flex align-items-center">
            <li class="nav-item pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if(session('user')->image)
                        <img src="{{ asset('images/' .session('user')->image->name) }}" alt="Profile" class="rounded-circle">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Profile" class="rounded-circle">
                    @endif

                    <span class="d-none d-md-block ps-2">{{ session('user')->username }}</span>
                </a>
            </li>
        </ul>
    </nav>
</header>
<!-- End of nav bar -->

<!--- ====== side bar ====== --->
<aside id="sideBar" class="sideBar col-md-2 col-auto min-vh-100">
    <ul class="sideBar-nav">
        <li class="nav-item ">
            <a href="" class="nav-link">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#tables-nav" aria-expanded="false">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Tables</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sideBar">
                <li>
                    <a  href="{{route('dashboard.users')}}">
                        <i class="bi bi-circle"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.contacts')}}">
                        <i class="bi bi-circle"></i><span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index')}}">
                        <i class="bi bi-circle"></i><span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.orders')}}">
                        <i class="bi bi-circle"></i><span>Orders</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a href="#" class="nav-link collapsed">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        @auth()
            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span></a>
            </li>
        @endauth

    </ul>
</aside>
<!-- End of nav bar -->

<div class="content">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/adminapp.js') }}"></script>

</body>
</html>
