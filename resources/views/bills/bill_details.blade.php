@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('css/style_bill_details.css') }}" type="text/css">
@section('title')
    Details
@endsection
@section('content')
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
                        <th scope="col">ngày mượn</th>
                        <th scope="col">ngày trả</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row" class="col-2 img"><img src="{{ asset('storage/' . $bill->books->image) }}"></th>
                        <td>{{ $bill->books->name }}</td>
                        <td>1</td>
                        <td>{{ $bill->bill->borrowed_day }}</td>
                        <td>{{ $bill->bill->pay_day }}</td>
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
                                        <option value="Đang mượn">Đang mượn</option>
                                        <option value="Đã trả">Đã trả</option>
                                        <option value="Quá hạn">Quá hạn</option>
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
