@extends('layout.main')
@section('content')
<div class="container-fluid">
    <a href="{{url('add_Cate')}}" class=""><button class="btn btn-success btn-add-product">Add</button></a>
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
    <span style="color:green; font-weight: bold;" class="text-center">{{$_SESSION['success']}}</span>
    @endif
    <span></span>
    <table border="1" class="table text-center table-product table-hover">
        <tr>
            <th scope="col">id</th>
            <th>Name</th>
            <th>Action</th>

        </tr>
        @foreach($queryAll as $value)
        <tr>
            <td>{{$value->id_loai}}</td>
            <td>{{$value->ten_loai}}</td>
            <td>
                <a href="{{url('edit_Cate/'.$value->id_loai)}}"><button class="btn btn-primary">Edit</button></a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa')" href="{{url('delete_Cate/'.$value->id_loai)}}"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection