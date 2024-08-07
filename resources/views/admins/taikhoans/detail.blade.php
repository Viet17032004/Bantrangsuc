@extends('layouts.admin')

@section('title')
    {{-- {{$title}} --}}
@endsection
@section('css')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 90%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    h2 {
        text-align: center;
        color: #333;
        width: 100%;
    }
    .profile-pic {
        text-align: center;
        margin-top: 20px;
    }
    .profile-pic img {
        border-radius: 10%;
        width: 150px;
        height: 150px;
    }
    .account-info {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        width: 100%;
        margin-top: 20px;
    }
    .account-info div {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 10px;
    }
    .account-info label {
        font-weight: bold;
        color: #555;
    }
    .account-info p {
        margin: 10px 0;

        color: #333;
    }
</style>

@endsection

@section('content')
{{-- <div class="content-page"> --}}
  <div class="content">
    {{-- <h1 class="text-center">{{$title}}</h1> --}}
      <!-- Start Content-->
      <body>
        <div class="container">
            <h2>Chi Tiết Tài Khoản</h2>
            <div class="profile-pic">
                <img src="{{ Storage::url($TaiKhoan->anh_dai_dien)}}" alt="" width="150px">
            </div>
            <div class="account-info">
                <div>
                    <label for="name">Tên:</label>
                    <p id="name">{{ $TaiKhoan->name }} </p>
                </div>
                <div>
                    <label for="so_dien_thoai">Số Điện Thoại:</label>
                    <p id="so_dien_thoai">{{ $TaiKhoan->so_dien_thoai }} </p>
                </div>
                <div>
                    <label for="gioi_tinh">Giới Tính:</label>
                    <p id="gioi_tinh">{{ $TaiKhoan->gioi_tinh }} </p>
                </div>
                <div>
                    <label for="dia_chi">Địa Chỉ:</label>
                    <p id="dia_chi">{{ $TaiKhoan->dia_chi }} </p>
                </div>
                <div>
                    <label for="ngay_sinh">Ngày Sinh:</label>
                    <p id="ngay_sinh">{{ $TaiKhoan->ngay_sinh }} </p>
                </div>
                <div>
                    <label for="trang_thai">Trạng Thái:</label>
                    <p id="trang_thai">{{ $TaiKhoan->trang_thai ? 'An' : 'hien' }} </p>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <p id="email">{{ $TaiKhoan->email }} </p>
                </div>
                {{-- <div>
                    <label for="chuc_vu_id">Chức Vụ:</label>
                    <p id="chuc_vu_id">{{ $TaiKhoan->chuc_vu_id }} </p>
                </div> --}}
                <div>
                    <label for="role">Vai Trò:</label>
                    <p id="role">{{ $TaiKhoan->role }} </p>
                </div>
            </div>


        </div>
        <a href="{{route('admins.taikhoans.index')}}" class="btn btn-secondary">Quay lại</a>

    </body>
            </div>
      </div>
      <!-- container-fluid -->
  </div>
  <!-- content -->

  <!-- Footer Start -->
  <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col fs-13 text-muted text-center">
                  &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a>
              </div>
          </div>
      </div>
  </footer>
  <!-- end Footer -->

</div>

@endsection
@section('js')

@endsection
