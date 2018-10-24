@extends('layouts.view_layout')

@section('body-content')
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div class="row content-banner">
            <div class="col-sm-12 col-md-9 banner1">
                <div class="row content-book-list">
                    <div class="col-md-12">
                        <h4>{{ $category->name }}</h4>
                        <div class="row list-book">
                            @foreach($books as $key => $book)
                                <div class="col-sm-12 col-md-2 book">
                                    <div class="border-anh">
                                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                            <img src="{{ asset('storage/' . $book->image) }}">
                                        </a>
                                        <p style="text-align: center"><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></p>
                                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                            <p style="text-align: center">{{ $book->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 book-news">
                <h5>Có thể bạn muốn đọc</h5>
                @foreach($books_featured as $key => $book)
                    <div class="book-news-1">
                        <div class="row">
                            <div class="col-3 img-book-news">
                                <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                    <img src="{{ asset('storage/' . $book->image) }}">
                                </a>
                            </div>
                            <div class="col-9 content-book-news">
                                <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                    <span>{{ $book->name }}</span>
                                </a>
                                <p><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection