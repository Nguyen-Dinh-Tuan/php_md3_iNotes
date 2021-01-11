@extends('home')
@section('content')
    <style>
        label{
            color: black!important;
        }
    </style>
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới kiểu ghi chú </h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('notetypes.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Ten loai ghi chu</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Mo ta</label>
                        <input type="text" class="form-control" name="description"  placeholder="Enter name">
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
