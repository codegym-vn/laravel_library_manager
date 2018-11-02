@extends('layouts.master')

@section('title')
    Create Bill
@endsection

@section('content')
    <section style="height: 100%">
        <div class="row">
            <div class="container">
                <div class="row ">
                    <div class="col-4 border-right alert-danger" style="min-height: 100%">
                        <div style="text-align: center">
                            <br>
                            <h1>Xác thực học viên</h1>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-center"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Mã học viên:' . ' ' . $studentCode}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-center"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Học viên:' . ' ' . $student->fullname}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-center"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Class:' . ' ' . $student->group}}
                            </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-center"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Email:' . ' ' . $student->email}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-center"><i class="fa fa-check" aria-hidden="true"></i>
                                            {{'Phone' . ' ' . $student->phone}}
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    @if(isset($student))
                                        <span class="text-center"><i class="fa fa-check" aria-hidden="true"></i>
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
                            <h1>Phiếu mượn sách</h1>
                            <hr>
                        </div>
                        <form method="post" action="{{ route('bill_store',
                        [
                        "studentCode" => $studentCode,
                        "fullname" => $student->fullname,
                        "group" => $student->group,
                        "email" => $student->email,
                        "phone" => $student->phone
                        ]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="sel1">Sách:</label>
                                @if($errors->has('id_book'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('id_book') }}
                                    </p>
                                @endif
                                <input class="form-control" type="text" id="txt_ide" list="ide"  name="id_book">
                                <datalist id="ide">
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Ngày mượn:</label>
                                @if($errors->has('borrowed_day'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('borrowed_day') }}
                                    </p>
                                @endif
                                <input type="date" class="form-control"
                                       id="borrowed_day"
                                       name="borrowed_day"
                                       value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Ngày trả:</label>
                                @if($errors->has('pay_day'))
                                    <p class="text-danger" style="color: red">
                                        <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                        {{ $errors->first('pay_day') }}
                                    </p>
                                @endif
                                <input type="date" class="form-control"
                                       id="pay_day"
                                       name="pay_day"
                                       value="{{ date('Y-m-d', strtotime('7 days')) }}">
                            </div>
                            @if (Session::has('error'))
                                <p class="text-danger">
                                    <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                                    {{ Session::get('error') }}
                                </p>
                            @endif
                            <button type="submit" class="btn btn-secondary">Thêm mới</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
