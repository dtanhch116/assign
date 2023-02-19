@extends('layout.main')
@section('content')

<div class="container wrap-product">
    <form action="{{url('add_customerPost')}}" method="POST" enctype="multipart/form-data">
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
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    @if(isset($_SESSION['errorCtm']))
                    <span style="color: red;">{{$_SESSION['errorCtm']['vai_tro']}}</span>
                    @endif
                    <input type="text" class="form-control" name="vai_tro">

                </div>
            </div>
        </div>
        <button type="submit" name="btn_addCustomer" class="btn btn-primary">Add</button>
        <!-- <input type="submit"  value="Thêm"> -->
    </form>
</div>
@endsection