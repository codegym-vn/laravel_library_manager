@extends('layouts.view_layout')

@section('body-content')
    <div class="container">
        <div class="row content-banner">
            <div class="col-sm-12 col-md-9 banner1">
                <div class="row content-book-list">
                    <div class="col-md-12">
                        <h4>Từ khóa bạn cần tìm: {{ $keyword }} </h4>
                            <div class="row list-book">
                                @foreach($books as $key => $book)
                                    <div class="col-6 col-md-3">
                                        <div class="row border_book">
                                            <div class="head_item">
                                                <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                                    <img src="{{ asset('storage/' . $book->image) }}">
                                                </a>
                                            </div>
                                            <div class="body__item">
                                                <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                                    <p style="text-align: center">{{ $book->name }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row list-book">
                                <div class="row list-book">
                                    @foreach($authors as $key => $author)
                                        @foreach($author->books as $key => $book )
                                            <div class="col-6 col-md-3">
                                                <div class="row border_book">
                                                    <div class="head_item">
                                                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                                            <img src="{{ asset('storage/' . $book->image) }}">
                                                        </a>
                                                    </div>
                                                    <div class="body__item">
                                                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                                            <p style="text-align: center">{{ $book->name }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @if(count($authors))
                            <p class="text-muted">
                                {{'Tìm thấy' . ' ' . count($author->books) . ' '. 'quấn sách theo tên tác giả'}}
                            </p>
                        @endif
                        @if(isset($totalBookFilter))
                            <p class="text-muted">
                                {{'Tìm thấy' . ' ' . $totalBookFilter . ' '. 'quấn sách theo tên sách'}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3" >
                <div class="row highlights-category-2" style="border-top: 3px solid #1d68a7;background-color: rgb(243, 244, 247); margin-bottom: 20px">
                    <ul style="margin-left: 5px">
                        @foreach($categories as $key => $category)
                            <b><li><a href="{{ route('student_category_book', $category->id) }}"
                                      style="color: black; font-size: 14px">{{ $category->name }}</a></li></b>
                        @endforeach
                    </ul>
                </div>
                <h4>Sách nổi bật</h4>
                <div class="row highlights-category-2" style="border-top: 3px solid #1d68a7; background-color: rgb(243, 244, 247);">
                @foreach($books_featured as $key => $book)
                    <div class="col-sm-12 book-news-1">
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
    </div>
@endsection
