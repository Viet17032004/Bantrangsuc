@extends('layouts.client')

@section('css')
<style>
    .tab-one{
        max-width: 250px;
    }
</style>
@endsection
@section('content')
 <!-- breadcrumb area start -->
 <div class="breadcrumb-area">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <div class="breadcrumb-wrap">
                  <nav aria-label="breadcrumb">
                      <ul class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                          <li class="breadcrumb-item active" aria-current="page">{{$sanPham->ten_san_pham}}</li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- breadcrumb area end -->

<!-- page main wrapper start -->
<div class="shop-main-wrapper section-padding pb-0">
  <div class="container">
      <div class="row">
          <!-- product details wrapper start -->
          <div class="col-lg-12 order-1 order-lg-2">
              <!-- product details inner end -->
              <div class="product-details-inner">
                  <div class="row">
                      <div class="col-lg-5">
                          <div class="product-large-slider">
                              <div class="pro-large-img img-zoom">
                                  <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="product-details" />
                              </div>
                              @foreach ($sanPham->hinhAnhSanPham as $item)
                              <div class="pro-large-img img-zoom">
                                <img src="{{ Storage::url($item->hinh_anh)}}" alt="product-details" />
                            </div>
                              @endforeach
                              
                             
                          </div>
                          <div class="pro-nav slick-row-10 slick-arrow-style">
                              <div class="pro-nav-thumb">
                                <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="product-details" />
                              </div>
                              @foreach ($sanPham->hinhAnhSanPham as $item)
                              <div class="pro-nav-thumb">
                                <img src="{{ Storage::url($item->hinh_anh)}}" alt="product-details" />
                            </div>
                              @endforeach
                          </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="product-details-des">
                              <div class="manufacturer-name">
                                  <a href="product-details.html">Mã Sản Phẩm : {{$sanPham->ma_san_pham}}</a>
                              </div>
                              <h3 class="product-name">{{$sanPham->ten_san_pham}}</h3>
                              <div class="ratings d-flex">
                                  <span><i class="fa fa-star-o"></i></span>
                                  <span><i class="fa fa-star-o"></i></span>
                                  <span><i class="fa fa-star-o"></i></span>
                                  <span><i class="fa fa-star-o"></i></span>
                                  <span><i class="fa fa-star-o"></i></span>
                                  <div class="pro-review">
                                      <span>{{$sanPham->luot_xem}} Reviews</span>
                                  </div>
                              </div>
                              <div class="price-box">
                                  <span class="price-regular">{{number_format($sanPham->gia_khuyen_mai,0,'','.')}}VNĐ</span>
                                  <span class="price-old"><del>{{number_format($sanPham->gia_san_pham,0,'','.')}}VNĐ</del></span>
                              </div>
                              <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                              <div class="product-countdown" data-countdown="2022/12/20"></div>
                              <div class="availability">
                                  <i class="fa fa-check-circle"></i>
                                  <span>{{$sanPham->so_luong}} in stock</span>
                              </div>
                              <p class="pro-desc">
                               Mô tả ngắn :<br/>
                               {{$sanPham->mo_ta_ngan}}
                                </p>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1" name="quantity" id="quantityInput">
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $sanPham->id }}">
                                        </div>
                                        <div class="action_link">
                                            <button type="submit" class="btn btn-cart2">Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                              <div class="pro-size">
                                  <h6 class="option-title">size :</h6>
                                  <select class="nice-select">
                                      <option>S</option>
                                      <option>M</option>
                                      <option>L</option>
                                      <option>XL</option>
                                  </select>
                              </div>
                              <div class="color-option">
                                  <h6 class="option-title">color :</h6>
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
                              </div>
                              <div class="useful-links">
                                  <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                          class="pe-7s-refresh-2"></i>compare</a>
                                  <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                          class="pe-7s-like"></i>wishlist</a>
                              </div>
                              <div class="like-icon">
                                  <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                  <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                  <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                  <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- product details inner end -->

              <!-- product details reviews start -->
              <div class="product-details-reviews section-padding pb-0">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="product-review-info">
                              <ul class="nav review-tab">
                                  <li>
                                      <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                  </li>
                                  <li>
                                      <a data-bs-toggle="tab" href="#tab_two">information</a>
                                  </li>
                                  <li>
                                      <a data-bs-toggle="tab" href="#tab_three">reviews ({{ $sanPham->binh_luans_count }})</a>
                                  </li>
                              </ul>
                              <div class="tab-content reviews-tab">
                                  <div class="tab-pane fade show active" id="tab_one">
                                      <div class="tab-one">
                                          <p>
                                            {!!$sanPham->noi_dung!!}


                                          </p>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="tab_two">
                                      <table class="table table-bordered">
                                          <tbody>
                                              <tr>
                                                  <td>color</td>
                                                  <td>black, blue, red</td>
                                              </tr>
                                              <tr>
                                                  <td>size</td>
                                                  <td>L, M, S</td>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
                                  <div class="tab-pane fade" id="tab_three">
                                    @if (auth()->check())
                                        
                                    
                                    <form action="{{ route('home.comment', $sanPham->id) }}" class="review-form" method="POST">
                                        @csrf
                                        <h5> {{ $sanPham->binh_luans_count }} Bình Luận Của <span>Sản Phẩm {{ $sanPham->ten_san_pham }}</span></h5>
                                        @foreach($sanPham->binhLuans as $binhLuan)
                                            <h5>{{ $binhLuan->binh_luans_count }}<span>{{$binhLuan->user->name}}</span></h5>
                                            <div class="total-reviews">
                                                <div class="rev-avatar">
                                                    <img src="{{ Storage::url($binhLuan->user->anh_dai_dien) }}" alt="">
                                                </div>
                                                <div class="review-box">
                                                    <div class="ratings">
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span class="good"><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                    </div>
                                                    <div class="post-author">
                                                        <p><span></span>{{ $binhLuan->thoi_gian }}</p>
                                                    </div>
                                                    <p>{{ $binhLuan->noi_dung }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    
                                        <div class="form-group row">
                                            <div class="col">
                                                <label class="col-form-label"><span class="text-danger">*</span> Bạn nghĩ sao về sản phẩm</label>
                                                <textarea class="form-control" required placeholder="Nội dung bình luận" name="noi_dung"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="buttons">
                                            <button class="btn btn-sqr" type="submit">Đăng</button>
                                        </div>
                                    </form>
                                    
                                      @else
                                      <div class="alert alert-danger" role="alert">
                                        <strong>Đăng nhập để bình luận</strong>Bấm vào đây để đăng nhập<a href="{{route('login')}}">Đăng nhập</a>
                                  </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- product details reviews end -->
          </div>
          <!-- product details wrapper end -->
      </div>
  </div>
</div>
<!-- page main wrapper end -->

<!-- related products area start -->
<section class="related-products section-padding">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <!-- section title start -->
              <div class="section-title text-center">
                  <h2 class="title">Related Products</h2>
                  <p class="sub-title">Add related products to weekly lineup</p>
              </div>
              <!-- section title start -->
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                  <!-- product item start -->
                  @foreach ($listSanPham as $item)
                  <div class="product-item">
                    <figure class="product-thumb">
                        <a href="product-details.html">
                            <img class="pri-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
                            <img class="sec-img" src="{{ Storage::url($item->hinh_anh)}}" alt="product">
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
                        <input type="hidden" name="product_id" value="{{ $item->id}}">
                        <div class="cart-hover">
                            <button class="btn btn-cart">add to cart</button>
                        </div>
                       </form>
                    </figure>
                    <div class="product-caption text-center">
                        <div class="product-identity">
                            <p class="manufacturer-name"><a href="product-details.html">{{$item->danhMuc->ten_danh_muc}}</a></p>
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
                            <a href="product-details.html">{{$item->ten_san_pham}}</a>
                        </h6>
                        <div class="price-box">
                            <span class="price-regular">{{number_format($item->gia_khuyen_mai,0,'','.')}}VNĐ</span>
                            <span class="price-old"><del>{{number_format($item->gia_san_pham,0,'','.')}}VNĐ</del></span>
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
<!-- related products area end -->
@endsection
@section('js')
<script>
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
    $('.pro-qty').append('<span class="inc qtybtn">+</span>');
    $('.qtybtn').on('click', function () {
        var $button = $(this);
        var $input = $button.parent().find('input')
        var oldValue = parseFloat($input.val());

        if($button.hasClass('inc')){
            var newVal = oldValue + 1;
        }else{
            if(oldValue > 1){
                var newVal = oldValue - 1;
            }else{
                var newVal = 1;
            }
        }
        $input.val(newVal);
	});

    //Xử lý nếu người dùng nhập số âm 
    $('#quantityInput').on('change',function(){
var value =  parseInt($(this).val(),10);
if(isNaN(value) || value < 1){
alert('Số lượng phải lớn bàng 1.')
$(this).val(1)
}
    })
</script>
@endsection