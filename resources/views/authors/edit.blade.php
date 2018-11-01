@extends('layouts.master')
@section('title')
    Edit Auther
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
                        <h1>Chỉnh sửa tác giả</h1>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ route('author_update', $author->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputTitle">Tên tác giả</label>
                                @if($errors->has('name'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                                <input type="text"
                                       class="form-control"
                                       id="inputName"
                                       name="inputName"
                                       value="{{ $author->name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Ngày sinh</label>
                                @if($errors->has('dob'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('dob') }}
                                    </p>
                                @endif
                                <input type="date" class="form-control"
                                       id="inputDob"
                                       name="inputDob"
                                       value="{{ $author->dob }}">
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Địa chỉ</label>
                                @if($errors->has('address'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('address') }}
                                    </p>
                                @endif
                                <input type="text" class="form-control"
                                       id="inputAddress"
                                       name="inputAddress"
                                       rows="3"
                                       value="{{ $author->address }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Ảnh:</label>
                                <input type="file" id="chooseimg" name="image" class="form-control-file">
                                <img src="{{ asset('storage/'.$author->image) }}" id="image" style="width: 130px; height: 160px">
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
