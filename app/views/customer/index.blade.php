@extends('layout.main')
@section('content')
<div class="container-fluid">
    <a href="{{url('add_customer')}}" class=""><button class="btn btn-success btn-add-product">Add</button></a>
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
    <span style="color:green; font-weight: bold;" class="text-center">{{$_SESSION['success']}}</span>
    @endif
    <span></span>
    <table border="1" class="table text-center table-product table-hover">
        <tr>
            <th scope="col">id</th>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>address</th>
            <th>Avatar</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>Action</th>

        </tr>
        @foreach($loadAll as $value)
        <tr>
            <td>{{$value->id_kh}}</td>
            <td>{{$value->ten_kh}}</td>
            <td>{{$value->mat_khau}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->dia_chi}}</td>

            <td>
                <img src="http://localhost/web17312/assignment/app/views/images/{{$value->avatar}}" width="100" height="100" alt="avatar">
            </td>
            <td>{{$value->so_dien_thoai}}</td>
            <td>{{$value->vai_tro}}</td>
            <td>
                <a href="{{url('edit_customer/'.$value->id_kh)}}"><button class="btn btn-primary">Edit</button></a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa')" href="{{url('delete_customer/'.$value->id_kh)}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection