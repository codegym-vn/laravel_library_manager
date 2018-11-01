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
                    <h1>Danh sách phiếu mượn</h1>
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
                    <p>Số lượt mượn sách: <label>{{ $count }}</label></p>
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr class="bg-secondary">
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Sách</th>
                            <th style="text-align: center">Học viên</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center">Ngày mượn</th>
                            <th style="text-align: center">Ngày trả</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($bills) == 0)
                            <tr>
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                        @else
                            @foreach($bills as $key => $bill)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                    <td style="text-align: center">{{ $bill->book->name }}</td>
                                    <td style="text-align: center">{{ $bill->student->student_name }}</td>
                                    <td style="text-align: center">{{ $bill->status }}</td>
                                    <td style="text-align: center">{{ $bill->borrowed_day }}</td>
                                    <td style="text-align: center">{{ $bill->pay_day }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('bill_details', $bill->id) }}" class="text-dark btn">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="{{ route('bill_destroy', $bill->id) }}" class="text-danger btn"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
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
