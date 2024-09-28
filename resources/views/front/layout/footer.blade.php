<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                Para ofertas especiales y otra información de descuentos
            </h6>
            <h1>
                Suscríbete a Nuestro Boletín
            </h1>
            <p>
                Suscríbete a la lista de correo para recibir actualizaciones sobre promociones, nuevos llegados, descuentos y cupones.
            </p>

            <form class="newsletter-form">
                <label class="sr-only" for="subscriber_email">Ingresa tu Email</label>
                <input type="text" placeholder="Tu Dirección de Email" id="subscriber_email" name="subscriber_email" required> {{-- Usaremos el atributo id global de HTML en jQuery en front/js/custom.js --}} 
                <button type="button" class="button" onclick="addSubscriber()">ENVIAR</button> {{-- Verifica la función addSubscriber() en front/js/custom.js. La utilizaremos junto con el id="subscriber_email" del campo <input> --}}
            </form>

        </div>
        <!-- Outer-Footer /- -->
        
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>EMPRESA</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us') }}">Sobre Nosotros</a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">Contáctanos</a>
                            </li>
                            <li>
                                <a href="{{ url('faq') }}">Preguntas Frecuentes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COLECCIÓN</h6>
                        <ul>
                            <li>
                                <a href="{{ url('men') }}">Ropa de Hombre</a>
                            </li>
                            <li>
                                <a href="{{ url('women') }}">Ropa de Mujer</a>
                            </li>
                            <li>
                                <a href="{{ url('kids') }}">Ropa de Niños</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>CUENTA</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">Mi Cuenta</a>
                            </li>
                            <li>
                                <a href="{{ url('user/orders') }}">Mis Pedidos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Contacto</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>Aplicación de Comercio Electrónico Multivendedor</span>
                            </li>
                            <li>
                                <a href="tel:+201255845857">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>+01255845857</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@multi-vendore-commerce.com">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                info@multi-vendore-commerce.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Derechos UMSA &copy; 2024
                <a target="_blank" rel="nofollow" href="#">Aplicación de Comercio Artesanal</a> | Todos los Derechos Reservados
            </p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
<!-- Footer /- -->
