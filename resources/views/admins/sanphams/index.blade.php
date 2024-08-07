@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection
@section('css')
   
@endsection

@section('content')
    <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
                            </div>
                        </div>

                      <div class="row">
                        <!-- Striped Rows -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" >
                                    {{-- <h5 class="card-title align-content-center mb-0"> {{$title}}</h5> --}}
                                    <a href="{{route('admins.sanphams.create')}}" class="btn btn-success"><i data-feather="plus-square"></i>
                                        Thêm Sản Phẩm
                                    </a>
                                    <form action="{{ route('admins.sanphams.index') }}" method="GET">
                                        <div class="input-group">
                                            <select name="searchTrangThai" class="form-select">
                                                <option value="" selected>Chọn trạng thái</option>
                                                <option value="1" {{ request('searchTrangThai') == '1' ? 'selected' : '' }}>Hiển thị
                                                </option>
                                                <option value="0" {{ request('searchTrangThai') == '0' ? 'selected' : '' }}>Ẩn</option>
                                            </select>
                                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                                placeholder="Tìm kiếm.....">
                                            <button ype="submit" class="btn btn-secondary">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                             @if(@session('success'))
                                                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{ session('success')}}
                                                    <button type="button" class="btn-colse" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                                 </div>
                                             @endif
                                            <thead>
                                                <tr>
                                                    <th scope="col">Mã sản phẩm</th>
                                                    <th scope="col">Hình ảnh</th>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Danh mục</th>
                                                    <th scope="col">Giá sản phẩm</th>
                                                    <th scope="col">Giá khuyễn mãi</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listSanPham as $index => $item)
                                                <tr class="">
                                                    <th scope="row">{{$item->ma_san_pham}}</th>
                                                    
                                                    <td>
                                                        <img src="{{ Storage::url($item->hinh_anh)}}" alt="" width="150px">


                                                    </td>
                                                    <td>{{$item->ten_san_pham}}</td>
                                                    <th scope="row">{{$item->danhMuc->ten_danh_muc}}</th>
                                                    <th scope="row">{{ number_format($item->gia_san_pham)}}</th>
                                                   
                                                    <th scope="row">{{empty($item->gia_khuyen_mai) ? 0 :number_format($item->gia_khuyen_mai) }}</th>
                                                    <th scope="row">{{$item->so_luong}}</th>
                                                    <td class="{{$item->is_type == true ? 'text-success' : 'text-danger' }}">{{$item->is_type == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                                    <td>
                                                        <a href="{{route('admins.sanphams.show',$item->id)}}"><i class="mdi mdi-content-save text-muted fs-18 rounded-2 border p-1 me-1"></i></a>                                                      
                                                        <a href="{{route('admins.sanphams.edit',$item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                       
                                                        <form action="{{route('admins.sanphams.destroy',$item->id)}}"
                                                             method="POST" class="d-inline" onsubmit="return confirm('Bạn có muốn xóa k')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="border-0  bg-white">
                                                                <i 
                                                                class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>

                                                            </button>
                                                            </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                    </div> <!-- container-fluid -->
                </div> <!-- content -->
                
@endsection
@section('js')
     {{-- Hiển thị phân trang  --}}
     {{
        $listSanPham->links('pagination::bootstrap-5')
    }}
@endsection
