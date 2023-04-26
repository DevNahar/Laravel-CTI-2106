@extends('frontend.master')
@section('content')
    <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Product Details</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- product_details - start
            ================================================== -->
            <section class="product_details section_space pb-0">
                <div class="container">
                    <div class="product_data">
                        <div class="row">
                            <div class="col col-lg-6">
                                <div class="product_details_image">
                                    <div class="details_image_carousel">

                                        @foreach ($thumbnails as $thumbnail)
                                            <div class="slider_item">
                                                <img src="{{ asset('uploads/products/thumbnails/'.$thumbnail->thumbnail) }}" alt="image_not_found">
                                            </div>
                                        @endforeach


                                    </div>

                                    <div class="details_image_carousel_nav">
                                        @foreach ($thumbnails as $thumbnail)
                                            <div class="slider_item">
                                                <img src="{{ asset('uploads/products/thumbnails/'.$thumbnail->thumbnail) }}" alt="image_not_found">
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="product_details_content">
                                    <h2 class="item_title">{{ $productSluginfo->first()->product_name }}</h2>
                                    <p>{{ $productSluginfo->first()->short_desp }}</p>
                                    <div class="item_review">
                                        <ul class="rating_star ul_li">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                        <span class="review_value">3 Rating(s)</span>
                                    </div>

                                    <div class="item_price">
                                        <span>TK <span id="price">{{ $productSluginfo->first()->after_discount }}</span></span>
                                        @if($productSluginfo->first()->discount)
                                        <del>TK {{ $productSluginfo->first()->product_price }}</del>
                                        @else
                                        @endif

                                    </div>
                                    <hr>

                                    <div class="item_attribute">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <div class="select_option clearfix">
                                                        <h4 class="input_title">Color *</h4>
                                                        <select class="form-control" id="color_id">
                                                            <option  value="">Choose A Option</option>
                                                            @foreach ($available_colors as $color )
                                                            <option value="{{ $color->rel_to_color->id }}">{{ $color->rel_to_color->color_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col col-md-6">
                                                    <div class="select_option clearfix">
                                                        <h4 class="input_title">Size *</h4>
                                                        <select class="form-control" id="size_id">
                                                            <option value="">Choose A Option</option>


                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="quantity_wrap">
                                            <div class="quantity_input">
                                                <button type="button" class="input_number_decrement">
                                                    <i class="fal fa-minus"></i>
                                                </button>
                                                <input class="input_number" type="text" value="1">
                                                <button type="button" class="input_number_increment">
                                                    <i class="fal fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="total_price">Total: Tk <span id="total">{{ $productSluginfo->first()->after_discount }}</span></div>
                                        </div>

                                        <ul class="default_btns_group ul_li">
                                            <li><a class="add-to-cart-btn btn btn_primary addtocart_btn" href="#!">Add To Cart</a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="details_information_tab">
                        <ul class="tabs_nav nav ul_li" role=tablist>
                            <li>
                                <button class="active" data-bs-toggle="tab" data-bs-target="#description_tab" type="button" role="tab" aria-controls="description_tab" aria-selected="true">
                                Description
                                </button>
                            </li>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#additional_information_tab" type="button" role="tab" aria-controls="additional_information_tab" aria-selected="false">
                                Additional information
                                </button>
                            </li>
                            <li>
                                <button data-bs-toggle="tab" data-bs-target="#reviews_tab" type="button" role="tab" aria-controls="reviews_tab" aria-selected="false">
                                Reviews(2)
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description_tab" role="tabpanel">
                                <p>{!! $productSluginfo->first()->long_desp !!}</p>

                            </div>

                            <div class="tab-pane fade" id="additional_information_tab" role="tabpanel">
                                <p>
                                Return into stiff sections the bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked what's happened to me he thought It wasn't a dream. His room, a proper human room although a little too small
                                </p>

                                <div class="additional_info_list">
                                    <h4 class="info_title">Additional Info</h4>
                                    <ul class="ul_li_block">
                                        <li>No Side Effects</li>
                                        <li>Made in USA</li>
                                    </ul>
                                </div>

                                <div class="additional_info_list">
                                    <h4 class="info_title">Product Features Info</h4>
                                    <ul class="ul_li_block">
                                        <li>Compatible for indoor and outdoor use</li>
                                        <li>Wide polypropylene shell seat for unrivalled comfort</li>
                                        <li>Rust-resistant frame</li>
                                        <li>Durable UV and weather-resistant construction</li>
                                        <li>Shell seat features water draining recess</li>
                                        <li>Shell and base are stackable for transport</li>
                                        <li>Choice of monochrome finishes and colourways</li>
                                        <li>Designed by Nagi</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews_tab" role="tabpanel">
                                <div class="average_area">
                                    <div class="row align-items-center">
                                        <div class="col-md-12 order-last">
                                            <div class="average_rating_text">
                                                <ul class="rating_star ul_li_center">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                <p class="mb-0">
                                                Average Star Rating: <span>4 out of 5</span> (2 vote)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer_reviews">
                                    <h4 class="reviews_tab_title">2 reviews for this product</h4>
                                    <div class="customer_review_item clearfix">
                                        <div class="customer_image">
                                            <img src="assets/images/team/team_1.jpg" alt="image_not_found">
                                        </div>
                                        <div class="customer_content">
                                            <div class="customer_info">
                                                <ul class="rating_star ul_li">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <h4 class="customer_name">Aonathor troet</h4>
                                                <span class="comment_date">JUNE 2, 2021</span>
                                            </div>
                                            <p class="mb-0">Nice Product, I got one in black. Goes with anything!</p>
                                        </div>
                                    </div>

                                    <div class="customer_review_item clearfix">
                                        <div class="customer_image">
                                            <img src="assets/images/team/team_2.jpg" alt="image_not_found">
                                        </div>
                                        <div class="customer_content">
                                            <div class="customer_info">
                                                <ul class="rating_star ul_li">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star-half-alt"></i></li>
                                                </ul>
                                                <h4 class="customer_name">Danial obrain</h4>
                                                <span class="comment_date">JUNE 2, 2021</span>
                                            </div>
                                            <p class="mb-0">
                                            Great product quality, Great Design and Great Service.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="customer_review_form">
                                    <h4 class="reviews_tab_title">Add a review</h4>
                                    <form action="#">
                                        <div class="form_item">
                                            <input type="text" name="name" placeholder="Your name*">
                                        </div>
                                        <div class="form_item">
                                            <input type="email" name="email" placeholder="Your Email*">
                                        </div>
                                        <div class="your_ratings">
                                            <h5>Your Ratings:</h5>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                            <button type="button"><i class="fal fa-star"></i></button>
                                        </div>
                                        <div class="form_item">
                                            <textarea name="comment" placeholder="Your Review*"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn_primary">Submit Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product_details - end
            ================================================== -->

            <!-- related_products_section - start
            ================================================== -->
            <section class="related_products_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="best-selling-products related-product-area">
                                <div class="sec-title-link">
                                    <h3>Related products</h3>
                                    <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                                </div>
                                <div class="product-area row clearfix">
                                    @forelse ($related_products as $related_product)

                                        <div class="grid col-lg-3">
                                            <div class="product-pic">
                                                <img src="{{ asset('uploads\products\preview_image/'.$related_product->preview) }}" alt>

                                            </div>
                                            <div class="details">
                                                <h4><a href="{{ route('product.details',$related_product->slug) }}">{{ $related_product->product_name }}</a></h4>
                                                <p><a href="{{ route('product.details',$related_product->slug) }}">{{ $related_product->short_desp }} </a></p>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <span class="{{ $related_product->short_desp }}">
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol">TK </span>{{ $related_product->after_discount}}
                                                            </bdi>
                                                        </span>
                                                    </ins>
                                                </span>
                                                <div class="add-cart-area">
                                                    <button class="add-to-cart">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <h4>No Product Data Found</h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- related_products_section - end
            ================================================== -->


@endsection

@section('footer_script')

{{--  js code for color & size --}}

<script>
    $('#color_id').change(function(){
        let color_id = $(this).val();
        let product_id = "{{ $productSluginfo->first()->id }}";



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/getsize',
            //color & product hosse je name information gulu show kora hobe
            //color_id & product_id hosse variable er name
            data: {'color_id':color_id, 'product_id': product_id},
            success:function(data){
                $('#size_id').html(data);
                // alert(data);

            }
        });


    });

</script>

{{--  js code for product quantity increment & decrement --}}
<script>
    let quantity =$('.input_number').val();
    let price = $('#price').html();

    $('.input_number_increment').click(function(){
        quantity++;
        $('.input_number').val(quantity);
        let total = price*quantity;
        $('#total').html(total);
    })
    $('.input_number_decrement').click(function(){
        if(quantity>1){
            quantity--;
        }
        $('.input_number').val(quantity);
        let total = price*quantity;
        $('#total').html(total);
    })
</script>
{{--  js code for add to card --}}
<script>
    $(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();
            alert('daklgjl');

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // var product_id = $(this).closest('.product_data').find('.product_id').val();
            // var quantity = $(this).closest('.product_data').find('.qty-input').val();

            // $.ajax({
            //     url: "/add-to-cart",
            //     method: "POST",
            //     data: {
            //         'quantity': quantity,
            //         'product_id': product_id,
            //     },
            //     success: function (response) {
            //         alertify.set('notifier','position','top-right');
            //         alertify.success(response.status);
            //     },
            // });
        });
    });
</script>
@endsection
