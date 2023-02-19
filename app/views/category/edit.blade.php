@extends('layout.main')
@section('content')

<div class="container wrap-product">
    <form action="{{url('edit_CatePost/'.$valueDetail->id_loai)}}" method="POST">
        <div class="row">
            <div class="col">
                @if(isset($_SESSION['success']) && isset($_GET['msg']))
                <span style="color: red;">{{$_SESSION['success']}}</span>
                @endif
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" class="form-control" readonly placeholder="Auto Number">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <!-- @if(isset($_SESSION['errorDetail']))
                    <span style="color: red;">{{$_SESSION['errorDetail']}}</span>
                    @endif -->
                    <input type="text" class="form-control" name="ten_loai" value="{{$valueDetail->ten_loai}}">
                </div>
            </div>
        </div>
        <button type="submit" name="btn_editCate" class="btn btn-primary">Update</button>

    </form>
</div>
@endsection