@extends('layouts.master')
@section('title')
    Create Book
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
                        <h1>Tạo mới sách</h1>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ route('book_store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sách:</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên sách" required>
                            </div>

                            <div class="form-group">
                                <label>Tóm tắt nội dung:</label>
                                <textarea class="form-control"
                                          id="description"
                                          name="description"
                                          placeholder="Tóm tắt nội dung"
                                          rows="3"
                                          required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Số lương:</label>
                                <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Thể loại:</label>
                                <select class="form-control" id="sel1" name="id_category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Tác giả:</label>
                                <select class="form-control" id="sel1" name="id_author">
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh:</label>
                                <input type="file" id="chooseimg" name="image" class="form-control-file" required>
                                <img id="image" style="width: 130px; height: 160px">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
