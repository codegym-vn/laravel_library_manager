@extends('layouts.master')
@section('title')
    Books
@endsection

@section('content')
    <div class="container bg-light" style="height: 100%">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <br>
                    <h6 class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#cityModal">Lọc</h6>
                </div>
                <div class="col-8 ">
                    <br>
                    <h1>Danh sách sách</h1>
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
                            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ Session::get('error') }}
                        </p>
                    @endif
                    @if(isset($totalBookFilter))
                        <span class="text-muted">{{'Tìm thấy' . ' ' . $totalBookFilter . ' '. 'quấn sách:'}}</span>
                    @endif

                    @if(isset($authorFilter))
                        <br>
                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                            {{ 'Do nhà văn:' . ' ' . $authorFilter->name . ' ' . 'sáng tác !' }}</span>
                    @endif
                    @if(isset($categoryFilter))
                        <br>
                        <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                            {{ 'Thuộc thể loại:' . ' ' . $categoryFilter->name }}</span>
                    @endif

                </div>
                <div class="col-12">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr class="bg-secondary">
                            <th style="text-align: center">STT</th>
                            <th style="text-align: center">Tên sách</th>
                            <th style="text-align: center">Số lương</th>
                            <th style="text-align: center">Thể loại</th>
                            <th style="text-align: center">Tác giả</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($books) == 0)
                            <tr>
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                        @else
                            @foreach($books as $key => $book)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$key }}</th>
                                    <td style="text-align: center">{{ $book->name }}</td>
                                    <td style="text-align: center">{{ $book->quantity }}</td>
                                    <td style="text-align: center">{{ $book->category->name }}</td>
                                    <td style="text-align: center">{{ $book->author->name }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('book_show', $book->id) }}" class="text-dark btn">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="{{ route('book_edit', $book->id) }}" class="btn">
                                            <i class="fas fa-feather"></i></a>
                                        <a href="{{ route('book_destroy', $book->id) }}" class="text-danger btn"
                                           onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="row">

                        <div class="col-1">
                            <button class="btn btn-primary" onclick="window.history.go(-1); return false;">Trở lại
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cityModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <form action="{{ route('book_filterBy') }}" method="get">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Lọc theo khóa học -->
                        <div class="select-by-program ">
                            <div class="form-group row">
                                <div class="col-sm-6 border-right">
                                    <div class="col-12">
                                        <label class="col-sm-12 col-form-label" style="text-align: center">Filter by
                                            author:</label>
                                    </div>
                                    <div style="text-align: center">
                                        <label class="col-12">
                                            <select class="custom-select w-100" name="author">
                                                <option value="">chon tac gia</option>
                                                @foreach($authors as $author)
                                                    @if(isset($authorFilter))
                                                        @if($author->id == $authorFilter->id)
                                                            <option value="{{$author->id}}"
                                                                    selected>{{ $author->name }}</option>
                                                        @else
                                                            <option value="{{$author->id}}">{{ $author->name }}</option>
                                                        @endif
                                                    @else
                                                        <option value="{{$author->id}}">{{ $author->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-12">
                                        <label class="col-sm-12 col-form-label" style="text-align: center">Filter by
                                            category:</label>
                                    </div>
                                    <div style="text-align: center">
                                        <label class="col-12">
                                            <select class="custom-select w-100" name="category">
                                                <option value="">chon the loai</option>
                                                @foreach($categories as $category)
                                                    @if(isset($categoryFilter))
                                                        @if($category->id == $categoryFilter->id)
                                                            <option value="{{$category->id}}"
                                                                    selected>{{ $category->name }}</option>
                                                        @else
                                                            <option
                                                                value="{{$category->id}}">{{ $category->name }}</option>
                                                        @endif
                                                    @else
                                                        <option value="{{$category->id}}">{{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                            Hủy
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
