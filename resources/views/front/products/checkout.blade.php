{{-- Nota: Esta página (vista) es renderizada por el método checkout() en Front/ProductsController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Contenedor de Introducción de Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Finalizar Compra</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="checkout.html">Finalizar Compra</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de Página /- -->
    <!-- Página de Finalización de Compra -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">

            {{-- Mostrando los siguientes errores de validación del formulario HTML: (revisa el método checkout() en Front/ProductsController.php) --}}
            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            @if (Session::has('error_message')) <!-- Revisar AdminController.php, método updateAdminPassword() -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <!-- Segundo Acordeón /- -->

                        <div class="row">
                            <!-- Detalles de Facturación y Envío -->
                            <div class="col-lg-6" id="deliveryAddresses"> {{-- Creamos este id="deliveryAddresses" para usarlo como un manejador para jQuery AJAX para actualizar esta página, revisa front/js/custom.js --}}



                                
                                

                                @include('front.products.delivery_addresses')



                            </div>
                            <!-- Detalles de Facturación y Envío /- -->
                            <!-- Finalizar Compra -->
                            <div class="col-lg-6">



                                {{-- El formulario HTML completo que el usuario envía con su dirección de envío y método de pago --}}
                                <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                                    @csrf {{-- Previniendo solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                                    
                                    
                                    @if (count($deliveryAddresses) > 0) {{-- Verificando si hay alguna $deliveryAddresses para el usuario autenticado/logueado actualmente --}} {{-- La variable $deliveryAddresses se pasa desde el método checkout() en Front/ProductsController.php --}}

                                        <h4 class="section-h4">Direcciones de Envío</h4>

                                        @foreach ($deliveryAddresses as $address)
                                            <div class="control-group" style="float: left; margin-right: 5px">
                                                {{-- Usaremos los atributos de datos HTML personalizados:    shipping_charges    ,    total_price    ,    coupon_amount    ,    codpincodeCount    y    prepaidpincodeCount    para usarlos como manejadores para jQuery y cambiar los cálculos en la sección "Tu Pedido" usando jQuery. Revisa el archivo front/js/custom.js --}}  
                                                <input type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}" shipping_charges="{{ $address['shipping_charges'] }}" total_price="{{ $total_price }}" coupon_amount="{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}" codpincodeCount="{{ $address['codpincodeCount'] }}" prepaidpincodeCount="{{ $address['prepaidpincodeCount'] }}"> {{-- La variable $total_price se pasa desde el método checkout() en Front/ProductsController.php --}} {{-- Creamos el atributo HTML personalizado id="address{{ $address['id'] }}" para obtener los IDs ÚNICOS de las direcciones para que el elemento HTML <label> pueda apuntar a esa <input> --}}
                                            </div>
                                            <div>
                                                <label class="control-label" for="address{{ $address['id'] }}">
                                                    {{ $address['name'] }}, {{ $address['address'] }}, {{ $address['city'] }}, {{ $address['state'] }}, {{ $address['country'] }} ({{ $address['mobile'] }})
                                                </label>
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress" style="float: right; margin-left: 10px">Eliminar</a> {{-- Usamos href="javascript:;" para evitar que el enlace <a> sea clickeable (para hacerlo no clickeable) (detener la función o acción del <a>) porque usaremos jQuery AJAX para hacer clic en este enlace, revisa front/js/custom.js --}} {{-- Usamos la clase="removeAddress" como un manejador para la solicitud AJAX en front/js/custom.js --}}
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress"   style="float: right"                   >Editar</a>   {{-- Usamos href="javascript:;" para evitar que el enlace <a> sea clickeable (para hacerlo no clickeable) (detener la función o acción del <a>) porque usaremos jQuery AJAX para hacer clic en este enlace, revisa front/js/custom.js --}} {{-- Usamos la clase="editAddress" como un manejador para la solicitud AJAX en front/js/custom.js --}}
                                            </div>
                                        @endforeach
                                        <br>
                                    @endif 


                                    <h4 class="section-h4">Tu Pedido</h4>
                                    <div class="order-table">
                                        <table class="u-s-m-b-13">
                                            <thead>
                                                <tr>
                                                    <th>Producto</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                

                                                {{-- Colocaremos este $total_price dentro del bucle foreach para calcular el precio total de todos los productos en el carrito. Revisa el final del siguiente bucle foreach antes de @endforeach --}}
                                                @php $total_price = 0 @endphp

                                                @foreach ($getCartItems as $item) {{-- $getCartItems se pasa desde el método cart() en Front/ProductsController.php --}}
                                                    @php
                                                        $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // de la tabla `products_attributes`, no de la tabla `products`
                                                        // dd($getDiscountAttributePrice);
                                                    @endphp


                                                    <tr>
                                                        <td>
                                                            <a href="{{ url('product/' . $item['product_id']) }}">
                                                                <img width="50px" src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Producto">
                                                                <h6 class="order-h6">{{ $item['product']['product_name'] }}
                                                                <br>
                                                                {{ $item['size'] }}/{{ $item['product']['product_color'] }}</h6>
                                                            </a>
                                                            <span class="order-span-quantity">x {{ $item['quantity'] }}</span>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">Bs.{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</h6> {{-- precio de todos los productos (después del descuento (si hay)) (= precio (después del descuento) * no. de productos) --}}
                                                        </td>
                                                    </tr>


                                                    
                                                    {{-- Esto se coloca aquí DENTRO del bucle foreach para calcular el precio total de todos los productos en el carrito --}}
                                                    @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                                @endforeach


                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">Bs.{{ $total_price }}</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Gastos de Envío</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            <span class="shipping_charges">Bs.0</span>
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Descuento de Cupón</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            
                                                            @if (\Illuminate\Support\Facades\Session::has('couponAmount')) {{-- Almacenamos 'couponAmount' en una variable de sesión dentro del método applyCoupon() en Front/ProductsController.php --}}
                                                                <span class="couponAmount">Bs.{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}</span>
                                                            @else
                                                                Bs. 0
                                                            @endif
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Total</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            <span class="final_price">Bs.{{ $total_price - \Illuminate\Support\Facades\Session::get('couponAmount') }}</span> {{-- precio total después de aplicar el cupón (si se aplica) --}}
                                                        </h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <h4 class="section-h4">Método de Pago</h4>

                                    {{-- Mostrando diferentes métodos de pago de forma vertical --}}
                                    <div class="payment-methods">
                                        <label class="control-label">
                                            <input type="radio" name="payment_method" value="COD" checked>
                                            <span>Contra Reembolso</span>
                                        </label>

                                        <label class="control-label">
                                            <input type="radio" name="payment_method" value="prepaid">
                                            <span>Prepago</span>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Finalizar Compra</button>
                                </form>
                            </div>
                            <!-- Finalizar Compra /- -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Página de Finalización de Compra /- -->
@endsection
