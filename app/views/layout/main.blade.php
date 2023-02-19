<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @include('layout.style')
    <title>Document</title>
</head>
<style>

</style>

<body>
    <h1 class="text-center"><a class="text-decoration-none text-dark" href="{{url('home-page')}}">ADMIN</a></h1>
    <div class="" style="width: 500px;margin-left: 10px;">
        @if(isset($_SESSION['user']))
        <span class="bg-success border border-0" style="color: white; height: 36px; display: inline-block; transform: translateY(-4px); border-radius: 6px;">
            <p style="padding: 0 10px;transform: translateY(5px);">Xin Chào {{$_SESSION['user']}}</p>
        </span>
        <a href="{{url('logout')}}"><button class="btn btn-danger">Đăng Xuất</button></a>
        @endif
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="collapse navbar-collapse" style="justify-content: center;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('categoris')}}">Categoris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('quan-li-san-pham')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('customer')}}">Customer</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">haha</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>


    <section class="content">
        @yield('content')
    </section>


    <footer>
        hihi
    </footer>
</body>

</html>