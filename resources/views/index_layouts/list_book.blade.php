@extends('layouts.view_layout')

@section('body-content')
    <div class="container">
        <div class="row content-banner">
            <div class="col-sm-12 col-md-9 banner1">
                <div class="row content-book-list">
                    <div class="col-md-12">
                        <h4>{{ $category->name }}</h4>
                        <div class="row list-book">
                            @foreach($books as $key => $book)
                                <div class="col-6 col-md-3">
                                    <div class="row border_book">
                                        <div class="head_item">
                                            <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                                <img src="{{ asset('storage/' . $book->image) }}">
                                            </a>
                                        </div>
                                        <div class="body_item">
                                            <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                                <p>{{ $book->name }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-12 col-md-3 book-news">
            @foreach($books_featured as $key => $book)
                <div class="book-news-1">
                    <div class="row">
                        <div class="img-book-news">
                            <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                <img src="{{ asset('storage/' . $book->image) }}">
                            </a>
                        </div>
                        <div class="content-book-news">
                            <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                <h6>{{ $book->name }}</h6>
                            </a>
                            <span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <br></span>
                            <b><span>Số lượng: {{ $book->quantity }}</span></b>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection