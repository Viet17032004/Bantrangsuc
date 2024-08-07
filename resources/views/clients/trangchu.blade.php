@extends('layouts.clients')
@section('css')
@endsection
@section('content')
   <!-- product area start -->
   <section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">our products</h2>
                    <p class="sub-title">Add our products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        
                        <ul class="nav justify-content-center">
                            {{-- <li><a href="#tab1" class="active" data-bs-toggle="tab">Entertainment</a></li> --}}
                            @foreach($categories as $category)
                            <li><a href="#tab1" data-bs-toggle="tab" data-category-id="{{ $category->id }}">{{ $category->ten_danh_muc }}</a></li>
                            @endforeach
                            {{-- <li><a href="#tab" data-bs-toggle="tab">Lying</a></li> --}}
                            {{-- <li><a href="#tab4" data-bs-toggle="tab">Tables</a></li> --}}
                        </ul>
                    </div>
                    <!-- product tab menu end -->
                    <!-- product tab content start -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                <!-- product item start -->
                                @foreach($products as $sanPham)
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="{{ route('products.detail', $sanPham->id) }}">
                                            <img class="pri-img" src="{{ asset('storage/'.$sanPham->hinh_anh) }}" alt="product">
                                            <img class="sec-img" src="{{ asset('storage/'.$sanPham->hinh_anh) }}" alt="product">
                                        </a>
                                        <div class="product-badge">
                                            <div class="product-label new">
                                                <span>new</span>
                                            </div>
                                            <div class="product-label discount">
                                                <span>10%</span>
                                            </div>
                                        </div>
                                        <div class="button-group">
                                            <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                            <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                        </div>
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="{{ $sanPham->id}}">
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                           </form>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <div class="product-identity">
                                            <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                                        </div>
                                        <ul class="color-categories">
                                            <li>
                                                <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                            </li>
                                            <li>
                                                <a class="c-darktan" href="#" title="Darktan"></a>
                                            </li>
                                            <li>
                                                <a class="c-grey" href="#" title="Grey"></a>
                                            </li>
                                            <li>
                                                <a class="c-brown" href="#" title="Brown"></a>
                                            </li>
                                        </ul>
                                        <h6 class="product-name">
                                            <a href="product-details.html">{{ $sanPham->ten_san_pham }}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">{{ number_format($sanPham->gia_khuyen_mai) }}</span>
                                            <span class="price-old"><del>{{ number_format($sanPham->gia_san_pham) }}</del></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- product item end -->
                            </div>
                        </div>
                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product area end -->
 <!-- featured product area start -->
 <section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Sản Phẩm Mới Nhất</h2>
                    <p class="sub-title">Giảm giá 10% toàn bộ sản phẩm</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    <!-- product item start -->
                    @foreach($sanPhamMoi as $sanPham)
                    <div class="product-item">
                        <figure class="product-thumb">
                            <a href="product-details.html">
                                <img class="pri-img" src="{{ asset('storage/'.$sanPham->hinh_anh) }}" alt="product">
                                <img class="sec-img" src="{{ asset('storage/'.$sanPham->hinh_anh) }}" alt="product">
                            </a>
                            <div class="product-badge">
                                <div class="product-label new">
                                    <span>new</span>
                                </div>
                                <div class="product-label discount">
                                    <span>10%</span>
                                </div>
                            </div>
                            <div class="button-group">
                                <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                            </div>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $sanPham->id}}">
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                               </form>
                        </figure>
                        <div class="product-caption text-center">
                            <div class="product-identity">
                                <p class="manufacturer-name"><a href="product-details.html">Gold</a></p>
                            </div>
                            <ul class="color-categories">
                                <li>
                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                </li>
                                <li>
                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                </li>
                                <li>
                                    <a class="c-grey" href="#" title="Grey"></a>
                                </li>
                                <li>
                                    <a class="c-brown" href="#" title="Brown"></a>
                                </li>
                            </ul>
                            <h6 class="product-name">
                                <a href="product-details.html">{{ $sanPham->ten_san_pham }}</a>
                            </h6>
                            <div class="price-box">
                                <span class="price-regular">{{ number_format($sanPham->gia_san_pham) }} VNĐ</span>
                                <span class="price-old"><del>{{ number_format($sanPham->gia_khuyen_mai) }} VNĐ</del></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- product item end -->
                </div>
            </div>
        </div>
    </div>
 </section>
<!-- featured product area end -->
@endsection
@section('js')
<script>
    $(document).ready(function() {
    $('.product-tab-menu a').on('click', function(e) {
        e.preventDefault();
        var categoryId = $(this).data('category-id');
        loadProducts(categoryId);
    });

    // Load sản phẩm của danh mục đầu tiên khi trang được load
    var firstCategoryId = $('.product-tab-menu a:first').data('category-id');
    loadProducts(firstCategoryId);
});

function loadProducts(categoryId) {
    $.ajax({
        url: '/get-products-by-category/' + categoryId,
        method: 'GET',
        success: function(response) {
            $('#tab1 .product-carousel-4').html(response);
            // Khởi tạo lại carousel nếu cần
        }
    });
}
</script>
@endsection