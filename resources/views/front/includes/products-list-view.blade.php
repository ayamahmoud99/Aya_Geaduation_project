<div class="nov-row  col-lg-12 col-xs-12">
    <div class="nov-row-wrap row">

        <div class="nov-productlist  productlist-rows     col-xl-12 col-lg-12 col-md-12 col-xs-12 col-md-12">
            <div class="block block-product clearfix">
                <h2 class="title_block">
                    NEW ARRIVALS
                </h2>
                @isset($products)

                <div class="block_content">
                    <div id="productlist303857090" class="product_list grid owl-carousel owl-theme multi-row" data-autoplay="false" data-autoplaytimeout="6000" data-loop="false" data-margin="30" data-dots="false" data-nav="true" data-items="2" data-items_large="2" data-items_tablet="3" data-items_mobile="1">

                        @foreach($products as $product)
                        @if($loop->index%3 == 0)
                        <div class="item  text-center">
                            @endif

                            <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item" data-id-product="1" data-id-product-attribute="40" itemscope="" itemtype="http://schema.org/Product">
                                <div class="col-12 col-w40 pl-0">
                                    <div class="thumbnail-container">

                                        <a href="{{route('product.details',$product -> slug)}}" class="thumbnail product-thumbnail two-image">
                                            <img class="img-fluid image-cover" src="{{$product -> images[0] -> photo ?? ''}}" alt="" data-full-size-image-url="{{$product -> images[0] -> photo ?? ''}}">
                                            <img class="img-fluid image-secondary" src="{{$product -> images[1] -> photo ?? ''}}" alt="" data-full-size-image-url="{{$product -> images[1] -> photo ?? ''}}">
                                        </a>

                                    </div>
                                </div>
                                <div class="col-12 col-w60 no-padding">
                                    <div class="product-description">
                                        <div class="product-groups">



                                            <div class="product-title" itemprop="name"><a href="{{route('product.details',$product -> slug)}}">{{$product -> name}}</a></div>

                                            <div class="product-group-price">
                                                <div class="product-price-and-shipping">
                                                    <span itemprop="price" class="price">{{$product -> special_price ?? $product -> price }}</span>
                                                    @if($product -> special_price)
                                                    <span class="regular-price">{{$product -> price}}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="product-desc" itemprop="desciption">
                                                {!! $product -> description !!}
                                            </div>
                                        </div>
                                        <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                            <form action="" method="post" class="formAddToCart">
                                                @csrf
                                                <input type="hidden" name="id_product" value="{{$product -> id}}">
                                                <a class="add-to-cart cart-addition" data-product-id="{{$product -> id}}" data-product-slug="{{$product -> slug}}" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>Add to cart</span></a>
                                            </form>

                                            <a class="addToWishlist  wishlistProd_22" href="#" data-product-id="{{$product -> id}}">
                                                <i class="fa fa-heart"></i>
                                                <span>Add to Wishlist</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($loop->index%3 == 2)
                        </div>
                        @endif
                        @endforeach


                    </div>
                </div>

                @endisset
            </div>
        </div>
    </div>
</div>
@include('front.includes.not-logged')
@include('front.includes.alert')
@include('front.includes.alert-cart-add-success-modal')
@include('front.includes.alert-cart-add-fail-modal')
<!-- we can use only one with dynamic text -->
@include('front.includes.alert2')
@section('scripts')
<script>
    $(document).on('click', '.close', function() {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

        $('.not-loggedin-modal').css("display", "none");
        $('.alert-modal').css("display", "none");
        $('.alert-modal2').css("display", "none");
        $('.alert-cart-add-success-modal').css("display", "none");
        $('.alert-cart-add-fail-modal').css("display", "none");
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.addToWishlist', function(e) {
        e.preventDefault();

        @guest()
        $('.not-loggedin-modal').css('display', 'block');
        @endguest
        $.ajax({
            type: 'post',
            url: "{{Route('wishlist.store')}}",
            data: {
                'productId': $(this).attr('data-product-id'),
            },
            success: function(data) {
                if (data.wished)
                    $('.alert-modal').css('display', 'block');
                else
                    $('.alert-modal2').css('display', 'block');
            }
        });
    });

    $(document).on('click', '.cart-addition', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: "{{Route('site.cart.add')}}",
            data: {
                'product_id': $(this).attr('data-product-id'),
                'product_slug': $(this).attr('data-product-slug'),
            },
            success: function(data) {
                if (data.status)
                $('.alert-cart-add-success-modal').css('display', 'block');
                else
                $('.alert-cart-add-fail-modal').css('display', 'block');
            }
        });
    });
</script>

@stop
