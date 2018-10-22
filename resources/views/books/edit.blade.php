@extends('layouts.master')
@section('title')
    Create Category
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h1>Edit Category</h1>
                        <hr>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ route('book_update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="description" value="{{ $book->description }}">
                        </div>
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="quantity" value="{{ $book->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Category</label>
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
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1" name="id_author">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh</label>
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
