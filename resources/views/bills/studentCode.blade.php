@extends('layouts.master')

@section('title')
    Authentication
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-8 ">
                        <br>
                        <h1>Xác thực mã sinh viên</h1>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
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
                        <form method="get" action="{{ route('authentication') }}">
                            <div class="form-group">
                                <label>Student Code:</label>
                                <input type="text" class="form-control" name="student_code" value="" required>
                            </div>
                            <button type="submit" class="btn btn-secondary">Xác thực</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
