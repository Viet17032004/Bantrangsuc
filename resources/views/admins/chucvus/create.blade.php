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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
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
                            <form action="{{ route('admins.chucvus.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="ten_chuc_vu" class="form-label">Tên danh mục</label>
                                            <input type="text" id="ten_chuc_vu" name="ten_chuc_vu"
                                                class="form-control @error('ten_chuc_vu') is-invalid @enderror"
                                                value="{{ old('ten_chuc_vu') }}" placeholder="Tên Danh Mục">
                                            @error('ten_chuc_vu')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                       
                                </div>

                                    <div class="col-lg-6">

                                        
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

@endsection
