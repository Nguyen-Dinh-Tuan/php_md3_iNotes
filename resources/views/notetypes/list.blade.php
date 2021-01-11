@extends('home')
@section('search')

    <form class="navbar-form navbar-right" action="{{route('notetypes.search')}}">
        <input type="text" name="keyword" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
    </form>
@endsection
@section('content')
    <style>
        td{
            color: black!important;
        }
        th{
            color: black!important;
        }
    </style>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Kiểu Ghi Chú</h1>
                <a class="btn btn-primary" href="{{route('notetypes.store')}}">Thêm mới</a>

            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên loại ghi chú </th>
                    <th scope="col">Nội dung</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($notetypes) == 0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($notetypes as $key => $notetype)
                        <tr>
                            <th scope="row">{{ $key + $notetypes-> firstItem() }}</th>
                            <td>{{ $notetype->name }}</td>
                            <td>{{ $notetype->description }}</td>
                            <td><a href="{{route('notetypes.edit', $notetype->id)}}">Update</a></td>
                            <td><a href="{{route('notetypes.delete', $notetype->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <div style="font-size:15px;text-align: right!important;">
                {{$notetypes->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
@endsection
