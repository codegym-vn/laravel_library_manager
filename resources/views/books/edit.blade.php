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
                                @if($errors->has('name'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                                <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt nội dung:</label>
                                @if($errors->has('description'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                                <textarea type="text" class="form-control" name="description" rows="3"
                                          value="">{{ $book->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Số lương:</label>
                                @if($errors->has('quantity'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('quantity') }}
                                    </p>
                                @endif
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
                                <input type="file" id="chooseimg" name="image" class="form-control-file">
                                    <img src="{{ asset('storage/'.$book->image) }}" id="image" style="width: 130px; height: 160px">
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
