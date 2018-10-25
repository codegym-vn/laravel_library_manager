@extends('layouts.master')
@section('title')
    Student
@endsection

@section('content')
    <div class="container-fluid bg-light" style="height: 100%">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-8 ">
                    <br>
                    <h1>Danh sách học viên</h1>
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
                    @if (Session::has('error'))
                        <p class="text-danger">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('error') }}
                        </p>
                    @endif
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-secondary">
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Mã học viên</th>
                            <th style="text-align: center">Tên học viên</th>
                            <th style="text-align: center">Lớp</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Phone</th>
                            <th style="text-align: center">Tổng số phiếu mượn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($students) == 0)
                            <tr>
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                        @else
                            @foreach($students as $key => $student)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                    <td style="text-align: center">{{ $student->student_code }}</td>
                                    <td style="text-align: center">{{ $student->student_name }}</td>
                                    <td style="text-align: center">{{ $student->class_name }}</td>
                                    <td style="text-align: center">{{ $student->email }}</td>
                                    <td style="text-align: center">{{ $student->phone }}</td>
                                    <td style="text-align: center">{{ $student->quantity_bill }}</td>
                                    {{--<td>--}}
                                    {{--<a href="{{ route('bill_destroy', $student->id) }}" class="text-danger btn"--}}
                                    {{--onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i--}}
                                    {{--class="fas fa-trash-alt"></i></a>--}}
                                    {{--</td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-11">
                            {{ $students->appends(request()->query()) }}
                        </div>
                        <div class="col-1">
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
