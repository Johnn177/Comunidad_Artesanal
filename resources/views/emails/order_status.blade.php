{{-- Este es el archivo de correo electrónico "Actualizar el estado del pedido" enviado por 'admin' utilizando Mailtrap --}}
{{-- Todas las variables (como $name, $mobile, $email, ...) utilizadas aquí son pasadas desde el método updateOrderStatus() en Admin/OrderController.php --}}

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table style="width: 700px">
            <tr><td>&nbsp;</td></tr>
            <tr><td><img src="{{ asset('front/images/main-logo/main-logo.png') }}"></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Hola {{ $name }}</td></tr>
            <tr><td>&nbsp;<br></td></tr>
            <tr><td>El estado de su pedido #{{ $order_id }} ha sido actualizado a {{ $order_status }}</td></tr>
            <tr><td>&nbsp;</td></tr>

            @if (!empty($courier_name) && !empty($tracking_number))
                <tr>
                    <td>El nombre del mensajero es {{ $courier_name }} y el número de seguimiento es {{ $tracking_number }}</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            @endif

            <tr><td>Los detalles de su pedido son los siguientes:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table style="width: 95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td>Nombre del Producto</td>
                        <td>Código del Producto</td>
                        <td>Tamaño del Producto</td>
                        <td>Color del Producto</td>
                        <td>Cantidad del Producto</td>
                        <td>Precio del Producto</td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $order)
                        <tr bgcolor="#f9f9f9">
                            <td>{{ $order['product_name'] }}</td>
                            <td>{{ $order['product_code'] }}</td>
                            <td>{{ $order['product_size'] }}</td>
                            <td>{{ $order['product_color'] }}</td>
                            <td>{{ $order['product_qty'] }}</td>
                            <td>{{ $order['product_price'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right">Gastos de Envío</td>
                        <td>INR {{ $orderDetails['shipping_charges'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Descuento del Cupón</td>
                        <td>
                            INR
                            @if ($orderDetails['coupon_amount'] > 0)
                                {{ $orderDetails['coupon_amount'] }}
                            @else
                                0
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Total General</td>
                        <td>INR {{ $orderDetails['grand_total'] }}</td>
                    </tr>
                </table>
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table>
                    <tr>
                        <td><strong>Dirección de Entrega:</strong></td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>    
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Para cualquier consulta, puede contactarnos en <a href="mailto:info@MultiVendorEcommerceApplication.com.eg">info@MultiVendorEcommerceApplication.com.eg</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Saludos,<br>Equipo de la Aplicación de Comercio Electrónico Multi-vendedor</td></tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </body>
</html>
