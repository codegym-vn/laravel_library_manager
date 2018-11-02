@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('css/style_bill_details.css') }}" type="text/css">
@section('title')
    Details
@endsection
@section('content')
    <style>
        .table-bordered th{
            text-align: center  ;
        }
    </style>
    @if (Session::has('success'))
        <p class="text-danger">
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
            {{ Session::get('success') }}
        </p>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 menu">
                <h2>Information</h2>
            </div>
            <div class="col-12 infomation">
                <p style="margin-top: 10px">Mã học viên: <label>{{ $bill->bill->student->student_code }}</label></p>
                <p>Tên học viên: <label>{{ $bill->bill->student->student_name }}</label></p>
                <p>Lớp: <label>{{ $bill->bill->student->class_name }}</label></p>
                <p>Email: <label>{{ $bill->bill->student->email }}</label></p>
                <p>Phone: <label>{{ $bill->bill->student->phone }}</label></p>

            </div>
            <div class="col-12 table_detals">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">ngày mượn</th>
                        <th scope="col">ngày trả</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row" class="col-2 img"><img src="{{ asset('storage/' . $bill->books->image) }}"></td>
                        <td style="text-align: center">{{ $bill->books->name }}</td>
                        <td style="text-align: center">1</td>
                        @if($bill->bill->status == 'Đang mượn' && $bill->bill->pay_day <  date('Y-m-d'))
                            <td style="text-align: center">
                                Qúa hạn
                            </td>
                        @else
                            <td style="text-align: center">
                                {{ $bill->bill->status }}
                            </td>
                        @endif
                        <td style="text-align: center">{{ $bill->bill->borrowed_day }}</td>
                        <td style="text-align: center">{{ $bill->bill->pay_day }}</td>
                    </tr>
                    </tbody>
                </table>
                <h4 style="margin-top: 30px; float: left">Trạng thái phiếu mượn:
                    <span>
                        <form method="post" action="{{ route('bill_details_update', $bill->id) }}">
                            @csrf
                            <div class="form-group" style="width: 300px">
                                    <select name="status">
                                        <option value="{{ $bill->bill->status  }}">{{ $bill->bill->status }} </option>
                                        <option value="Đã trả">Đã trả</option>
                                    </select>
                            </div>
                            <button type="submit" class="btn btn-secondary">Đồng ý</button>
                        </form>
                    </span>
                </h4>
            </div>
        </div>
    </div>
@endsection
