<x-app2>
    @section('title', 'Inicio')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="padding-bottom: 0">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Bienvenido al <span>Tablón del Espectador</span></h1>
            <h2>Aquí podrás compartir tus opiniones acerca de películas y series.</h2>
        </div>
    </section><!-- End Hero -->
    
    <main id="main">
        <section id="featured-services" class="featured-services" onclick="window.location.href='{{ url('/post') }}'" style="display: flex; justify-content: center; align-items: center;">
            <div class="container" data-aos="fade-up">
    
                @php
                    $delay = 0;
                    $espacio = 100;
                    $max = 400;
                @endphp
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5">
                        <div class="icon-box service-box text-center" data-aos="fade-up"
                            data-aos-delay="{{ $delay = ($delay % $max) + $espacio }}">
                            <div class="icon mb-4">
                                <svg class="iconos" viewBox="0 0 24 24" style="width: 50px; height: 50px;">
                                    <path fill="currentColor"
                                        d="M16.97 4.757a.999.999 0 0 0-1.918-.073l-3.186 9.554l-2.952-6.644a1.002 1.002 0 0 0-1.843.034L5.323 12H2v2h3.323c.823 0 1.552-.494 1.856-1.257l.869-2.172l3.037 6.835c.162.363.521.594.915.594l.048-.001a.998.998 0 0 0 .9-.683l2.914-8.742l.979 3.911A1.995 1.995 0 0 0 18.781 14H22v-2h-3.22l-1.81-7.243z"/>
                                </svg>
                            </div>
                            <h4 class="title">Ver publicaciones</h4>
                            <p class="description">Entra y sumérgete en las variadas opiniones de otras personas
                                sobre películas y series de tu interés.
                            </p>
                        </div>
                    </div>
                </div>
    
            </div>
        </section><!-- End Featured Services Section -->
    </main>
        <x-cfeui::footer/>
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        </body>
</x-app2>
