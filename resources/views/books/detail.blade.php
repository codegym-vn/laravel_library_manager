@extends('layouts.master')

@section('title')
    Create Bill
@endsection

@section('content')
    <section>
        <div class="row">
            <div class="col-5 bg-light border-right " style="min-height: 900px; max-height: 100%">
                <div style="text-align: center ">
                    <img src="{{ asset('storage/'.$book->image) }}" alt=""
                         style="width: 611px; height: 850px">
                </div>
                <div style="float: right">
                    <br>
                    <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở lại</button>
                </div>
            </div>
            <div class="col-7 bg-info" style="min-height: 900px; max-height: 100%">
                <div>
                    <br>
                    <h1 style="text-transform: uppercase">{{ $book->name }}</h1>
                    <h4><i class="fas fa-award"> Tác giả: {{ $book->author->name }}</i>.</h4>
                </div>
                <div style="overflow: hidden; width: 100%; height: 100%">
                    <big><b>Tóm tắt:</b> {{ $book->description }}</big>
                </div>
            </div>
        </div>
    </section>
@endsection
