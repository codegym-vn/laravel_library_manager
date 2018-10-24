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
                    <h1>Student Table:</h1>
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
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-secondary">
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">id_book</th>
                            <th style="text-align: center">id_student</th>
                            <th style="text-align: center">status</th>
                            <th style="text-align: center">email</th>
                            <th style="text-align: center">phone</th>
                            <th style="text-align: center">Book</th>
                            <th style="text-align: center">Borrowed Day</th>
                            <th style="text-align: center">Pay Day</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if(count($bills) == 0)--}}
                            {{--<tr>--}}
                                {{--<td colspan="4">Không có dữ liệu</td>--}}
                            {{--</tr>--}}
                        {{--@else--}}
                            {{--@foreach($bills as $key => $bill)--}}
                                {{--<tr>--}}
                                    {{--<th scope="row" style="text-align: center">{{ ++$key }}</th>--}}
                                    {{--<td style="text-align: center">{{ $bill->id_book }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->id_student }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->status }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->email }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->phone }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->book->name }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->borrowed_day }}</td>--}}
                                    {{--<td style="text-align: center">{{ $bill->pay_day }}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href="{{ route('bill_destroy', $bill->id) }}" class="text-danger btn"--}}
                                           {{--onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i--}}
                                                {{--class="fas fa-trash-alt"></i></a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-11">
                            {{ $bills->appends(request()->query()) }}
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
