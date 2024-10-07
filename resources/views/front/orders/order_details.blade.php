{{-- Esta página es renderizada por el método orders() dentro de Front/OrderController.php (dependiendo de si se pasa o no el parámetro opcional del id del pedido (slug)) --}}

@extends('front.layout.layout')

@section('content')
    <!-- Encabezado de la Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detalles del Pedido #{{ $orderDetails['id'] }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ url('user/orders') }}">Pedidos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Encabezado de la Página /- -->
    <!-- Página del Pedido -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">

                {{-- Tabla de información del pedido --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <td colspan="2">
                            <strong>Detalles del Pedido</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha del Pedido</td>
                        <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <td>Estado del Pedido</td>
                        <td>{{ $orderDetails['order_status'] }}</td>
                    </tr>
                    <tr>
                        <td>Total del Pedido</td>
                        <td>Bs.{{ $orderDetails['grand_total'] }}</td>
                    </tr>
                    <tr>
                        <td>Cargos de Envío</td>
                        <td>Bs.{{ $orderDetails['shipping_charges'] }}</td>
                    </tr>

                    @if ($orderDetails['coupon_code'] != '')
                        <tr>
                            <td>Código del Cupón</td>
                            <td>{{ $orderDetails['coupon_code'] }}</td>
                        </tr>
                        <tr>
                            <td>Monto del Cupón</td>
                            <td>Bs.{{ $orderDetails['coupon_amount'] }}</td>
                        </tr>
                    @endif

                    @if ($orderDetails['courier_name'] != '')
                        <tr>
                            <td>Nombre del Courier</td>
                            <td>{{ $orderDetails['courier_name'] }}</td>
                        </tr>
                        <tr>
                            <td>Número de Seguimiento</td>
                            <td>{{ $orderDetails['tracking_number'] }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>Método de Pago</td>
                        <td>{{ $orderDetails['payment_method'] }}</td>
                    </tr>
                </table>

                {{-- Tabla de información de los productos del pedido --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <th>Imagen del Producto</th>
                        <th>Código del Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Tamaño del Producto</th>
                        <th>Color del Producto</th>
                        <th>Cantidad del Producto</th>
                    </tr>

                    @foreach ($orderDetails['orders_products'] as $product)
                        <tr>
                            <td>
                                @php
                                    $getProductImage = \App\Models\Product::getProductImage($product['product_id']);
                                @endphp
                                <a target="_blank" href="{{ url('product/' . $product['product_id']) }}">
                                    <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $getProductImage) }}">
                                </a>
                            </td>
                            <td>{{ $product['product_code'] }}</td>
                            <td>{{ $product['product_name'] }}</td>
                            <td>{{ $product['product_size'] }}</td>
                            <td>{{ $product['product_color'] }}</td>
                            <td>{{ $product['product_qty'] }}</td>
                        </tr>

                        @if ($product['courier_name'] != '')
                            <tr>
                                <td colspan="6">Nombre del Courier: {{ $product['courier_name'] }}, Número de Seguimiento: {{ $product['tracking_number'] }}</td>
                            </tr>
                        @endif

                    @endforeach
                </table>
        <div class="container">
            <div class="row">

              
                {{-- Mapa de Google para simular la trayectoria del pedido --}}
                <div class="container u-s-p-t-80">
                    <h3>La trayectoria de tu pedido</h3>
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>

                {{-- Tabla de información de la dirección de entrega --}}
      

            </div>
        </div>
                {{-- Tabla de información de la dirección de entrega --}}
                <table class="table table-striped table-borderless">
                    <tr class="table-danger">
                        <td colspan="2">
                            <strong>Dirección de Entrega</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>Ciudad</td>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>País</td>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>Código Postal</td>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>Móvil</td>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>

            </div>
        </div>
       
    </div>
    <!-- Página del Pedido /- -->



    {{-- Incluir el CSS y JS de Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    {{-- Script para inicializar el mapa con Leaflet --}}
    <script>
        // Crear el mapa y establecer la vista centrada en La Paz, Bolivia
        var map = L.map('map').setView([-16.504077, -68.131289], 13);

        // Agregar las capas de OpenStreetMap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Agregar un marcador en La Paz y mostrar un popup
        L.marker([-16.504077, -68.131289]).addTo(map)
            .bindPopup('Aquí está tu pedido.<br> ¡Sigue su trayectoria!')
            .openPopup();
    </script>
@endsection
