@extends('layouts.view_layout')
    <style>
        @media(min-width: 768px) {
            .field-label-responsive {
                padding-top: .5rem;
                text-align: right;
            }
        }
    </style>
@section('body-content')
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('student_register') }}">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Đăng ký mượn sách</h2>
                    <hr>
                    @if (Session::has('success'))
                        <p class="text-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{ Session::get('success') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Tên</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input type="text" name="name_student" value="{{ Auth::user()->name }}" class="form-control" id="name"
                                   placeholder="Nhập tên" autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if ($errors->has('name_student'))
                                {{ $errors->first('name_student') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="class">Lớp</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input type="text" name="class" class="form-control" id="name"
                                   value="{{ Auth::user()->class }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                             @if ($errors->has('class'))
                                {{ $errors->first('class') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="phone">Số điện thoại</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input type="text" name="phone" class="form-control" id="name"
                                   value="{{ Auth::user()->phone }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                             @if ($errors->has('phone'))
                                {{ $errors->first('phone') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="email">E-Mail</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   value="{{ Auth::user()->email }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                             @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="book">Sách</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input class="form-control" type="text" id="txt_ide" list="ide"  name="name_book" >
                            <datalist id="ide">
                               @foreach($books as $book)
                                    <option>{{ $book->name }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                             @if ($errors->has('name_book'))
                                {{ $errors->first('name_book') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="day">Ngày mượn</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"></div>
                            <input type="date" value="{{ date('Y-m-d') }}" name="borrowed_day" class="form-control" id="day"
                                   autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            @if ($errors->has('borrowed_day'))
                                {{ $errors->first('borrowed_day') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection