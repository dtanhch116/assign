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
    <h1 class="text-center"><a class="text-decoration-none text-dark" href="{{url('home-page')}}">Quản Lý Website</a></h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lí Loại Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('quan-li-san-pham')}}">Quản lí sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lí khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">hihi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">haha</a>
                    </li>
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