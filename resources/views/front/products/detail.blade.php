{{-- Check 19:09 in https://www.youtube.com/watch?v=fv9ZnNRKBBE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=103 --}}
{{-- Note: front/products/detail.blade.php is the page that opens when you click on a product in the FRONT home page --}} {{-- $productDetails, categoryDetails and $totalStock are passed in from detail() method in Front/ProductsController.php --}}


@extends('front.layout.layout')


@section('content')
    
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detail</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">



                    {{-- EasyZoom plugin for zooming product images upon hover: https://www.youtube.com/watch?v=bWV92NrhyOk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=108 --}}
                    {{-- Our EasyZoom (jQuery image zoom plugin): https://i-like-robots.github.io/EasyZoom/ --}}

                    <!-- Product-zoom-area -->
                    {{-- <div class="zoom-area"> --}}
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails"> {{-- EasyZoom plugin: https://www.youtube.com/watch?v=bWV92NrhyOk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=108 --}}
                        <a      href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="" width="500" height="500" />
                        </a>
                        {{-- Show the Main image (`product_image` in `products` table) --}}
                        {{-- <img id="zoom-pro" class="img-fluid" src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-zoom-image="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="Zoom Image"> --}}
                    </div>

                    {{-- <div id="gallery" class="u-s-m-t-10"> --}}
                    <div class="thumbnails" style="margin-top: 30px"> {{-- EasyZoom plugin: https://www.youtube.com/watch?v=bWV92NrhyOk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=108 --}}
                        <a      href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}" width="120" height="120" alt="" />
                        </a>
                        {{-- Show the product main image (`product_image` in `products` table) as the first image --}}
                        {{-- <a class="active" data-image="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-zoom-image="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" width="120" height="120" alt="Product">
                        </a> --}}



                        {{-- Show the product Alternative images (`image` in `products_images` table) --}}
                        @foreach ($productDetails['images'] as $image)
                            {{-- EasyZoom plugin: https://www.youtube.com/watch?v=bWV92NrhyOk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=108 --}}
                            <a      href="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $image['image']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $image['image']) }}" width="120" height="120" alt="" />
                            </a>
                            {{-- <a data-image="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-zoom-image="{{ asset('front/images/product_images/large/' . $image['image']) }}">
                                <img       src="{{ asset('front/images/product_images/large/' . $image['image']) }}" width="120" height="120" alt="Product">
                            </a> --}}
                        @endforeach



                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">


                        {{-- https://www.youtube.com/watch?v=qMa1g05oX74&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=117 --}}

                        {{-- Our Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                        {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    {{-- Check 17:38 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18 --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                        {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
                        @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{-- <strong>Success:</strong> {{ Session::get('success_message') }} --}} {{-- Displaying Data: https://laravel.com/docs/9.x/blade#displaying-data --}}

                                {{-- There are TWO ways to: Displaying Unescaped Data: https://laravel.com/docs/9.x/blade#displaying-unescaped-data --}}
                                {{--    <strong>Success:</strong> {!! Session::get('success_message') !!}    --}} {{-- Displaying Unescaped Data: https://laravel.com/docs/9.x/blade#displaying-unescaped-data --}}
                                <strong>Success:</strong> @php echo Session::get('success_message') @endphp       {{-- Displaying Unescaped Data: https://laravel.com/docs/9.x/blade#displaying-unescaped-data --}}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;">{{ $productDetails['product_name'] }}</a> {{-- $productDetails is passed in from detail() method in Front/ProductsController.php --}}
                                </h1>
                            </div>



                            {{-- Breadcrumb --}}
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">Home</a> {{-- Home --}}
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;">{{ $productDetails['section']['name'] }}</a> {{-- Section Name --}}
                                </li>
                                @php echo $categoryDetails['breadcrumbs'] @endphp {{-- $categoryDetails is passed in from detail() method in Front/ProductsController.php --}}
                                {{-- <li class="has-separator">
                                    <a href="shop-v1-root-category.html">Men Clothing </a>
                                </li>
                                <li class="has-separator">
                                    <a href="listing.html">Tops</a>
                                </li>
                                <li class="is-marked">
                                    <a href="shop-v3-sub-sub-category.html">Hoodies</a>
                                </li> --}}
                            </ul>
                            {{-- Breadcrumb --}}



                            <div class="product-rating">
                                <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                    <span style='width:67px'></span>
                                </div>
                                <span>(23)</span>
                            </div>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Description:</h6>
                            <p>{{ $productDetails['description'] }}</p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">

                        

                            @php $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']) @endphp

                            <span class="getAttributePrice">{{-- this <span> will be used by jQuery for getting the respective `price` and `stock` depending on the selected `size` in the <select> box (through the AJAX call). Check front/js/custom.js --}}

                                @if ($getDiscountPrice > 0) {{-- if there's a discount on the product price --}}
                                    <div class="price">
                                        <h4>Rs.{{ $getDiscountPrice }}</h4>
                                    </div>
                                    <div class="original-price">
                                        <span>Original Price:</span>
                                        <span>Rs.{{ $productDetails['product_price'] }}</span> {{-- the product original price (without discount) --}}
                                    </div>
                                    {{-- <div class="discount-price">
                                        <span>Discount:</span>
                                        <span>15%</span>
                                    </div>
                                    <div class="total-save">
                                        <span>Save:</span>
                                        <span>$20</span>
                                    </div> --}}
                                @else {{-- if there's no discount on the product price --}}
                                    <div class="price">
                                        <h4>Rs.{{ $productDetails['product_price'] }}</h4> {{-- the product original price (without discount) --}}
                                    </div>
                                @endif

                            </span> 



                        </div>
                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                            <div class="left">
                                <span>Product Code:</span>
                                <span>{{ $productDetails['product_code'] }}</span>
                            </div>
                            <div class="left">
                                <span>Product Color:</span>
                                <span>{{ $productDetails['product_color'] }}</span>
                            </div>
                            <div class="availability">
                                <span>Availability:</span>



                                {{-- https://www.youtube.com/watch?v=0Bpk4JfwvpI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=105 --}}
                                @if ($totalStock > 0)
                                    <span>In Stock</span>
                                @else
                                    <span style="color: red">Out of Stock (Sold-out)</span>
                                @endif



                            </div>



                            @if ($totalStock > 0)
                                <div class="left">
                                    <span>Only:</span>
                                    <span>{{ $totalStock }} left</span>
                                </div>
                            @endif



                        </div>



                        {{-- Show the vendor shop name (only in case that the product is added by a vendor, not admin or superadmin) --}} {{-- https://www.youtube.com/watch?v=uu8CBDsWD7g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=109 --}}
                        @if(isset($productDetails['vendor']))
                            <div>
                                {{-- Sold by: {{ $productDetails['vendor']['name'] }} --}}
                                Sold by: <a href="/products/{{ $productDetails['vendor']['id'] }}"> {{-- https://www.youtube.com/watch?v=S8xbldfdLXc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=111 --}}
                                            {{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}
                                        </a>
                            </div>
                        @endif



                        {{-- Add to Cart <form> --}} {{-- https://www.youtube.com/watch?v=LmovzZ9zdzE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=116 --}}
                        <form action="{{ url('cart/add') }}" method="Post" class="post-form">
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}"> {{-- Add to Cart <form> --}} {{-- https://www.youtube.com/watch?v=LmovzZ9zdzE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=116 --}}


                            <div class="section-5-product-variants u-s-p-y-14">
                                {{-- <h6 class="information-heading u-s-m-b-8">Product Variants:</h6>
                                <div class="color u-s-m-b-11">
                                    <span>Available Color:</span>
                                    <div class="color-variant select-box-wrapper">
                                        <select class="select-box product-color">
                                            <option value="1">Heather Grey</option>
                                            <option value="3">Black</option>
                                            <option value="5">White</option>
                                        </select>
                                    </div>
                                </div> --}}



                                {{-- Managing Product Colors (using the `group_code` column in `products` table) --}} {{-- https://www.youtube.com/watch?v=Nle1w37JW2k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=115 --}}
                                @if (count($groupProducts) > 0) {{-- if there's a value for the `group_code` column (in `products` table) for the currently viewed product --}}
                                    <div>
                                        <div><strong>Product Colors</strong></div>
                                        <div style="margin-top: 10px">
                                            @foreach ($groupProducts as $product)
                                                <a href="{{ url('product/' . $product['id']) }}">
                                                    <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif



                                <div class="sizes u-s-m-b-11" style="margin-top: 20px">
                                    <span>Available Size:</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size" id="getPrice" product-id="{{ $productDetails['id'] }}" name="size" required> {{-- Check front/js/custom.js file --}}



                                            <option value="">Select Size</option>
                                            @foreach ($productDetails['attributes'] as $attribute)
                                                <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                            @endforeach



                                            {{-- <option value="">Male 3XL</option>
                                            <option value="">Kids 4</option>
                                            <option value="">Kids 6</option>
                                            <option value="">Kids 8</option>
                                            <option value="">Kids 10</option>
                                            <option value="">Kids 12</option>
                                            <option value="">Female Small</option>
                                            <option value="">Male Small</option>
                                            <option value="">Female Medium</option>
                                            <option value="">Male Medium</option>
                                            <option value="">Female Large</option>
                                            <option value="">Male Large</option>
                                            <option value="">Female XL</option>
                                            <option value="">Male XL</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">



                                {{-- <div class="quick-social-media-wrapper u-s-m-b-22">
                                    <span>Share:</span>
                                    <ul class="social-media-list">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-rss"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> --}}

                                
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        {{-- <input type="text" class="quantity-text-field" value="1">
                                        <a class="plus-a" data-max="1000">&#43;</a>
                                        <a class="minus-a" data-min="1">&#45;</a> --}}
                                        <input class="quantity-text-field" type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>



                            </div>
                        </form>



                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Detail-Tabs -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="detail-tabs-wrapper u-s-p-t-80">
                        <div class="detail-nav-wrapper u-s-m-b-30">
                            <ul class="nav single-product-nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#video">Product Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#detail">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews (15)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Description-Tab -->
                            <div class="tab-pane fade active show" id="video">
                                <div class="description-whole-container">



                                    @if ($productDetails['product_video'])

                                        <video controls>
                                            <source src="{{ url('front/videos/product_videos/' . $productDetails['product_video']) }}" type="video/mp4">
                                        </video>

                                    @else
                                        Product Video does not exist    
                                    @endif



                                    {{-- <img class="desc-img img-fluid u-s-m-b-26" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product"> --}}
                                    {{-- <iframe class="desc-iframe u-s-m-b-45" width="710" height="400" src="{{ asset('front/images/product/iframe-youtube.jpg') }}" allowfullscreen></iframe> --}}
                                </div>
                            </div>
                            <!-- Description-Tab /- -->
                            <!-- Details-Tab -->
                            <div class="tab-pane fade" id="detail">
                                <div class="specification-whole-container">
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">Product Details</h4>
                                        <table>



                                            {{-- https://www.youtube.com/watch?v=iEqfJk_ye7M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=107 --}}
                                            @php
                                                // https://www.youtube.com/watch?v=Rr2tkfVtVMc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=86
                                                $productFilters = \App\Models\ProductsFilter::productFilters(); // Get ALL the (enabled/active) Filters
                                                // dd($productFilters);
                                            @endphp

                                            @foreach ($productFilters as $filter) {{-- show ALL the (enabled/active) Filters --}}
                                                @php
                                                    // echo '<pre>', var_dump($product), '</pre>';
                                                    // exit;
                                                    // echo '<pre>', var_dump($filter), '</pre>';
                                                    // exit;
                                                    // dd($filter);
                                                @endphp

                                                @if (isset($productDetails['category_id'])) {{-- which comes from the AJAX call (passed in through the categoryFilters() method in Admin/FilterController.php, and ALSO may come from the if condition above there (in this page) in case of 'Edit Product' (not 'Add a Product') from addEditProduct() method in Admin/ProductsController --}}
                                                    @php
                                                        // dd($filter);

                                                        // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $productDetails['category_id'] variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
                                                        $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);
                                                    @endphp

                                                    @if ($filterAvailable == 'Yes') {{-- if the filter has the current productDetails['category_id'] in its `cat_ids` --}}

                                                        <tr>
                                                            <td>{{ $filter['filter_name'] }}</td>
                                                            <td>
                                                                @foreach ($filter['filter_values'] as $value) {{-- show the related values of the filter of the product --}}
                                                                    @php
                                                                        // echo '<pre>', var_dump($value), '</pre>'; exit;
                                                                    @endphp
                                                                    @if (!empty($productDetails[$filter['filter_column']]) && $productDetails[$filter['filter_column']] == $value['filter_value']) {{-- $value['filter_value'] is like '4GB' --}} {{-- $productDetails[$filter['filter_column']]    is like    $productDetails['screen_size']    which in turn, may be equal to    '5 to 5.4 in' --}}
                                                                        {{ ucwords($value['filter_value']) }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>

                                                    @endif
                                                @endif
                                            @endforeach



                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Specifications-Tab /- -->
                            <!-- Reviews-Tab -->
                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <h6 class="review-h6">Average Rating</h6>
                                                <div class="circle-wrapper">
                                                    <h1>4.5</h1>
                                                </div>
                                                <h6 class="review-h6">Based on 23 Reviews</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Stars</span>
                                                    <div class="star">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Star</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">
                                            <div class="your-rating-wrapper">
                                                <h6 class="review-h6">Your Review is matter.</h6>
                                                <h6 class="review-h6">Have you used this product before?</h6>
                                                <div class="star-wrapper u-s-m-b-8">
                                                    <div class="star">
                                                        <span id="your-stars" style='width:0'></span>
                                                    </div>
                                                    <label for="your-rating-value"></label>
                                                    <input id="your-rating-value" type="text" class="text-field" placeholder="0.0">
                                                    <span id="star-comment"></span>
                                                </div>
                                                <form>
                                                    <label for="your-name">Name
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="your-name" type="text" class="text-field" placeholder="Your Name">
                                                    <label for="your-email">Email
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="your-email" type="text" class="text-field" placeholder="Your Email">
                                                    <label for="review-title">Review Title
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="review-title" type="text" class="text-field" placeholder="Review Title">
                                                    <label for="review-text-area">Review
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Review"></textarea>
                                                    <button class="button button-outline-secondary">Submit Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Get-Reviews -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Review-Options -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reviews
                                                    <span> (15) </span>
                                                </h6>
                                            </div>
                                            <div class="review-option-box">
                                                <div class="select-box-wrapper">
                                                    <label class="sr-only" for="review-sort">Review Sorter</label>
                                                    <select class="select-box" id="review-sort">
                                                        <option value="">Sort by: Best Rating</option>
                                                        <option value="">Sort by: Worst Rating</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Review-Options /- -->
                                        <!-- All-Reviews -->
                                        <div class="reviewers">
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">John</h6>
                                                    <h6 class="review-posted-date">10 May 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Good!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Good Quality...!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Doe</h6>
                                                    <h6 class="review-posted-date">10 June 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Cotton is good.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Tim</h6>
                                                    <h6 class="review-posted-date">10 July 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Excellent condition
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Johnny</h6>
                                                    <h6 class="review-posted-date">10 March 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Bright!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Cotton
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Alexia C. Marshall</h6>
                                                    <h6 class="review-posted-date">12 May 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Good polyester Cotton
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- All-Reviews /- -->
                                        <!-- Pagination-Review -->
                                        <div class="pagination-review-area">
                                            <div class="pagination-review-number">
                                                <ul>
                                                    <li style="display: none">
                                                        <a href="single-product.html" title="Previous">
                                                            <i class="fas fa-angle-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="single-product.html">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">...</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">10</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html" title="Next">
                                                            <i class="fas fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Pagination-Review /- -->
                                    </div>
                                    <!-- Get-Reviews /- -->
                                </div>
                            </div>
                            <!-- Reviews-Tab /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Similar-Products -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Similar Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">



                                {{-- Show similar products (or related products) (functionality) by getting other products from THE SAME CATEGORY --}}    {{-- https://www.youtube.com/watch?v=cC23wnRCumo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=111 --}}
                                @foreach ($similarProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">



                                                @php
                                                    $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                                @endphp
                        
                                                @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                                @else {{-- show the dummy image --}}
                                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                                @endif



                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">



                                                        <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="listing.html">{{ $product['product_color'] }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="listing.html">{{ $product['brand']['name'] }}</a>



                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                </h6>
                                                {{-- <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div> --}}
                                            </div>



                                            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout    // Check 19:09 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72 --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Rs.{{ $getDiscountPrice }} {{-- 'Rs' means Rupees the Indian currency --}}
                                                    </div>
                                                    <div class="item-old-price">
                                                        Rs.{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Rs.{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
                <!-- Recently-View-Products  -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Recently Viewed Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">




                                {{-- Recently Viewed Products (Items) functionality --}} {{-- https://www.youtube.com/watch?v=if1nn-837wA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=112 --}}
                                @foreach ($recentlyViewedProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">



                                                @php
                                                    $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                                @endphp
                        
                                                @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                                @else {{-- show the dummy image --}}
                                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                                @endif



                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                                <a class="item-mail" href="javascript:void(0)">Mail</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                                <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="what-product-is">
                                                <ul class="bread-crumb">
                                                    <li class="has-separator">



                                                        <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                                                    </li>
                                                    <li class="has-separator">
                                                        <a href="listing.html">{{ $product['product_color'] }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="listing.html">{{ $product['brand']['name'] }}</a>



                                                    </li>
                                                </ul>
                                                <h6 class="item-title">
                                                    <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                </h6>
                                                {{-- <div class="item-stars">
                                                    <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div> --}}
                                            </div>



                                            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout    // Check 19:09 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72 --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Rs.{{ $getDiscountPrice }} {{-- 'Rs' means Rupees the Indian currency --}}
                                                    </div>
                                                    <div class="item-old-price">
                                                        Rs.{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Rs.{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Recently-View-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
@endsection