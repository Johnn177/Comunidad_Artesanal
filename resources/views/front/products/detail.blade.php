{{-- Note: front/products/detail.blade.php is the page that opens when you click on a product in the FRONT home page --}} {{-- $productDetails, categoryDetails and $totalStock are passed in from detail() method in Front/ProductsController.php --}}
@extends('front.layout.layout')


@section('content')
    {{-- Star Rating (of a Product) (in the "Reviews" tab) --}}
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            /* position:absolute; */
            position:inherit;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>


    
    <!-- Encabezado de la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detalle</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">Detalle</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Encabezado de la Página /- -->
    <!-- Página de Producto Individual a Pantalla Completa -->

    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
               
                <div class="col-lg-6 col-md-6 col-sm-12">

                    {{-- Plugin EasyZoom para hacer zoom en las imágenes del producto al pasar el ratón --}}
                    {{-- Mi EasyZoom (plugin jQuery para zoom de imágenes): https://i-like-robots.github.io/EasyZoom/ --}}

                    <!-- Área de zoom del producto -->
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails"> {{-- Plugin EasyZoom --}}
                        <a href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="Imagen del producto" width="500" height="500" />
                        </a>
                    </div>

                    <div class="thumbnails" style="margin-top: 30px"> {{-- Plugin EasyZoom --}}
                        <a href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}" width="120" height="120" alt="Miniatura del producto" />
                        </a>

                        {{-- Mostrar las imágenes alternativas del producto (`image` en la tabla `products_images`) --}}
                        @foreach ($productDetails['images'] as $image)
                            {{-- Plugin EasyZoom --}}
                            <a href="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $image['image']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $image['image']) }}" width="120" height="120" alt="Imagen alternativa del producto" />
                            </a>
                        @endforeach
                    </div>
                    <!-- Área de zoom del producto /- -->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Detalles del producto -->
                    <div class="all-information-wrapper">

                        {{-- Código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o las contraseñas no coincidan --}}
                        {{-- Verificando si existe un mensaje de error en la sesión --}}
                        @if (Session::has('error_message')) <!-- Se verifica si existe el mensaje de error -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }} <!-- Mostrar mensaje de error -->
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Mostrar errores de validación de Laravel --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error) <!-- Mostrar lista de errores de validación -->
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        {{-- Mensaje de éxito en caso de que la actualización de la contraseña sea exitosa --}}
                        @if (Session::has('success_message')) <!-- Se verifica si existe el mensaje de éxito -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Éxito:</strong> @php echo Session::get('success_message') @endphp <!-- Mostrar mensaje de éxito -->
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;">{{ $productDetails['product_name'] }}</a> <!-- Nombre del producto -->
                                </h1>
                            </div>

                            {{-- Miga de pan (Breadcrumb) --}}
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">Inicio</a> <!-- Enlace a la página de inicio -->
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;">{{ $productDetails['section']['name'] }}</a> <!-- Nombre de la sección del producto -->
                                </li>
                                @php echo $categoryDetails['breadcrumbs'] @endphp <!-- Miga de pan de la categoría -->
                            </ul>

                            <div class="product-rating">
                                <div title="{{ $avgRating }} de 5 - basado en {{ count($ratings) }} reseñas">
                                    {{-- Mostrar las estrellas de calificación si el producto tiene reseñas --}}
                                    @if ($avgStarRating > 0) 
                                        @php
                                            $star = 1;
                                            while ($star < $avgStarRating):
                                        @endphp
                                            <span style="color: gold; font-size: 17px">&#9733;</span> <!-- Mostrar estrellas -->
                                        @php
                                            $star++;
                                            endwhile;
                                        @endphp
                                        ({{ $avgRating }}) <!-- Mostrar la calificación promedio -->
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Descripción del producto --}}
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Descripción:</h6>
                            <p>{{ $productDetails['description'] }}</p> <!-- Mostrar descripción del producto -->
                        </div>

                        {{-- Precio con descuento o precio original --}}
                        <div class="section-3-price-original-discount u-s-p-y-14">
                            @php $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']) @endphp
                            <span class="getAttributePrice">
                                @if ($getDiscountPrice > 0) <!-- Si el producto tiene descuento -->
                                    <div class="price">
                                        <h4>Bs.{{ $getDiscountPrice }}</h4> <!-- Mostrar precio con descuento -->
                                    </div>
                                    <div class="original-price">
                                        <span>Precio Original:</span>
                                        <span>Bs.{{ $productDetails['product_price'] }}</span> <!-- Mostrar precio original -->
                                    </div>
                                @else
                                    <div class="price">
                                        <h4>Bs.{{ $productDetails['product_price'] }}</h4> <!-- Mostrar precio original si no hay descuento -->
                                    </div>
                                @endif
                            </span>
                        </div>

                        {{-- Información del producto como código, color y disponibilidad --}}
                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Información SKU:</h6>
                            <div class="left">
                                <span>Código del Producto:</span>
                                <span>{{ $productDetails['product_code'] }}</span> <!-- Mostrar código del producto -->
                            </div>
                            <div class="left">
                                <span>Color del Producto:</span>
                                <span>{{ $productDetails['product_color'] }}</span> <!-- Mostrar color del producto -->
                            </div>
                            <div class="availability">
                                <span>Disponibilidad:</span>
                                @if ($totalStock > 0)
                                    <span>En stock</span> <!-- Mostrar si está en stock -->
                                @else
                                    <span style="color: red">Agotado</span> <!-- Mostrar si está agotado -->
                                @endif
                            </div>

                            @if ($totalStock > 0)
                                <div class="left">
                                    <span>Solo quedan:</span>
                                    <span>{{ $totalStock }} disponibles</span> <!-- Mostrar la cantidad de productos restantes -->
                                </div>
                            @endif
                        </div>

                        {{-- Mostrar nombre de la tienda del vendedor si el producto es vendido por un proveedor --}}
                        @if(isset($productDetails['vendor']))
                            <div>
                                Vendido por: <a href="/products/{{ $productDetails['vendor']['id'] }}">
                                    {{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }} <!-- Nombre de la tienda del vendedor -->
                                </a>
                            </div>
                        @endif

                        {{-- Formulario para añadir el producto al carrito --}}
                        <form action="{{ url('cart/add') }}" method="Post" class="post-form">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}"> <!-- ID del producto -->

                            {{-- Selección de tamaño --}}
                            <div class="section-5-product-variants u-s-p-y-14">
                                <div class="sizes u-s-m-b-11">
                                    <span>Tamaño disponible:</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size" id="getPrice" product-id="{{ $productDetails['id'] }}" name="size" required>
                                            <option value="">Selecciona tamaño</option>
                                            @foreach ($productDetails['attributes'] as $attribute) <!-- Mostrar los tamaños disponibles -->
                                                <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Cantidad y acciones --}}
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Cantidad:</span>
                                    <div class="quantity">
                                        <input class="quantity-text-field" type="number" name="quantity" value="1"> <!-- Selector de cantidad -->
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">Añadir al carrito</button> <!-- Botón de añadir al carrito -->
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button> <!-- Botón de "Me gusta" -->
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button> <!-- Botón de compartir por correo -->
                                </div>
                            </div>
                        </form>

                        {{-- Comprobación de disponibilidad por código postal --}}
                        <br><br><b>Entrega</b>
                        <input type="text" id="pincode" placeholder="Verificar código postal" required> <!-- Campo para verificar el código postal -->
                        <button type="button" id="checkPincode">Verificar</button> <!-- Botón para verificar código postal -->
                    </div>
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
                                    <a class="nav-link active" data-toggle="tab" href="#video">Video del Producto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#detail">Detalles del Producto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#review">Reseñas {{ count($ratings) }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Pestaña de Descripción -->
                            <div class="tab-pane fade active show" id="video">
                                <div class="description-whole-container">

                                    @if ($productDetails['product_video'])
                                        <video controls>
                                            <source src="{{ url('front/videos/product_videos/' . $productDetails['product_video']) }}" type="video/mp4">
                                        </video>
                                    @else
                                        El video del producto no existe    
                                    @endif

                                </div>
                            </div>
                            <!-- Pestaña de Descripción /- -->
                            <!-- Pestaña de Detalles -->
                            <div class="tab-pane fade" id="detail">
                                <div class="specification-whole-container">
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">Detalles del Producto</h4>
                                        <table>

                                            @php
                                                $productFilters = \App\Models\ProductsFilter::productFilters(); // Obtener todos los filtros (habilitados/activos)
                                            @endphp

                                            @foreach ($productFilters as $filter) {{-- Mostrar todos los filtros (habilitados/activos) --}}
                                                @if (isset($productDetails['category_id'])) {{-- que viene de la llamada AJAX (pasada a través del método categoryFilters() en Admin/FilterController.php, y también puede venir de la condición if anterior en caso de 'Editar Producto' (no 'Agregar Producto') desde el método addEditProduct() en Admin/ProductsController --}}

                                                    @php
                                                        // Primero, para cada filtro en la tabla `products_filters`, obtener los `cat_ids` del filtro (del bucle foreach) utilizando el método filterAvailable(), luego verificar si el id de categoría actual (usando la variable $productDetails['category_id'] y dependiendo de la URL) existe en los `cat_ids` del filtro. Si existe, mostrar el filtro, si no, no mostrar el filtro
                                                        $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);
                                                    @endphp

                                                    @if ($filterAvailable == 'Sí') {{-- si el filtro tiene el `category_id` actual en sus `cat_ids` --}}

                                                        <tr>
                                                            <td>{{ $filter['filter_name'] }}</td>
                                                            <td>
                                                                @foreach ($filter['filter_values'] as $value) {{-- mostrar los valores relacionados del filtro del producto --}}
                                                                    @if (!empty($productDetails[$filter['filter_column']]) && $productDetails[$filter['filter_column']] == $value['filter_value']) {{-- $value['filter_value'] es como '4GB' --}}
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
                            <!-- Pestaña de Especificaciones /- -->
                            <!-- Pestaña de Reseñas -->
                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <h6 class="review-h6">Calificación Promedio</h6>
                                                <div class="circle-wrapper">
                                                    <h1>{{ $avgRating }}</h1>
                                                </div>
                                                <h6 class="review-h6">Basado en {{ count($ratings) }} Reseñas</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Estrellas</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingFiveStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Estrellas</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingFourStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Estrellas</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingThreeStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Estrellas</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingTwoStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Estrella</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingOneStarCount }})</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">

                                            <!-- Calificación por Estrellas (de un Producto) (en la pestaña "Reseñas"). -->
                                            <form method="POST" action="{{ url('add-rating') }}" name="formRating" id="formRating">
                                                @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                                <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                                                <div class="your-rating-wrapper">
                                                    <h6 class="review-h6">Tu reseña es importante.</h6>
                                                    <h6 class="review-h6">¿Has usado este producto antes?</h6>
                                                    <div class="star-wrapper u-s-m-b-8">

                                                        <!-- Calificación por Estrellas (de un Producto) (en la pestaña "Reseñas"). -->
                                                        <div class="rate">
                                                            <input style="display: none" type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="text">5 estrellas</label>

                                                            <input style="display: none" type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 estrellas</label>

                                                            <input style="display: none" type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 estrellas</label>

                                                            <input style="display: none" type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 estrellas</label>

                                                            <input style="display: none" type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 estrella</label>
                                                        </div>

                                                    </div>
                                                    <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Tu Reseña" name="review" required></textarea>
                                                    <button class="button button-outline-secondary">Enviar Reseña</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <!-- Obtener Reseñas -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Opciones de Reseña -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reseñas
                                                    <span> ({{ count($ratings) }}) </span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- Opciones de Reseña /- -->
                                        <!-- Todas las Reseñas -->
                                        <div class="reviewers">

                                            {{-- Mostrar las Calificaciones del Usuario --}}
                                            @if (count($ratings) > 0) {{-- si hay calificaciones para el producto --}}
                                                @foreach($ratings as $rating)
                                                    <div class="review-data">
                                                        <div class="reviewer-name-and-date">
                                                            <h6 class="reviewer-name">{{ $rating['user']['name'] }}</h6>
                                                            <span class="reviewer-date">{{ date('d/m/Y', strtotime($rating['created_at'])) }}</span>
                                                        </div>
                                                        <div class="star-wrapper">
                                                            <div class="star">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <span style="width: {{ ($rating['rating'] >= $i) ? '100%' : '0%' }}"></span>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p>{{ $rating['review'] }}</p>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h6>No hay Reseñas para este Producto</h6>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pestaña de Reseñas /- -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Productos Similares -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Productos Similares</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">

                                {{-- Mostrar productos similares (o relacionados) obteniendo otros productos de la MISMA CATEGORÍA --}}
                                @foreach ($similarProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                @php
                                                    $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                                @endphp

                                                @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- si la imagen del producto existe en la BASE DE DATOS Y en el sistema de archivos (en el servidor) --}}
                                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Producto">
                                                @else {{-- mostrar la imagen predeterminada --}}
                                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Producto">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Vista Rápida</a>
                                                <a class="item-mail" href="javascript:void(0)">Enviar por Correo</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Agregar a la Lista de Deseos</a>
                                                <a class="item-addCart" href="javascript:void(0)">Agregar al Carrito</a>
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
                                            </div>

                                            {{-- Llamar al método estático getDiscountPrice() en el modelo Product.php para determinar el precio final de un producto porque un producto puede tener un descuento de DOS cosas: un descuento de 'CATEGORÍA' o un descuento de 'PRODUCTO' --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- Si hay un descuento en el precio, mostrar el precio antes (el precio original) y después (el nuevo precio) del descuento --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Bs. {{ $getDiscountPrice }} 
                                                    </div>
                                                    <div class="item-old-price">
                                                        Bs. {{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- si no hay descuento en el precio, mostrar el precio original --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Bs. {{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tag new">
                                            <span>NUEVO</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>
                <!-- Productos Similares /- -->
                <!-- Productos Vistos Recientemente  -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Productos Vistos Recientemente</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">

                                {{-- Funcionalidad de Productos Vistos Recientemente --}}
                                @foreach ($recentlyViewedProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                @php
                                                    $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                                @endphp

                                                @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- si la imagen del producto existe en la BASE DE DATOS Y en el sistema de archivos (en el servidor) --}}
                                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Producto">
                                                @else {{-- mostrar la imagen predeterminada --}}
                                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Producto">
                                                @endif
                                            </a>
                                            <div class="item-action-behaviors">
                                                <a class="item-quick-look" data-toggle="modal" href="#quick-view">Vista Rápida</a>
                                                <a class="item-mail" href="javascript:void(0)">Enviar por Correo</a>
                                                <a class="item-addwishlist" href="javascript:void(0)">Agregar a la Lista de Deseos</a>
                                                <a class="item-addCart" href="javascript:void(0)">Agregar al Carrito</a>
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
                                            </div>

                                            {{-- Llamar al método estático getDiscountPrice() en el modelo Product.php para determinar el precio final de un producto --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- Si hay un descuento en el precio, mostrar el precio antes y después del descuento --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Bs. {{ $getDiscountPrice }} 
                                                    </div>
                                                    <div class="item-old-price">
                                                        Bs. {{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- si no hay descuento, mostrar el precio original --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        Bs. {{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tag new">
                                            <span>NUEVO</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>
                <!-- Productos Vistos Recientemente /- -->
            </div>

            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
@endsection