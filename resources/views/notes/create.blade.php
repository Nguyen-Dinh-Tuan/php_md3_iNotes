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
                <h1>Thêm Mới Ghi Chú </h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('notes.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="title"  placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label>Miêu tả</label>
                        <input type="text" class="form-control" name="content"  placeholder="Enter content">
                    </div>
                    <div class="form-group">
                        <label>Kiểu ghi chú</label>
                        <select class="form-control" name="type_id">
                            @foreach($notetype as $note)
                                <option value="{{ $note->id }}">{{ $note->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
