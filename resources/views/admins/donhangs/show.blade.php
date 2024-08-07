@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')
@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý đon hàng</h4>
                </div>
            </div>

            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $title }}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>
                                        Thông tin tài khoản đặt hàng
                                    </th>
                                    <th>Thông tin người nhận hàng</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <li>Tên Tài Khoản: <b>{{$donHang->user->name}}</b></li>
                                            <li>Email Tài Khoản: <b>{{$donHang->user->email}}</b></li>
                                            <li>Số điện thoại Tài Khoản: <b>{{$donHang->user->so_dien_thoai}}</b></li>
                                            <li>Địa chỉTài Khoản: <b>{{$donHang->user->dia_chi}}</b></li>
                                            <li>Chức vụ Tài Khoản: <b>{{$donHang->user->role}}</b></li>
                                           
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Tên tài khoản nhận: <b>{{ $donHang->ten_nguoi_nhan }}</b></li>
                                                <li>Email người nhận: <b>{{ $donHang->email_nguoi_nhan }}</b></li>
                                                <li>Số điện thoại người nhận: <b>{{ $donHang->so_dien_thoai_nguoi_nhan }}</b></li>
                                                <li>Địa chỉ người nhận: <b>{{ $donHang->dia_chi_nguoi_nhan }}</b></li>
                                                <li>Ghi chú: <b>{{ $donHang->ghi_chu }}</b></li>
                                                <li>Trạng thái đơn hàng: <b>{{ $trangThaiDonHang[$donHang->trang_thai_don_hang] }}</b></li>
                                                <li>Trạng thái thanh toán: <b>{{ $trangThaiThanhToan[$donHang->trang_thai_thanh_toan] }}</b></li>
                                                <li>Tiền hàng: <b>{{ number_format($donHang->tien_hang, 0, '', '.') }} đ</b></li>
                                                <li>Tiền ship: <b>{{ number_format($donHang->tien_ship, 0, '', '.') }} đ</b></li>
                                                <li class="fs-5 text-danger">Tổng tiền: <b>{{ number_format($donHang->tong_tien, 0, '', '.') }} đ</b></li>
                                            </ul>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Sản phẩm của đơn hàng</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Dơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($donHang->chiTietDonHang as $item)
                                  @php
                                      $sanPham = $item->sanPham;
                                  @endphp
                                  <tr>
                                    <td>
                                      <img class="img-fluid"  src="{{ Storage::url($sanPham->hinh_anh)}}" alt="Sản phẩm" width="70px">
                                    </td>
                                    <td>{{$sanPham->ma_san_pham}}</td>
                                    <td>{{$sanPham->ten_san_pham}}</td>
                                    <td>{{ number_format($item->don_gia, 0, '', '.') }} VNĐ</td>
                                    <td>{{$item->so_luong}}</td>
                                    <td>{{ number_format($item->thanh_tien, 0, '', '.') }} VNĐ</td>
                                </tr>
                                  @endforeach
                                   
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
@section('js')
<script>
     function showImage(event){
        const img_danh_muc = document.getElementById('img_danh_muc');

        const file = event.target.files[0];

        const reader = new FileReader();

        reader.onload = function (){
            img_danh_muc.src = reader.result;
            img_danh_muc.style.display = 'block';


        }
        if (file){
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection