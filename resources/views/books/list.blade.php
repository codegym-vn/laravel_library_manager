@extends('layouts.master')
@section('title')
    Books
@endsection

@section('content')
    <div class="container-fluid bg-light" style="height: 100%">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <br>
                    <h1>Categories Table:</h1>
                </div>
                <div class="col-8">
                    <br>
                    <div class="container-fluid">
                        <form class="form-inline my-2 my-lg-0" id="search1" action="{{ route('book_search') }}">
                            <div class="row">
                                <div class="col-9">
                                    <input class="form-control mr-sm-2" type="text" style="margin-left: 90px" name="searchBook"
                                           placeholder="Search">
                                </div>
                                <div class="col-3">
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
                            <th>Book Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>image</th>
                            <th>Id_Category</th>
                            <th>Id_Author</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($books) == 0)
                            <tr>
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                        @else
                            @foreach($books as $key => $book)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>
                                        @if($book->image)
                                            <img src="{{ asset('storage/'.$book->image) }}" alt=""
                                                 style="width: 130px; height: 150px">
                                        @else
                                            {{'Chưa có ảnh'}}
                                        @endif
                                    </td>
                                    <td>{{ $book->id_category }}</td>
                                    <td>
                                        <a href="{{ route('book_edit', $book->id) }}" class="btn"><i
                                                class="fas fa-feather"></i></a>
                                        <a href="{{ route('book_destroy', $book->id) }}" class="text-danger"
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
                            {{ $books->appends(request()->query()) }}
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
@endsection
