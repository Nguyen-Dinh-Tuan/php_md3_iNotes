@extends('home')
@section('content')
    <style>
        label{
            color: black!important;
        }
    </style>
    <div id="page-wrapper">
        <div class="main-page">
            <div class="tables">
                <h2 class="title1">Sửa Note</h2>
                <form method="post" action="{{ route('notes.update', $note->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>Tiêu đề </label>
                        <input type="text" class="form-control" name="title" placeholder="Title" required value="{{ $note->title }}">
                    </div>
                    <div class="form-group">
                        <label>Nội dung </label>
                        <input type="text" class="form-control" name="content" placeholder="Content" required value="{{ $note->content }}">
                    </div>
                    <div class="form-group">
                        <label>Kiểu ghi chú </label>
                        <select class="form-control" name="type_id">
                            @foreach($notetype as $notety)
                                <option value="{{ $notety->id }}">{{ $notety->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                </form>
            </div>
        </div>
    </div>
@endsection
