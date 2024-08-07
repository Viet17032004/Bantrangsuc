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
                                <h4 class="fs-18 fw-semibold m-0">Quản lý thông tin chức vụ</h4>
                            </div>
                        </div>

                      <div class="row">
                        <!-- Striped Rows -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" >
                                    <h5 class="card-title align-content-center mb-0"> {{$title}}</h5>
                                    <a href="{{route('admins.chucvus.create')}}" class="btn btn-success"><i data-feather="plus-square"></i>
                                        Thêm chức vụ
                                    </a>
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
                                                    <th scope="col">#</th>
                                                    <th scope="col">Tên Chức vụ</th>
                                                    <th scope="col">Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listChucVu as $index => $item)
                                                <tr>
                                                    <th scope="row">{{$index + 1}}</th>
                                                    
                                                    <td>{{$item->ten_chuc_vu}}</td>
                                                    <td>                                                       
                                                        <a href="{{route('admins.chucvus.edit',$item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                                       
                                                        <form action="{{route('admins.chucvus.destroy',$item->id)}}"
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
   
@endsection
