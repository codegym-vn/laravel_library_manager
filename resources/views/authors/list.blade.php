@extends('layouts.master')
@section('title')
    Author
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
                        <h1>Danh sách tác giả</h1>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
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
                                <th>STT</th>
                                <th>Tên tác giả</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Ảnh</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($authors) == 0)
                                <tr>
                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach($authors as $key => $author)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                        <td style="text-align: center">{{ $author->name }}</td>
                                        <td style="text-align: center">{{ $author->dob }}</td>
                                        <td style="text-align: center">{{ $author->address }}</td>
                                        <td style="text-align: center">
                                            @if($author->image)
                                                <img src="{{ asset('storage/' . $author->image) }}" alt="" style="width: 150px; height: 200px">
                                            @else
                                                {{'Chưa có ảnh'}}
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('author_edit', $author->id) }}" class="btn"><i class="fas fa-feather"></i></a>
                                            <hr>
                                            <a href="{{ route('author_destroy', $author->id) }}" class="text-danger btn"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở lại
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
