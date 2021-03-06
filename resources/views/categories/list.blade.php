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
                    </div>
                    <div class="col-8">
                        <br>
                        <h1>Categories Table</h1>
                    </div>
                    <div class="col-12">
                        <hr>
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
                        @if (Session::has('error'))
                            <p class="text-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ Session::get('error') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr class="bg-secondary">
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Tên thể loại</th>
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
                                        <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                        <td style="text-align: center">{{ $category->id }}</td>
                                        <td style="text-align: center">{{ $category->name }}</td>
                                        <td style="text-align: center">
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
                            <div class="col-1">
                                <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở lại
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

