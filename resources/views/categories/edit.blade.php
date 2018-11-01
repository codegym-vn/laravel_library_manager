@extends('layouts.master')
@section('title')
    Create Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-8">
                        <br>
                        <h1>Chỉnh sửa thể loại</h1>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ route('category_update', $category->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>Tên thể loại:</label>
                                @if($errors->has('name'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
