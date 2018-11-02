<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">

    <style>
        .navbar-dark ul li {
            margin-top: 10px;
        }

        .navbar-dark ul {
            margin-top: 10px;
        }

    </style>


</head>
@yield('css')
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->

    <a class="navbar-brand col-11" href="#">
        <img src="{{ asset('image1/logo1.png') }}" alt="logo" style="width:250px;">
    </a>
    <ul class="navbar-right col-1" style="padding-top: 10px">
        <li class="dropdown " style="list-style: none">
            <a href="" class="dropdown-toggle btn" data-toggle="dropdown"
               style="color: #1b4b72; border: 1px solid #0ebeff ; background-color: white">{{ Auth::user()->name }}<b
                    class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="min-height: 900px; background-color: #7c848c">
            <div class="row">
                <hr>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="width: 100%; height: 100%">
                        <ul class="nav flex-column">
                            <li class="nav-item" style="margin-top: 20px">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        <a id="button1" class="btn bg-light" style="width: 11em">Quản lý sách</a>
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" style="width: 230px">
                                        <a class="dropdown-item" href="{{ route('books_index') }}">Danh sách sách</a>
                                        <a class="dropdown-item" href="{{ route('book_create') }}">Tạo mới sách</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-top: 20px">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        <a id="button1" class="btn bg-light" style="width: 11em">Quản lý thể loại</a>
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" style="width: 230px">
                                        <a class="dropdown-item" href="{{ route('categories_index') }}">Danh sách thể
                                            loại</a>
                                        <a class="dropdown-item" href="{{ route('category_create') }}">Tạo mới thể
                                            loại</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-top: 20px">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        <a id="button1" class="btn bg-light" style="width: 11em">Quản lý tác giả</a>
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" style="width: 230px">
                                        <a class="dropdown-item" href="{{ route('author_index') }}">Danh sách tác
                                            giả</a>
                                        <a class="dropdown-item" href="{{ route('author_create') }}">Tạo mới tác giả</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item" style="margin-top: 20px">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                        <a id="button1" class="btn bg-light" style="width: 11em">Phiếu mượn</a>
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu" style="width: 230px">
                                        <a class="dropdown-item" href="{{ route('bills_index') }}">Danh sách phiếu
                                            mượn</a>
                                        <a class="dropdown-item" href="{{ route('student_check') }}">Kiểm tra mã HV</a>
                                        <a class="dropdown-item" href="{{ route('student_list') }}">Danh sách HV mượn
                                            sách</a>
                                        <a class="dropdown-item" href="{{ route('register_book') }}">Đăng ký mượn
                                            sách</a>

                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
                <hr>

                    </div>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>
<script src="{{ asset('js/showPicture.js') }}"></script>

<script type="text/javascript">
    function pingServer() {
        $.ajax({url: location.href});
    }

    $(document).ready(function () {
        setInterval(pingServer(), 1);
    });
</script>
</body>
</html>
