@extends('layout.main')
@section('content')

<div class="container wrap-product">
    <form action="{{url('add_spPost')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" class="form-control" readonly placeholder="Auto Number">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['ten']}}</span>
                    @endif
                    <input type="text" class="form-control" name="ten_sp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['tien']}}</span>
                    @endif
                    <input type="number" class="form-control" name="don_gia">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Avatar</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['anh']}}</span>
                    @endif
                    <input type="file" class="form-control" name="anh_sp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Date</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['ngay_nhap']}}</span>
                    @endif
                    <input type="date" class="form-control" name="ngay_nhap">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category</label>
                    <select name="id_loai" class="form-control">
                        @foreach($dataLoai as $value)
                        <option value="{{$value->id_loai}}">{{$value->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name="btn_addProduct" class="btn btn-primary">Add</button>
        <!-- <input type="submit"  value="Thêm"> -->
    </form>
</div>
@endsection