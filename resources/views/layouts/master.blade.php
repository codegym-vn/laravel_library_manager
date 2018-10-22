<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"--}}
          {{--integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">--}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('image1/logo1.png') }}" alt="logo" style="width:250px;">
        </a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-secondary" style="min-height: 900px">
`                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Quản lý các loại sách</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('categories_index') }}">List Categories</a>
                        <a class="dropdown-item" href="{{ route('category_create') }}">Create</a>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Quản lý sách</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('books_index') }}">List Book</a>
                        <a class="dropdown-item" href="{{ route('book_create') }}">Create</a>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="btn-group">
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                        <a id="button1" class="btn bg-light">Quản lý Author</a>
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width: 235px">
                        <a class="dropdown-item" href="{{ route('author_index') }}">List Book</a>
                        <a class="dropdown-item" href="{{ route('book_create') }}">Create</a>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
</body>
</html>
