@extends('layouts.master')
@section('title')
    Edit Auther
@endsection

@section('content')
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h1>Edit Auther</h1>
                        <hr>
                    </div>
                    <div class="col-12">
                        <form method="post" action="{{ route('auther_update', $auther->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputTitle">Authers name</label>
                                <input type="text"
                                       class="form-control"
                                       id="inputName"
                                       name="inputName"
                                       value="{{ $auther->name }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Authers DOB</label>
                                <input type="date" class="form-control"
                                       id="inputDob"
                                       name="inputDob"
                                       value="{{ $auther->dob }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="inputContent">Authers Address</label>
                                <input type="text" class="form-control"
                                          id="inputAddress"
                                          name="inputAddress"
                                          rows="3"
                                          value="{{ $auther->address }}"
                                          required>
                            </div>
                            <div class="form-group">
                                <input type="file"
                                       class="form-control-file"
                                       id="inputFile"
                                       name="inputFile"
                                       >
                            </div>
                            <button type="submit" class="btn btn-secondary">Thêm mới</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
