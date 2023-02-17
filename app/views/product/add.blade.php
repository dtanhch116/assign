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
                    <label for="" class="form-label">Tên Sản Phẩm</label>
                    <!-- @isset($_SESSION['ten'])
                    <span style="color: red;">{{$_SESSION['ten']}}</span>
                    @endisset -->
                    <input type="text" class="form-control" name="ten_sp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Đơn Giá</label>
                    <!-- @isset($_SESSION['tien'])
                    <span style="color: red;">{{$_SESSION['tien']}}</span>
                    @endisset -->
                    <input type="number" class="form-control" name="don_gia">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh Sản Phẩm</label>
                    <!-- @isset($_SESSION['anh'])
                    <span style="color: red;">{{$_SESSION['anh']}}</span>
                    @endisset -->
                    <input type="file" class="form-control" name="anh_sp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ngày nhập</label>
                    <!-- @isset($_SESSION['ngay_nhap'])
                    <span style="color: red;">{{$_SESSION['ngay_nhap']}}</span>
                    @endisset -->
                    <input type="date" class="form-control" name="ngay_nhap">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Loại</label>
                    <select name="id_loai" class="form-control">
                        @foreach($dataLoai as $value)
                        <option value="{{$value->id_loai}}">{{$value->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name="btn_addProduct" class="btn btn-primary">Thêm</button>
        <!-- <input type="submit"  value="Thêm"> -->
    </form>
</div>
@endsection