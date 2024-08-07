<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 08:33:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

        <meta charset="utf-8" />
        <title>Dashboard | Tapeli - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">


            @include('admins.blocks.header')

            @include('admins.blocks.sidebar')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
              <div class="content">

                <!-- Start Content-->
                <div class="container-xxl">

                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                        </div>
                    </div>

                    <!-- start row -->
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="row g-3">

                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1">Số đơn hàng</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-2">
                                                <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ $tongDonHang }}</div>
                                                <div class="me-auto">
                                                    <span class="text-primary d-inline-flex align-items-center">
                                                        
                                                        <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="website-visitors" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1">Tổng doang thu</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-2">
                                                <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{ number_format($tongDoangThu, 0, '', '.') }} VNĐ</div>
                                                <div class="me-auto">
                                                    <span class="text-danger d-inline-flex align-items-center">
                                                        
                                                        <i data-feather="trending-down" class="ms-1" style="height: 22px; width: 22px;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="conversion-visitors" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1">Tổng số đon hàng đã giao</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-2">
                                                <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{$pendingOrders}}</div>
                                                <div class="me-auto">
                                                    <span class="text-success d-inline-flex align-items-center">
                                                        
                                                        <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="session-visitors" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-14 mb-1">Tổng số sản phẩm</div>
                                            </div>

                                            <div class="d-flex align-items-baseline mb-2">
                                                <div class="fs-22 mb-0 me-2 fw-semibold text-black">{{$totalProducts}}</div>
                                                <div class="me-auto">
                                                    <span class="text-success d-inline-flex align-items-center">
                                                    
                                                        <i data-feather="trending-up" class="ms-1" style="height: 22px; width: 22px;"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="active-users" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end sales -->
                    </div> <!-- end row -->

                    <!-- Start Monthly Sales -->
                    <div class="row">
                       

                        <div class="col-md-6 col-xl-12">
                            <div class="card overflow-hidden">

                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                            <i data-feather="tablet" class="widgets-icons"></i>
                                        </div>
                                        <h5 class="card-title mb-0">Sản phẩm bán chạy nhất</h5>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-traffic mb-0">
                                            <tbody>
                                                <thead>
                                                    <tr>
                                                        <th>Sản phẩm</th>
                                                        <th colspan="2">Số lượt bán</th>
                                                    </tr>
                                                </thead>
                                                @foreach($topSellingProducts as $product)
                                                <tr>
                                                    <td>{{ $product->ten_san_pham }}</td>
                                                    <td>{{ $product->order_items_sum_so_luong }}</td>
                                                    <td class="w-50">
                                                        <div class="progress progress-md mt-0">
                                                            <div class="progress-bar bg-danger" style="width: {{ $product->order_items_sum_so_luong }}0.0%"></div>
                                                        </div>
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
                    <!-- End Monthly Sales -->

                   

                </div> <!-- container-fluid -->
            </div> <!-- content -->

                @include('admins.blocks.footer')

                
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('assets/admin/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js')}}"></script>

        <!-- Apexcharts JS -->
        <script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- for basic area chart -->
        <script src="{{ asset('assets/admin/apexcharts.com/samples/assets/stock-prices.js')}}"></script>

        <!-- Widgets Init Js -->
        <script src="{{ asset('assets/admin/js/pages/analytics-dashboard.init.js')}}"></script>

        <!-- App js-->
        <script src="{{ asset('assets/admin/js/app.js')}}"></script>
        
     
    </body>

<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 08:34:03 GMT -->
</html>