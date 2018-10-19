@extends('layouts.master')
@section('title')
    Categories
@endsection

@section('content')
    <div class="container-fluid bg-light" style="height: 100%">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h1>Auther Table:</h1>
                        <hr>
                    </div>
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
                                <th>STT</th>
                                <th>Auther Name</th>
                                <th>Auther DOB</th>
                                <th>Auther Address</th>
                                <th>Auther Image</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($authers) == 0)
                                <tr>
                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            @else
                                @foreach($authers as $key => $auther)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                        <td style="text-align: center">{{ $auther->name }}</td>
                                        <td style="text-align: center">{{ $auther->dob }}</td>
                                        <td style="text-align: center">{{ $auther->address }}</td>
                                        <td style="text-align: center">
                                            @if($auther->image)
                                            <img src="{{ asset('storage/' . $auther->image) }}" alt="" style="width: 200px;">
                                            @else
                                                {{'Chưa có ảnh'}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auther_edit', $auther->id) }}" class="btn"><i class="fas fa-feather"></i></a>
                                            <a href="{{ route('auther_destroy', $auther->id) }}" class="text-danger"
                                               onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{ $authers->links() }}
                        {{--<a class="btn btn-secondary" href="{{ route('category_create') }}">Thêm mới</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
