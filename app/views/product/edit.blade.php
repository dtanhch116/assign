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

                    <input type="text" class="form-control" name="ten_sp" value="{{$valueDetailProduct->ten_sp}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Đơn Giá</label>

                    <input type="number" class="form-control" name="don_gia" value="{{$valueDetailProduct->don_gia}}">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Ảnh Sản Phẩm</label>

                    <input type="file" class="form-control" name="anh_sp" value="{{$valueDetailProduct->anh_sp}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Ngày nhập</label>

                    <input type="date" class="form-control" name="ngay_nhap" value="{{$valueDetailProduct->ngay_nhap}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Loại</label>


                    <select name="id_loai" class="form-control">
                        @foreach($valueDetailCategory as $value)
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