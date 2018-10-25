@extends('layouts.master')
@section('title')
    Edit book
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-8">
                        <br>
                        <h1>Chỉnh sửa sách</h1>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ route('book_update', $book->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sách:</label>
                                <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt nội dung:</label>
                                <input type="text" class="form-control" name="description"
                                       value="{{ $book->description }}">
                            </div>
                            <div class="form-group">
                                <label>Số lương:</label>
                                <input type="text" class="form-control" name="quantity" value="{{ $book->quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Thể loại:</label>
                                <select class="form-control" id="sel1" name="id_category">
                                    @foreach($categories as $category)
                                        <option
                                            @if($book->id_category == $category->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Tác giả:</label>
                                <select class="form-control" id="sel1" name="id_author">
                                    @foreach($authors as $author)
                                        <option
                                            @if($book->id_category == $author->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh:</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-secondary">Sửa</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
