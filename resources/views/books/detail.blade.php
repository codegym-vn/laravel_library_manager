@extends('layouts.master')

@section('title')
    Create Bill
@endsection
@section('css')
  <style type="text/css">
      .scrollbar {
          float: left;
          height: 300px;
          margin-bottom: 25px;
          overflow-y: scroll;
      }

      .force-overflow {
          min-height: 450px;
      }

      #style-1::-webkit-scrollbar {
          width: 6px;
          height: 5px;
      }
  </style>
@endsection
@section('content')
    <section>
        <div class="row">
            <div class="col-5 bg-light border-right " style="min-height: 900px; max-height: 100%">
                <div style="text-align: center ">
                    <img src="{{ asset('storage/'.$book->image) }}" alt=""
                         style="width: 615px; height: 900px">
                </div>
            </div>
            <div class="col-7 bg-info " style="max-height: 100%">
                <div class="col-12">
                    <br>
                    <h1 style="text-transform: uppercase">{{ $book->name }}</h1>
                    <h4><i class="fas fa-award"> Tác giả: {{ $book->author->name }}</i>.</h4>
                </div>
                <div class="col-12 scrollbar force-overflow" id="style-1"
                     style="overflow: auto; max-height: 400px; background-color: rgb(243, 244, 247); border-radius: 5%">
                    <big><b>Tóm tắt:</b> {{ $book->description }}</big>
                </div>
                <div style="float: left">
                    <button class="btn btn-block" onclick="window.history.go(-1); return false;">Trở lại</button>
                </div>
            </div>
        </div>
    </section>
@endsection
