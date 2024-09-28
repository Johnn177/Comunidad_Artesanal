@extends('admin.layout.layout')


@section('content')
    <div class="main-p<div class="contenanel">
        t-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                
                 <!-- Sección de detalles del vendedor -->
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Detalles del Vendedor</h3>
                            <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/admins/vendor') }}">Volver a Vendedores</a></h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <!-- Botón de selección de fechas -->
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Hoy (10 Ene 2021)
                                    </button>
                                    <!-- Menú desplegable con opciones de fechas -->
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">Enero - Marzo</a>
                                        <a class="dropdown-item" href="#">Marzo - Junio</a>
                                        <a class="dropdown-item" href="#">Junio - Agosto</a>
                                        <a class="dropdown-item" href="#">Agosto - Noviembre</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    
                </div>
            </div>
            ////
            <div class="row">
                /
                <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Información Personal</h4>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly> <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            </div>
            <div class="form-group">
                <label for="vendor_name">Nombre</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}" readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_address">Dirección</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_city">Ciudad</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_state">Estado</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_country">País</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_pincode">Código Postal</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_mobile">Móvil</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile'] }}" readonly>
            </div>
            @if (!empty($vendorDetails['image']))
                <div class="form-group">
                    <label for="vendor_image">Foto del Vendedor</label>
                    <br>
                    <img style="width: 200px" src="{{ url('admin/images/photos/' . $vendorDetails['image']) }}">
                </div>
            @endif
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Información del Negocio</h4>
            <div class="form-group">
                <label for="vendor_name">Nombre de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_name'])) value="{{ $vendorDetails['vendor_business']['shop_name'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_address">Dirección de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_address'])) value="{{ $vendorDetails['vendor_business']['shop_address'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_city">Ciudad de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_city'])) value="{{ $vendorDetails['vendor_business']['shop_city'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_state">Estado de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_state'])) value="{{ $vendorDetails['vendor_business']['shop_state'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_country">País de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_country'])) value="{{ $vendorDetails['vendor_business']['shop_country'] }}" @endif readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_pincode">Código Postal de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_pincode'])) value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_mobile">Teléfono de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_mobile'])) value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" @endif  readonly>
            </div>
            <div class="form-group">
                <label for="vendor_mobile">Sitio Web de la Tienda</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_website'])) value="{{ $vendorDetails['vendor_business']['shop_website'] }}" @endif  readonly>
            </div>
            <div class="form-group">
                <label>Email de la Tienda</label>
                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_email'])) value="{{ $vendorDetails['vendor_business']['shop_email'] }}" @endif  readonly> <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            </div>
            <div class="form-group">
                <label>Número de Licencia Comercial</label>
                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['business_license_number'])) value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" @endif  readonly> <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            </div>
            <div class="form-group">
                <label>Número GST</label>
                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['gst_number'])) value="{{ $vendorDetails['vendor_business']['gst_number'] }}" @endif  readonly> <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            </div>
            <div class="form-group">
                <label>Número PAN</label>
                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['pan_number'])) value="{{ $vendorDetails['vendor_business']['pan_number'] }}" @endif  readonly> <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            </div>
            <div class="form-group">
                <label>Prueba de Dirección</label>
                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['address_proof'])) value="{{ $vendorDetails['vendor_business']['address_proof'] }}" @endif  readonly> <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            </div>
            @if (!empty($vendorDetails['vendor_business']['address_proof_image']))
                <div class="form-group">
                    <label for="vendor_image">Imagen de Prueba de Dirección</label>
                    <br>
                    <img style="width: 200px" src="{{ url('admin/images/proofs/' . $vendorDetails['vendor_business']['address_proof_image']) }}">
                </div>
            @endif
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Información Bancaria</h4>
            <div class="form-group">
                <label for="vendor_name">Nombre del Titular de la Cuenta</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['account_holder_name'])) value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_name">Nombre del Banco</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['bank_name'])) value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_address">Número de Cuenta</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['account_number'])) value="{{ $vendorDetails['vendor_bank']['account_number'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
            <div class="form-group">
                <label for="vendor_city">Código IFSC del Banco</label>
                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['bank_ifsc_code'])) value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" @endif  readonly> {{-- $vendorDetails fue pasado desde AdminController --}}
            </div>
        </div>
    </div>
</div>

/

{{-- Módulo de Comisiones: Cada vendedor debe pagar una cierta comisión (que puede variar de un vendedor a otro) al propietario del sitio web (administrador) por cada artículo vendido, y es definida por el propietario del sitio web (administrador) --}}
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Información de Comisiones</h4>

            {{-- Nuestro código de error de Bootstrap en caso de que la contraseña actual sea incorrecta o las nuevas contraseñas no coincidan: --}}
            {{-- Determinando si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            @if (Session::has('error_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            {{-- Mostrando los Errores de Validación de Laravel: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors Y https://laravel.com/docs/9.x/blade#validation-errors --}}
            {{-- Determinando si un ítem existe en la sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
            @if (Session::has('success_message')) <!-- Verifica el método updateAdminPassword() en AdminController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="form-group">
                <label for="vendor_name">Comisión por artículo de pedido (%)</label>
                <form method="post" action="{{ url('admin/update-vendor-commission') }}">
                    @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                    <input type="hidden" name="vendor_id" value="{{ $vendorDetails['vendor_personal']['id'] }}">
                    <input class="form-control" type="text" name="commission" @if (isset($vendorDetails['vendor_personal']['commission'])) value="{{ $vendorDetails['vendor_personal']['commission'] }}" @endif required> {{-- $vendorDetails fue pasado desde AdminController --}}
                    <br>
                    <button type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

            ////
            </div>
<!-- Fin del contenedor de contenido -->
@include('admin.layout.footer')
<!-- parcial -->
</div>
@endsection

