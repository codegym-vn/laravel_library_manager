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
                        <form method="post" action="{{ route('category_update', $category->id) }}">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
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
