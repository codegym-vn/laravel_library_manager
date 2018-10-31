@extends('layouts.view_layout')

@section('body-content')
    <section id="banner">
        <div class="container">
            <div class="row banner-content">
                <div class="col-sm-12 col-md-9 banner1">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('image1/bg01.jpg') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('image1/bg02.jpg') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('image1/bg03.jpg') }}" alt="Third slide">
                            </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
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
        </div>
    </section>
    <section id="book-content" style="margin-top: 30px">
        <div class="container">
            <div class="row book-content">
                <div class="container-fluid">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Sách mới nhất</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">sách lập trình</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <div class="row">
                                @foreach($books as $key => $book)
                                <div class="col-6 col-md-2">
                                    <div class="row  book-list_item">
                                        <div class="head_item">
                                            <img src="{{ asset('storage/' . $book->image) }}">
                                        </div>
                                        <div class="body_item">
                                            <p>{{ $book->name }}</p>
                                            <p>Số lượng: {{ $book->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <div class="row">
                                <div class="col-6 col-md-2">
                                    <div class="row  book-list_item">
                                        <div class="head_item">
                                            <img src="{{ asset('image1/book1.jpeg') }}" class="head_item">
                                        </div>
                                        <div class="body_item">
                                            <p>Kinh Doanh Như Một Cuộc Chơi</p>
                                            <p>Số lượng: </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="book-author">
        <div class="container">
            <div class="row">
                <div class="col-md-7 book-authors">
                    <div class="row">
                        <div class="col-sm-5 col-md-4 highlights-category">
                            <ul>
                                <b><li>Chủ đề</li></b>
                                @foreach($categories as $key => $category)
                                    <a class="dropdown-item" href="{{ route('student_category_book', $category->id) }}"
                                       style="color: black; font-size: 14px"><li>{{ $category->name }}</li></a>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-5 col-md-4 highlights-category">
                            <ul>
                                <b><li>Tác giả</li></b>
                                @foreach($authors as $key => $author)
                                    <a class="dropdown-item" href="{{ route('student_author_list', $author->id) }}"
                                       style="color: black; font-size: 14px"><li>{{ $author->name }}</li></a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-1">

                </div>
                <div class="col-sm-4 authors-favorite">
                    <div class="row">
                        <div class="head_author">
                            @dd($book_id_author->author->name)
                            {{--<img src="{{ asset('storage/' . $book_id_author->author->image)  }}" class="rounded-circle col-4" alt="brian-tracy">--}}
                            {{--<div class="author_intro">--}}
                               {{--<h4>{{ $book_id_author->author->name }}</h4>--}}
                                {{--<p>Quốc gia: {{ $book_id_author->author->address }}</p>--}}
                                {{--<p>--}}
                                    {{--<i class="star-item fa fa-star"></i>--}}
                                    {{--<i class="star-item fa fa-star"></i>--}}
                                    {{--<i class="star-item fa fa-star"></i>--}}
                                    {{--<i class="star-item fa fa-star"></i>--}}
                                    {{--<i class="star-item fa fa-star"></i>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="body_author">--}}
                            {{--<h4>Sách nổi bật</h4>--}}
                            {{--@foreach($book_id_author as $key => $book)--}}
                                {{--<a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">--}}
                                    {{--<img src="{{ asset('storage/' . $book->image) }}">--}}
                                {{--</a>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
