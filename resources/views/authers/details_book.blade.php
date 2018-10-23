@extends('layouts.view_layout')

@section('body-content')
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div class="row first-content-details">
            <div class="col-sm-12 col-md-3 img-details">
                <img src="{{ asset('images/te3.jpg') }}" style="width: 100%">
            </div>
            <div class="col-sm-12 col-md-9 info-details">
                <div class="row">
                    <div class="col-12 name-book">
                        <h4>Tieng anh trong giao tiep </h4>
                    </div>
                    <div class="col-12 name-author">
                        <p> Tác giả: <span>Vinh</span></p>
                    </div>
                    <div class="col-12 name-category">
                        <p> Thể loại: <span>Vinh</span></p>
                    </div>
                    <div class="col-12 quantity">
                        <p> Số lượng: <span>Vinh</span></p>
                    </div>
                </div>
                <div class="col-10 button">

                    <a href="#" class="btn btn-greenlight font_secondary">
                        MƯỢN SÁCH
                    </a>

                </div>
            </div>
        </div>
        <div class="row second-content-details">
            <h4 class="col-12">Mô tả</h4>
            <div class="col-12 description">
                <p>Theo kết quả được Trưởng ban Kiểm phiếu Bùi Văn Cường công bố, đa số đại biểu có mặt đã tán thành và bỏ phiếu bầu bầu Tổng bí thư Nguyễn Phú Trọng giữ cương vị Chủ tịch nước Cộng hòa xã hội chủ nghĩa Việt Nam nhiệm kỳ 2016-2021.</p>
            </div>
        </div>
        <div class="row last-content-details">
            <h4 class="col-12">Sách cùng chủ đề </h4>
            <div class="col-sm-12 col-md-2 book">
                <div class="border-anh">
                    <img src="{{ asset('images/te4.jpg') }}">
                    <span style="margin-left: 25%"><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span><span><i class="fa fa-star"></i></span>
                    <p style="text-align: center">Kinh doanh như một cuộc chơi</p>
                </div>
            </div>
        </div>
    </div>
@endsection