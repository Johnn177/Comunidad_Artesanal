{{-- Esta página se accede desde la pestaña de Inicio de Sesión de Cliente en el menú desplegable en el encabezado (en front/layout/header.blade.php) --}}
@extends('front.layout.layout')

@section('content')
    <!-- Contenedor de Introducción de Página -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cuenta</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Cuenta</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contenedor de Introducción de Página /- -->
    <!-- Página de Cuenta -->
    <div class="page-account u-s-p-t-80">
        <div class="container">

            {{-- Mostrando los Errores de Validación: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}
            {{-- Determinando Si Un Elemento Existe En La Sesión (usando el método has()): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Nuestro mensaje de éxito de Bootstrap en caso de que la actualización de la contraseña del administrador sea exitosa: --}}
            {{-- Mostrando Mensaje de Éxito --}}
            @if (Session::has('success_message')) {{-- Verifica el método userRegister() en Front/UserController.php --}}
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Mostrando Mensajes de Error --}}
            @if (Session::has('error_message')) {{-- Verifica el método userRegister() en Front/UserController.php --}}
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Mostrando Mensajes de Error --}}
            @if ($errors->any()) {{-- Verifica el método userRegister() en Front/UserController.php --}}
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <!-- Inicio de Sesión -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Inicio de Sesión</h2>
                        <h6 class="account-h6 u-s-m-b-30">¡Bienvenido de nuevo! Inicia sesión en tu cuenta.</h6>

                        {{-- Nota: Para mostrar los Mensajes de Error de Validación del formulario (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend), creamos una etiqueta <p> después de cada campo <input> --}}
                        {{-- Estructuramos y usamos un cierto patrón para que el patrón de id de la <p> debe ser como: delivery-x (por ejemplo, delivery-mobile, delivery-email, ... para que el bucle de jQuery funcione. Y x debe ser idéntico a los atributos HTML 'name' (por ejemplo, el <input> con el atributo HTML name='mobile' debe tener una <p> con un atributo HTML id id="delivery-mobile") para que cuando el array de errores de validación se envíe como respuesta desde el backend/servidor (ver $validator->messages() dentro del método dentro del controlador) a la solicitud AJAX, puedan ser manejados de manera conveniente/fácil por el bucle jQuery $.each(). Ver front/js/custom.js --}}
                        <p id="login-error"></p> {{-- si la validación pasa / está bien, pero las credenciales de inicio de sesión proporcionadas por el usuario son incorrectas, esto se usará por jQuery para mostrar un mensaje genérico de '¡Credenciales Incorrectas!'. O para mostrar un mensaje cuando la cuenta del usuario está inactiva/deshabilitada/desactivada --}}
                        <form id="loginForm" action="javascript:;" method="post"> {{-- Necesitamos desactivar el atributo 'action' HTML (usando 'javascript:;') ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
                            @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                            <div class="u-s-m-b-30">
                                <label for="user-email">Correo Electrónico
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field" placeholder="Correo Electrónico" name="email">
                                <p id="login-email"></p> {{-- esto se usará por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password">Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" class="text-field" placeholder="Contraseña" name="password">
                                <p id="login-password"></p> {{-- esto se usará por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend) --}}
                            </div>

                            <div class="group-inline u-s-m-b-30">
                                {{-- Funcionalidad de Recordar Contraseña --}}
                                {{-- <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Recuérdame</label>
                                </div> --}}

                                {{-- Funcionalidad de Olvidé mi Contraseña --}} 
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="{{ url('user/forgot-password') }}">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>¿Perdiste tu contraseña?
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Inicio de Sesión /- -->

                <!-- Registro -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Registro</h2>
                        <h6 class="account-h6 u-s-m-b-30">Registrarse en este sitio te permite acceder a tu estado de pedidos e historial.</h6>

                        {{-- Mensaje de Éxito de Registro usando jQuery. Ver front/js/custom.js --}} 
                        <p id="register-success"></p>

                        <form id="registerForm" action="javascript:;" method="post"> {{-- Necesitamos desactivar el atributo 'action' HTML (usando 'javascript:;') ya que vamos a enviar usando una llamada AJAX. Ver front/js/custom.js --}}
                            @csrf {{-- Previniendo Solicitudes CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                            <div class="u-s-m-b-30">
                                <label for="username">Nombre
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" class="text-field" placeholder="Nombre de Usuario" name="name">
                                <p id="register-name"></p> {{-- esto se usará por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-email">Correo Electrónico
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" class="text-field" placeholder="Correo Electrónico" name="email">
                                <p id="register-email"></p> {{-- esto se usará por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password">Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" class="text-field" placeholder="Contraseña" name="password">
                                <p id="register-password"></p> {{-- esto se usará por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-confirm-password">Confirmar Contraseña
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-confirm-password" class="text-field" placeholder="Confirmar Contraseña" name="confirm_password">
                                <p id="register-confirm-password"></p> {{-- esto se usará por jQuery para mostrar los Mensajes de Error de Validación (Mensajes de Error de Validación de Laravel) desde la respuesta de llamada AJAX del servidor (backend) --}}
                            </div>

                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Registro /- -->
            </div>
        </div>
    </div>
    <!-- Página de Cuenta /- -->
@endsection
