<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<style type="text/css">
    #button1 {
        width: 12em;
    }

    #search1 {
        margin-left: 55%;
    }
</style>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image1/logo1.png') }}" alt="logo" style="width:250px;">
        </a>
        <form class="form-inline my-2 my-lg-0" id="search1"  action="#">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-2 bg-secondary" style="height: 900px">
                <hr>
                <div class="btn-group">
                    <a href="#" class="btn btn-light" style="width: 185px">Quản lý sách </a>
                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Add</a>
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <a href="#" class="btn btn-light" style="width: 185px">Quản lý tác giả </a>
                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Tablet</a>
                        <a class="dropdown-item" href="#">Smartphone</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <a href="#" class="btn btn-light" style="width: 185px">Quản lý thể loại </a>
                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Tablet</a>
                        <a class="dropdown-item" href="#">Smartphone</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group">
                    <a href="#" class="btn btn-light" style="width: 185px">Quản lý phiếu mượn </a>
                    <button class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Tablet</a>
                        <a class="dropdown-item" href="#">Smartphone</a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-10 ">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
