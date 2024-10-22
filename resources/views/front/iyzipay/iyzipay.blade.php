{{-- This page is rendered by iyzipay() method inside Front/IyzipayController.php --}}


@extends('front.layout.layout')



@section('content')

    <style>
        .button {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
        
        .button1 {background-color: #4CAF50;} /* Green */
        .button2 {background-color: #008CBA;} /* Blue */

        .disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
    </style>

    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Carrito</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Inicio</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Pago por tarjeta</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <form id="CVForm" action="javascript:;" method="post"> 
                        <div>
                            <label>Número de Tarjeta
                            <span class="astk">*</span>
                            <input type="text" id="CvNumber" class="text-field" placeholder="ej: 898*******" name="current_password" autocomplete="off" Required />
                            </label>
                        </div>
                        <div>
                            <label>Fecha de expiración
                            <span class="astk">*</span>
                            <input type="text" id="CvDate" class="text-field" placeholder="ej: 05/26" name="cvdate" autocomplete="off" Required/>
                            </label>
                        </div>
                        <div>
                            <label>Codigo de Seguridad
                            <span class="astk">*</span>
                            <input type="text" id="CvCode" class="text-field" placeholder="ej: 000" name="codeCv" autocomplete="off" Required/>
                            </label>
                        </div>
                        <div>
                            <label>Nit o Ci
                            <span class="astk">*</span>
                            <input type="text" id="NitCi" class="text-field" placeholder="ej: 8310****" name="NitCi" autocomplete="off" Required/>
                            </label>
                        </div>
                        <button id="botonVerCV" class="button button1" >Verificar Datos</button>
                    </form>
                    <a href="{{ url('iyzipay/pay') }}">
                        <button id="PayCV" class="button disabled" >Confirmar Pago</button>
                    </a>
                    <script>
                        const botonVerCV = document.getElementById('botonVerCV');
                        const PayCV = document.getElementById('PayCV');

                        CVForm.addEventListener('submit', function () {
                            PayCV.classList.add('button2');
                            PayCV.classList.remove('disabled');
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection