@extends('layouts.view_layout')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    .navbar-dark img{
        margin-top: 8px;
    }
    .navbar-dark a{
        font-size: 16px;
    }
    .form-inline{
        margin-top: 5px;
    }
    .form-inline input[type="search"]{
        width: 300px;
        height: 40px;
    }
    .form-inline button{
        height: 40px;
    }
    .d-flex input[type='email']{
        height: 40px;
    }
    .d-flex input[type='submit']{
        height: 40px;
    }
    .mt-2 a{
        font-size: 16px;
    }
    .mr-1 span{
        line-height: 30px;
    }
    .mx-1 span{
        line-height: 30px;
    }
</style>
@section('body-content')
    <div class="container">
        <div class="row first-content-details">
            <div class="col-sm-12 col-md-3 img-details">
                <img src="{{ asset('storage/' . $book->image) }}">
            </div>
            <div class="col-sm-12 col-md-8 info-details">
                <div class="row">
                    <div class="col-12 name-book">
                        <h4 style="font-size: 20px">{{ $book->name }}</h4>
                    </div>
                    <div class="col-12 name-author">
                        <p> Tác giả: <span>{{ $book->author->name }}</span></p>
                    </div>
                    <div class="col-12 name-category">
                        <p> Thể loại: <span>{{ $book->category->name }}</span></p>
                    </div>
                    <div class="col-12 quantity">
                        <p> Số lượng: <span>{{ $book->quantity }}</span></p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" style="font-size: 18px">Mô tả</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" >
            <div id="home" class="container tab-pane active"><br>
                <div class="row description_content">
                    <div class="col-1">

                    </div>
                    <div class="col-10" style="overflow: auto; height: 200px">
                        <h4>{{ $book->name }}</h4>
                        <p>{{ $book->description }}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row last-content-details">
            <div class="col-12">
                <h4 style="font-size: 24px">Sách cùng chủ đề </h4>
                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach($books as $key => $book)
                                <div class="item" style="width: 100%">
                                    <div class="border-anh">
                                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                            <img src="{{ asset('storage/' . $book->image) }}" width="100%">
                                        </a>
                                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                                            <p style="text-align: center; font-size: 14px; margin-top: 5px">{{ $book->name }}</p>
                                        </a>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary leftLst"><</button>
                    <button class="btn btn-primary rightLst">></button>
                </div>
            </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/carousel.js') }}">

    </script>
@endsection