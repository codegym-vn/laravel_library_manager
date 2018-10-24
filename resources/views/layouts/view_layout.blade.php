
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="keywords" content="Subject Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="menu" style="margin-bottom: 20px">
        <header>
            <nav class="navbar navbar-expand-lg bg-primary">
                <a class="navbar-brand" href="{{ route('student_index') }}"><img src="{{ asset('image1/logo1.png') }}" alt="logo" style="width: 70%"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student_index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student_index') }}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student_author_list') }}">Authors</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($categories as $key => $category)
                                <a class="dropdown-item" href="{{ route('student_category_book', $category->id) }}" style="color: black; font-size: 14px">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                <form class="form-inline" action="{{ route('student_search') }}">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color: #fff">Search</button>
                </form>
            </nav>
        </header>
    </div>
    <div class="container-fluid">
        <div class="row content">
            @yield('body-content')
        </div>
        <div class="container-fluid footer1">
            <div class="inner-sec py-md-5 py-3">
                <div class="row mb-md-4 mb-md-3">
                    <div class="col-lg-3 col-md-6 social-info text-left">
                        <h3 class="tittle1 foot mb-md-5 mb-4 text-white">Get in touch</h3>
                        <p>Codegym Building </p>
                        <p class="my-2"> Hà Nội, VN</p>
                        <p class="phone">phone:  +84.979.131.592</p>
                        <p class="phone my-2">Fax:  +84.979.131.592</p>
                        <p class="phone">Mail: thao.phung@codegym.vn
                            <a href="mailto:thao.phung@codegym.vn"></a>
                        </p>

                    </div>
                    <div class="col-lg-3 col-md-6 social-info text-left">
                        <h3 class="tittle1 foot mb-md-5 mb-4 text-white">About Us</h3>
                        <p>CodeGym đào tạo lập trình viên chuyên nghiệp theo phương pháp huấn luyện thực chiến trong thời gian ngắn, thực hành liên tục và cường độ cao với mục tiêu học viên tốt nghiệp có thể đảm nhận ngay vị trí lập trình viên full-stack tại các công ty.</p>

                    </div>
                    <div class="col-lg-6 col-md-12 n-right tex-left">
                        <h3 class="tittle1 foot mb-md-5 mb-4 text-white">Subscribe our Newsletter</h3>
                        <form action="#" method="post">
                            <div class="form-group d-flex">
                                <input class="form-control" type="email" name="Email" placeholder=" Email Address" required="">
                                <input class="form-control submit text-uppercase" type="submit" value="Subscribe">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class="copy-right mt-2">© 2018 Subject. All Rights Reserved | Design by
                            <a href="http://w3layouts.com/"> The-Flash </a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <ul class="social-icons scial justify-content-end">
                            <li class="mr-1"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                            <li class="mx-1"><a href="#"><span class="fab fa-twitter"></span></a></li>
                            <li class="mx-1"><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                            <li class="mx-1"><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>




