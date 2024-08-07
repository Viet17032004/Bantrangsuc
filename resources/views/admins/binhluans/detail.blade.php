@extends('layouts.admin')

@section('title')
    {{-- {{$title}} --}}
@endsection
@section('css')

<style>
    .comment-detail {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .comment-detail .section {
        margin-bottom: 20px;
    }
    .comment-detail h2 {
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 15px;
        color: #007bff;
    }
    .comment-detail p {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }
    .comment-detail img {
        display: block;
        margin: 10px 0;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }
</style>

@endsection

@section('content')
{{-- <div class="content-page"> --}}
    <h1>Chi tiết Bình Luận</h1>

    <div class="comment-detail">
        <div class="section">
            <h2>Thông Tin Bình Luận</h2>

            <p><strong>San Pham Binh Luan:</strong> {{ $binhLuan->sanPham->ten_san_pham }}</p>
            <p><strong>San Pham Binh Luan:</strong> {{ $binhLuan->User->name }}</p>
            <p><strong>Nội Dung:</strong> {{ $binhLuan->noi_dung }}</p>
            <p><strong>Thời Gian:</strong> {{ $binhLuan->thoi_gian }}</p>
        </div>

        
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