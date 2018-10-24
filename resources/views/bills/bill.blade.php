@extends('layouts.master')

@section('title')
    Bill
@endsection

@section('content')
    <div class="container-fluid bg-light" style="height: 100%">
        <div class="row">
            <div class="container" >
                <div class="row ">
                    <div class="col-4 border-right alert-danger" style="min-height: 100%">
                        <div style="text-align: center">
                            <br>
                            <h1>Xác thực mã học viên:</h1>
                            <br>
                        </div>
                        <div class="container">
                            <div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Học viên:' . ' ' . $student->fullname}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Class:' . ' ' . $student->group}}
                            </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Email:' . ' ' . $student->email}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Phone' . ' ' . $student->phone}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Status:' . ' ' . $student->status . ' '. ''}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div style="text-align: center">
                            <br>
                            <h1>Phiếu mượn sách:</h1>
                            <br>
                        </div>
                        <form method="post" action="{{ route('bill_store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="sel1">Student Code:</label>
                                <input type="text" name="studentCode" class="form-control" value="{{ $studentCode }}" >
                            </div>
                            <div class="form-group">
                                <label for="sel1">Student Name:</label>
                                <input type="text" name="fullname" class="form-control" value="{{ $student->fullname }}">
                            </div>
                            <div class="form-group">
                                <label for="sel1">Class:</label>
                                <input type="text" name="group" class="form-control" value="{{ $student->group }}" >
                            </div>
                            <div class="form-group">
                                <label for="sel1">Email:</label>
                                <input type="text" name="email" class="form-control" value="{{ $student->email }}" >
                            </div>
                            <div class="form-group">
                                <label for="sel1">Phone:</label>
                                <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" >
                            </div>
                            <div class="form-group">
                                <label for="sel1">Book:</label>
                                <select class="form-control" id="sel1" name="id_book" required>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Borrowed Day:</label>
                                <input type="date" class="form-control"
                                       id="borrowed_day"
                                       name="borrowed_day"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Pay Day:</label>
                                <input type="date" class="form-control"
                                       id="pay_day"
                                       name="pay_day"
                                       required>
                            </div>
                            <button type="submit" class="btn btn-secondary">Thêm mới</button>
                            <a href="#" class="btn btn-secondary">Xem</a>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
