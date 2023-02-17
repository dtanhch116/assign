@extends('layout.main')
@section('content')
<div class="container-fluid">
    <a href="{{url('add_sp')}}" class=""><button class="btn btn-success btn-add-product">Add</button></a>
    <table border="1" class="table text-center table-product">
        <tr>
            <th scope="col">id</th>
            <th>Tên Sản Phẩm</th>
            <th>Đơn giá</th>
            <th>Ảnh</th>
            <th>Ngày Nhập</th>
            <th>id Loại</th>
            <th>Hành Động</th>

        </tr>
        @foreach($product as $value)
        <tr>
            <td>{{$value->id_sp}}</td>
            <td>{{$value->ten_sp}}</td>
            <td>{{$value->don_gia}}</td>
            <td>
                <img src="http://localhost/web17312/assignment/app/views/images/{{$value->anh_sp}}" width="100" height="100" alt="avatar">
            </td>
            <td>{{$value->ngay_nhap}}</td>
            <td>{{$value->id_loai}}</td>
            <td>
                <a href="{{url('edit_sp/'.$value->id_sp)}}"><button class="btn btn-primary">Edit</button></a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa')" href="{{url('delete_sp/'.$value->id_sp)}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection