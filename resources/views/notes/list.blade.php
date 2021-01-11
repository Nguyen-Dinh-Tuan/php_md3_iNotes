@extends('home')
@section('search')


<form class="navbar-form navbar-right" action="{{route('notes.search')}}">
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
            <div class="tables">
                <h2 class="title1">Danh Sách Ghi Chú</h2>
                <div class="panel-body widget-shadow">
                    <table class="table">
                        <tbody>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề </th>
                                <th scope="col">Nội dung </th>
                                <th scope="col">Kiểu ghi chú </th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($notes) == 0)
                                <tr>
                                    <td colspan="7" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach($notes as $key => $val)
                                    <tr>
                                        <td scope="row">{{ $key + $notes-> firstItem() }}</td>
                                        <td>{{ $val->title }}</td>
                                        <td>{{ $val->content }}</td>
                                        <td>{{ $val->notestype->name }}</td>
                                        <td>
                                            <a href="{{ route('notes.edit', $val->id) }}">Update</a> |
                                            <a href="{{ route('notes.delete', $val->id) }}" class="text-danger"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div>
                            <a class="btn btn-primary" href="{{ route('notes.create') }}">Thêm mới</a>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </div>
                        </tbody>
                    </table>
                    <div style="font-size:15px;text-align: right!important; ">
                        {{$notes->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
@endsection
