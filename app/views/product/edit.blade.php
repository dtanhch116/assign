@extends('layout.main')
@section('content')
<div class="container wrap-product">
    <form method="POST" action="{{url('edit_spPost/'.$valueDetailProduct->id_sp)}}" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input type="text" class="form-control" readonly placeholder="Auto Number">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tên Sản Phẩm</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['ten']}}</span>
                    @endif
                    <input type="text" class="form-control" name="ten_sp" value="{{$valueDetailProduct->ten_sp}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Đơn Giá</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['tien']}}</span>
                    @endif
                    <input type="number" class="form-control" name="don_gia" value="{{$valueDetailProduct->don_gia}}">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh Sản Phẩm</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['anh']}}</span>
                    @endif
                    <input type="hidden" name="anh_spDetail" value="{{$valueDetailProduct->anh_sp}}">
                    <input type="file" class="form-control" name="anh_sp">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ngày nhập</label>
                    @if(isset($_SESSION['errorDetail']) && isset($_GET['msg']))
                    <span style="color: red;">{{$_SESSION['errorDetail']['ngay_nhap']}}</span>
                    @endif
                    <input type="date" class="form-control" name="ngay_nhap" value="{{$valueDetailProduct->ngay_nhap}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Loại</label>
                    <select name="id_loai" class="form-control">
                        @foreach($valueDetailCategory as $value)
                        <!-- @php
                        $selected = "";
                        if($value->id_loai == $valueDetailProduct->id_loai){
                        $selected = "selected";
                        }
                        @endphp -->
                        <option value="{{$value->id_loai}}">{{$value->ten_loai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" name="btn_updateProduct" class="btn btn-primary">Cập Nhật</button>
        <!-- <input type="submit"  value="Thêm"> -->
    </form>
</div>
@endsection