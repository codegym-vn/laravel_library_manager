@extends('layouts.view_layout')

@section('body-content')
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div class="row content-book-list">
            <h4>Sách theo tác giả: {{ $author->name }} </h4>
            <div class="col-md-12">
                <div class="row list-book">
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
        </div>
    </div>
@endsection