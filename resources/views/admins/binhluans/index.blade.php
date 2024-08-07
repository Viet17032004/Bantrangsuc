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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý bình luận sản phẩm</h4>
                </div>
            </div>

            <div class="row">
                <!-- Striped Rows -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-content-center mb-0">{{$title}}</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Người bình luận</th>
                                            <th scope="col">Sản phẩm bình luận</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Thời gian</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($binhLuans as $index => $item)
                                            <tr>
                                                <th scope="row">{{$index + 1}}</th>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->sanPham->ten_san_pham}}</td>
                                                <td>{{$item->noi_dung}}</td>
                                                <td>{{$item->thoi_gian}}</td>
                                                <td>
                                                    <a href="{{route('admins.binhluans.show',$item->id)}}"><i class="mdi mdi-content-save text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                    <form action="{{ route('admins.danhmucs.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có muốn xóa k')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-white">
                                                            <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
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
   
@endsection
