@extends('layouts.admin')

@section('title')
    {{ $title }}
@endsection
@section('css')

   <!-- Quill css -->
   <link href="{{ asset('assets/admin/libs/quill/quill.core.js')}}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý thông tin sản phẩm</h4>
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
                            <form action="{{ route('admins.taikhoans.update', $TaiKhoan->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Họ và tên</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $TaiKhoan->name) }}" placeholder="Họ và tên">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $TaiKhoan->email) }}" placeholder="Email">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mật Khẩu</label>
                                            <input type="text" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Mật Khẩu"value="{{ $TaiKhoan->password}}" >

                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                            <input type="tel" id="so_dien_thoai" name="so_dien_thoai"
                                                class="form-control @error('so_dien_thoai') is-invalid @enderror"
                                                value="{{ old('so_dien_thoai', $TaiKhoan->so_dien_thoai) }}" placeholder="Số điện thoại">
                                            @error('so_dien_thoai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="chuc_vu_id" class="form-label">Chức vụ</label>
                                            <select name="chuc_vu_id" class="form-select @error('chuc_vu_id') is-invalid @enderror">
                                                <option selected>Chọn Chức Vụ</option>
                                                @foreach ($tb_chuc_vu as $item)
                                                    <option value="{{ $item->id }}" {{ old('chuc_vu_id', $TaiKhoan->chuc_vu_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->ten_chuc_vu }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('chuc_vu_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div> --}}

                                        <div class="mb-3">
                                            <label for="ngay_sinh" class="form-label">Ngày Sinh</label>
                                            <input type="date" id="ngay_sinh" name="ngay_sinh"
                                                class="form-control @error('ngay_sinh') is-invalid @enderror"
                                                value="{{ old('ngay_sinh', $TaiKhoan->ngay_sinh) }}" placeholder="Ngày Sinh">
                                            @error('ngay_sinh')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="dia_chi" class="form-label">Địa chỉ</label>
                                            <textarea name="dia_chi" id="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" rows="3" placeholder="Địa chỉ">{{ old('dia_chi', $TaiKhoan->dia_chi) }}</textarea>
                                            @error('dia_chi')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="col-sm-10 d-flex gap-2">
                                                <label for="gioi_tinh" class="form-label">Giới Tính</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gioi_tinh"
                                                        id="gridRadios1" value="Nam" {{ old('gioi_tinh', $TaiKhoan->gioi_tinh) == 'Nam' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-success" for="gridRadios1">
                                                        Nam
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gioi_tinh"
                                                        id="gridRadios2" value="Nữ" {{ old('gioi_tinh', $TaiKhoan->gioi_tinh) == 'Nữ' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-danger" for="gridRadios2">
                                                        Nữ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="col-sm-10 d-flex gap-2">
                                                <label for="trang_thai" class="form-label">Trạng thái</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="trang_thai"
                                                        id="gridRadios1" value="1" {{ old('trang_thai', $TaiKhoan->trang_thai) == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-success" for="gridRadios1">
                                                        Hiện
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="trang_thai"
                                                        id="gridRadios2" value="0" {{ old('trang_thai', $TaiKhoan->trang_thai) == '0' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-danger" for="gridRadios2">
                                                        Ẩn
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="col-sm-10 d-flex gap-2">
                                                <label for="role" class="form-label">Chức Vụ</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="gridRadios1" value="admin" {{ old('role', $TaiKhoan->role) == 'admin' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-success" for="gridRadios1">
                                                        Admin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        id="gridRadios2" value="user" {{ old('role', $TaiKhoan->role) == 'user' ? 'checked' : '' }}>
                                                    <label class="form-check-label text-danger" for="gridRadios2">
                                                        User
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="anh_dai_dien" class="form-label">Hình Ảnh</label>
                                            <input type="file" id="anh_dai_dien" name="anh_dai_dien" class="form-control" onchange="showImage(event)">
                                            @if($TaiKhoan->anh_dai_dien)
                                                <img id="img_danh_muc" src="{{ asset('storage/'.$TaiKhoan->anh_dai_dien) }}" alt="Hình Ảnh Đại Diện" style="width: 150px;">
                                            @else
                                                <img id="img_danh_muc" src="" alt="Hình Ảnh Đại Diện" style="width: 150px; display:none;">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
@section('js')
 <!-- Quill Editor Js -->
 <script src="{{ asset('assets/admin/libs/quill/quill.core.js') }}"></script>
 <script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>
 {{-- Của phần nội dung --}}
 <script>

document.addEventListener('DOMContentLoaded', function(){
    var quill = new Quill("#quill-editor", {
        theme: "snow",
})
//Hiển thị nội dung cũ
           var old_content = `{!! old('noi_dung') !!}`;
           quill.root.innerHTML = old_content
   //Cập nhật lại textarea ẩn khi nội dung của quill-editer thay đổi
   quill.on('text-change', function(){
    var html = quill.root.innerHTML;
    document.getElementById('noi_dung_content').value = html
   })
})

            </script>

<script>
        function showImage(event) {
            const img_danh_muc = document.getElementById('img_danh_muc');

            const file = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function() {
                img_danh_muc.src = reader.result;
                img_danh_muc.style.display = 'block';


            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    {{-- Thêm album ảnh --}}
<script>
document.addEventListener('DOMContentLoaded', function(){

    var rowCount = 1;

   document.getElementById('add-row').addEventListener('click', function(){
    var tableBody = document.getElementById('image-table-body');
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
     <td class="d-flex align-item-center">
    <img id="preview_${rowCount}" src="https://static.vecteezy.com/system/resources/previews/000/420/681/original/picture-icon-vector-illustration.jpg" alt="Hình Ảnh SẢn Phẩm"
    style="width: 50px" class="me-3">
    <input type="file" id="hinh_anh" name="list_hinh_anh[id_${rowCount}]" class="form-control"
    onchange="previewImage(this,${rowCount})">



</td>
<td>
    <i
        class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor: pointer" onclick="removeRow(this)"></i>
</td>`;
tableBody.appendChild(newRow);
rowCount++;

   })



});
 function previewImage(input, rowIndex){

if(input.files && input.files[0]){
    const reader = new FileReader();

reader.onload = function(e) {
   document.getElementById(`preview_${rowIndex}`).setAttribute('src',e.target.result)


}

    reader.readAsDataURL(input.files[0]);

}

}
function removeRow (item){
    var row = item.closest('tr');
    row.remove();
}
</script>
@endsection
