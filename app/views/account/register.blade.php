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
        <form action="{{url('registerPost')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @if(isset($_SESSION['errors']))
                <span style="color: red;font-weight: bold;">{{$_SESSION['errors']}}</span>
                @endif
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">ID</label>
                        <input type="text" class="form-control" readonly placeholder="Auto Number">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        @if(isset($_SESSION['errorCtm']))
                        <span style="color: red;">{{$_SESSION['errorCtm']['ten']}}</span>
                        @endif
                        <input type="text" class="form-control" name="ten_kh">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        @if(isset($_SESSION['errorCtm']))
                        <span style="color: red;">{{$_SESSION['errorCtm']['pass']}}</span>
                        @endif
                        <input type="text" class="form-control" name="mat_khau">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        @if(isset($_SESSION['errorCtm']))
                        <span style="color: red;">{{$_SESSION['errorCtm']['email']}}</span>
                        @endif
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Address</label>
                        @if(isset($_SESSION['errorCtm']))
                        <span style="color: red;">{{$_SESSION['errorCtm']['dia_chi']}}</span>
                        @endif
                        <input type="text" class="form-control" name="dia_chi">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Avatar</label>
                        @if(isset($_SESSION['errorCtm']))
                        <span style="color: red;">{{$_SESSION['errorCtm']['anh']}}</span>
                        @endif
                        <input type="file" class="form-control" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone number</label>
                        @if(isset($_SESSION['errorCtm']))
                        <span style="color: red;">{{$_SESSION['errorCtm']['phone']}}</span>
                        @endif
                        <input type="text" class="form-control" name="so_dien_thoai">
                    </div>
                    <!-- <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    @if(isset($_SESSION['errorCtm']))
                    <span style="color: red;">{{$_SESSION['errorCtm']['vai_tro']}}</span>
                    @endif
                    <input type="text" class="form-control" name="vai_tro">

                </div> -->
                </div>
            </div>
            <button type="submit" name="btn_register" class="btn btn-primary">Đăng Kí</button>
            <!-- <input type="submit"  value="Thêm"> -->
        </form>
        <span><a href="{{url('login')}}"><button class="btn btn-primary">Quay lại</button></a></span>

    </div>
</body>

</html>