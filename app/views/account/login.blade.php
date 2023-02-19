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

<body>
    <div class="container wrap-product">
        @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span style="color: green;">{{$_SESSION['success']}}</span>
        @endif
        <form action="{{url('loginPost')}}" method="POST">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Tài Khoản</label>
                        <input type="text" class="form-control" name="tai_khoan">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text" class="form-control" name="pass">
                    </div>
                    @if(isset($_SESSION['error']))
                    <span style="color: red;">{{$_SESSION['error']}}</span>
                    @endif
                </div>
            </div>
            <button type="submit" name="btn_Login" class="btn btn-primary">Đăng Nhập</button>
            <!-- <input type="submit"  value="Thêm"> -->
        </form>
        <span><a href="{{url('register')}}"><button class="btn btn-primary">Đăng kí</button></a></span>
    </div>
</body>

</html>