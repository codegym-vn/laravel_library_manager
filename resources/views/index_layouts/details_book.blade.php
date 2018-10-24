@extends('layouts.view_layout')

@section('body-content')
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div class="row first-content-details">
            <div class="col-sm-12 col-md-3 img-details">
                <img src="{{ asset('storage/' . $book->image) }}" style="width: 100%">
            </div>
            <div class="col-sm-12 col-md-9 info-details">
                <div class="row">
                    <div class="col-12 name-book">
                        <h4>{{ $book->name }}</h4>
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
        <div class="row second-content-details">
            <h4 class="col-12">Mô tả</h4>
            <div class="col-12 description">
                <p>{{ $book->description }}</p>
            </div>
        </div>
        <div class="row last-content-details">
            <h4 class="col-12">Sách cùng chủ đề </h4>
            @foreach($books as $key => $book)
            <div class="col-sm-12 col-md-2 book">
                    <div class="border-anh">
                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                            <img src="{{ asset('storage/' . $book->image) }}">
                        </a>
                        <span style="margin-left: 25%"><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span>
                        <a href="{{ route('student_details_book', $book->id) }}" class="a_point_card">
                            <p style="text-align: center">{{ $book->name }}</p>
                        </a>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection