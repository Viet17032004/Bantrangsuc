@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection
@section('css')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        background-color: #fff;
        width: 70%;
        margin: 20px auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        color: #333;
    }
    .profile-pic {
        text-align: center;
        margin-bottom: 20px;
    }
    .profile-pic img {
        width: 150px;
        height: 110px;
        border-radius: 10px;
    }
    .product-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .product-info div {
        display: flex;
        flex-direction: column;
    }
    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }
    p {
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin: 0;
    }
    /* .btn {
        display: block;
        width: 100px;
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .btn:hover {
        background-color: #0056b3;
    } */
</style>
@endsection

@section('content')
    <div class="content">
        <body>

            <a href="{{ route('admins.sanphams.index') }}" class="btn btn-secondary">Quay lại</a>

            <div class="container">
                <h2>Chi Tiết Sản Phẩm</h2>
                {{-- <a href="{{ route('admins.sanphams.index') }}" class="btn btn-secondary">Quay lại</a> --}}

                <div class="profile-pic">
                    <img src="{{ asset('storage/'.$sanPham->hinh_anh) }}" alt="Hình Ảnh Sản Phẩm">
                </div>
                <div class="product-info">
                    <div>
                        <label for="ma_san_pham" class="form-label">Mã sản phẩm:</label>
                        <p id="ma_san_pham">{{ $sanPham->ma_san_pham }}</p>
                    </div>
                    <div>
                        <label for="ten_san_pham" class="form-label">Tên sản phẩm:</label>
                        <p id="ten_san_pham">{{ $sanPham->ten_san_pham }}</p>
                    </div>
                    <div>
                        <label for="gia_san_pham" class="form-label">Giá sản phẩm:</label>
                        <p id="gia_san_pham">{{ $sanPham->gia_san_pham }}</p>
                    </div>
                    <div>
                        <label for="gia_khuyen_mai" class="form-label">Giá khuyến mại:</label>
                        <p id="gia_khuyen_mai">{{ $sanPham->gia_khuyen_mai }}</p>
                    </div>
                    <div>
                        <label for="mo_ta_ngan" class="form-label">Mô tả ngắn:</label>
                        <p id="mo_ta_ngan">{{ $sanPham->mo_ta_ngan }}</p>
                    </div>
                    <div>
                        <label for="noi_dung" class="form-label">Nội dung:</label>
                        <p id="noi_dung">{{ $sanPham->noi_dung }}</p>
                    </div>
                    <div>
                        <label for="so_luong" class="form-label">Số lượng:</label>
                        <p id="so_luong">{{ $sanPham->so_luong }}</p>
                    </div>
                    <div>
                        <label for="luot_xem" class="form-label">Lượt xem:</label>
                        <p id="luot_xem">{{ $sanPham->luot_xem }}</p>
                    </div>
                    <div>
                        <label for="ngay_nhap" class="form-label">Ngày nhập:</label>
                        <p id="ngay_nhap">{{ $sanPham->ngay_nhap }}</p>
                    </div>
                    <div>
                        <label for="danh_muc_id" class="form-label">Danh mục:</label>
                        <p id="danh_muc_id">
                            @foreach($listDanhMuc as $danhMuc)
                                @if($sanPham->danh_muc_id == $danhMuc->id)
                                    {{ $danhMuc->ten_danh_muc }}
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </body>





    </div> <!-- content -->

@endsection
@section('js')

@endsection