@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Productos</h4>

                            <a href="{{ url('admin/add-edit-product') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Agregar Producto</a>

                            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}}
                            {{-- Determinando si un elemento existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña de administrador sea exitosa: --}}
                            @if (Session::has('success_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="products" class="table table-bordered"> {{-- usando el id aquí para la DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del Producto</th>
                                            <th>Código del Producto</th>
                                            <th>Color del Producto</th>
                                            <th>Imagen del Producto</th>
                                            <th>Categoría</th> {{-- A través de la relación --}}
                                            <th>Sección</th>  {{-- A través de la relación --}}
                                            <!--th>Agregado por</th--> {{-- A través de la relación --}}
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product['id'] }}</td>
                                                <td>{{ $product['product_name'] }}</td>
                                                <td>{{ $product['product_code'] }}</td>
                                                <td>{{ $product['product_color'] }}</td>
                                                <td>
                                                    @if (!empty($product['product_image']))
                                                        <img style="width:120px; height:100px" src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}"> {{-- Muestra la imagen de 'tamaño pequeño' desde la carpeta 'small' --}}
                                                    @else
                                                        <img style="width:120px; height:100px" src="{{ asset('front/images/product_images/small/no-image.png') }}"> {{-- Muestra la imagen 'sin imagen': Si tienes, por ejemplo, una tabla con una columna 'images' (que puede existir o no existir), usa una 'Imagen Dummy' en caso de que no haya imagen. Ejemplo: https://dummyimage.com/ --}}
                                                    @endif
                                                </td>
                                                <td>{{ $product['category']['category_name'] }}</td> {{-- A través de la relación --}}
                                                <td>{{ $product['section']['name'] }}</td> {{-- A través de la relación --}}
                                                <!--td>
                                                    @if ($product['admin_type'] == 'vendor')
                                                        <a target="_blank" href="{{ url('admin/view-vendor-details/' . $product['admin_id']) }}">{{ ucfirst($product['admin_type']) }}</a>
                                                    @else
                                                        {{ ucfirst($product['admin_type']) }}
                                                    @endif
                                                </td-->
                                                <td>
                                                    @if ($product['status'] == 1)
                                                        <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Activo"></i> {{-- Iconos del Template Skydash Admin Panel --}}
                                                        </a>
                                                    @else {{-- si el estado del administrador es inactivo --}}
                                                        <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"> {{-- Usando atributos personalizados HTML. Ver admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactivo"></i> {{-- Iconos del Template Skydash Admin Panel --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a title="Editar Producto" href="{{ url('admin/add-edit-product/' . $product['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Iconos del Template Skydash Admin Panel --}}
                                                    </a>
                                                    <a title="Agregar Atributos" href="{{ url('admin/add-edit-attributes/' . $product['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-plus-box"></i> {{-- Iconos del Template Skydash Admin Panel --}}
                                                    </a>
                                                    <a title="Agregar Imágenes Múltiples" href="{{ url('admin/add-images/' . $product['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-library-plus"></i> {{-- Iconos del Template Skydash Admin Panel --}}
                                                    </a>

                                                    {{-- Confirmación de Eliminación JS alert y Sweet Alert --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="product" moduleid="{{ $product['id'] }}"> {{-- Ver admin/js/custom.js y web.php (rutas) --}}
                                                        <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Iconos del Template Skydash Admin Panel --}}
                                                    </a>
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
        </div>
        <!-- Fin del contenido -->
        <!-- parcial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">UMSA © 2024. Todos los derechos reservados.</span>
            </div>
        </footer>
        <!-- parcial -->
    </div>
@endsection
