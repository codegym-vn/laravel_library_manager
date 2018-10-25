<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


</head>
<style type="text/css">
    #button1 {
        width: 12em;
    }


</style>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image1/logo1.png') }}" alt="logo" style="width:250px;">
        </a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-secondary" style="min-height: 900px; max-height: 100%; text-align: center">
                `
                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Quản lý sách</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('books_index') }}">Danh sách sách</a>
                        <a class="dropdown-item" href="{{ route('book_create') }}">Tạo mới sách</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Quản lý thể loại</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('categories_index') }}">Danh sách thể loại</a>
                        <a class="dropdown-item" href="{{ route('category_create') }}">Tạo mới thể loại</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Quản lý tác giả</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('author_index') }}">Danh sách tác giả</a>
                        <a class="dropdown-item" href="{{ route('author_create') }}">Tạo mới tác giả</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Phiếu mượn</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('bills_index') }}">Danh sách phiếu mượn</a>
                        <a class="dropdown-item" href="{{ route('student_check') }}">Kiểm tra mã HV</a>
                        <a class="dropdown-item" href="{{ route('student_list') }}">Danh sách HV mượn sách</a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-10 ">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
