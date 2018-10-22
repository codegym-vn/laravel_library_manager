@extends('layouts.master')
@section('title')
    Categories
@endsection

@section('content')
    <div class="container-fluid bg-light" style="height: 100%">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <br>
                        <h1>Categories Table:</h1>
                    </div>
                    <div class="col-8">
                        <br>
                        <div class="container-fluid">
                            <form class="form-inline my-2 my-lg-0" id="search1" action="#">
                                <div class="row">
                                    <div class="col-9.5">
                                        <input class="form-control mr-sm-2" type="text" name="searchBook"
                                               placeholder="Search">
                                    </div>
                                    <div class="col-2.5">
                                        <button class="btn btn-outline-dark my-4 my-sm-0" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('success') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="bg-secondary">
                                <th>STT</th>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($categories) == 0)
                                <tr>
                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('category_edit', $category->id) }}" class="btn"><i
                                                    class="fas fa-feather"></i></a>
                                            <a href="{{ route('category_destroy', $category->id) }}" class="text-danger"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-11">
                                {{ $categories->appends(request()->query()) }}
                            </div>
                            <div class="col-1">
                                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
