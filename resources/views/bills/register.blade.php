@extends('layouts.master')
@section('title')
    Books
@endsection

@section('content')
    <div class="container-fluid bg-light" style="height: 100%">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-8 ">
                    <br>
                    <h1>Danh sách đăng ký mượn</h1>
                </div>
                <div class="col-12">
                    <hr>
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
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr class="bg-secondary">
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Sách</th>
                            <th style="text-align: center">Học viên</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Số điện thoại</th>
                            <th style="text-align: center">Ngày mượn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($registers) == 0)
                            <tr>
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                        @else
                            @foreach($registers as $key => $register)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                    <td style="text-align: center">{{ $register->name_book }}</td>
                                    <td style="text-align: center">{{ $register->student_name }}</td>
                                    <td style="text-align: center">{{ $register->email }}</td>
                                    <td style="text-align: center">{{ $register->phone_number }}</td>
                                    <td style="text-align: center">{{ $register->borrowed_day }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-1">
                            <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
