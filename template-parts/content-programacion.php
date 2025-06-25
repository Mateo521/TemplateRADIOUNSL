<?php



/*
Template Name: Plantilla de Podcasts
*/

get_header();

?>
<!-- TITULO -->
<div class="flex justify-center md:gap-12 gap-3 items-baseline" style="background-color: #F5F5F5; padding:15px 0;">
  <h1 id="titulo-categoria" class="font-bold" style=" font-family: 'Antonio', sans-serif; color:#486faf;">PROGRAMACIÓN</h1>
  <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-4.png" alt="">
</div>
<!-- FINTITULO -->
<div>
  <img class="w-full h-[280px] md:h-[550px] object-cover object-center" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-2.jpg" alt="">
</div>
<div class="flex justify-center p-8 bg-white">
  <section class="max-w-7xl w-full">
    <!-- Lunes a viernes heading -->
    <h2 id="toggle-lunes" class="text-sm font-semibold text-[#003366] flex items-center gap-1 mb-6 cursor-pointer select-none">
      Lunes a viernes
      <i class="fas fa-chevron-up text-[#003366] rotate-180 text-xs transition-transform duration-300" id="icon-lunes">
      </i>
    </h2>
    <!-- Grid for Lunes a viernes -->
    <div id="content-lunes" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 py-2 transition-height" style="height:auto; opacity:1;">
      <!-- Card 1 -->
     <a href="<?php echo esc_url(home_url('/programacion/nada-secreto')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
          <img alt="Nada secreto" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/nada-secreto.png" width="600" />
          <div class="p-4">
            <h3 class="text-sm font-semibold text-[#003366] mb-1">
              Nada secreto
            </h3>
            <p class="text-xs text-[#0056b3] mb-0.5">
              Lunes a viernes
            </p>
            <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
              7 a 9 h
              <i class="fas fa-chevron-right text-gray-400 text-xs">
              </i>
            </p>
          </div>
        </article>
      </a>
      <!-- Card 2 -->
      <a href="<?php echo esc_url(home_url('/programacion/haciendo-ruido')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Haciendo Ruido" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/haciendo-ruido.png" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Haciendo Ruido
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            9 a 13 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      </a>
      <!-- Card 3 -->
      <a href="<?php echo esc_url(home_url('/programacion/la-locomotora')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Sonido Urbano" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/la-locomotora.png" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            La locomotora
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            15 a 18 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      </a>
      <!-- Card 4 -->
      <a href="<?php echo esc_url(home_url('/programacion/rock-del-pais')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Rock del país" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/rock-del-pais.png" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Rock del país
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            21 a 23 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      </a>
      <!-- Card 5 -->
      <a href="<?php echo esc_url(home_url('/programacion/baja-un-cambio')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Bajá un cambio" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/baja-un-cambio.png" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Bajá un cambio
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            18:00 a 21 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      </a>
      <!-- Card 6 -->
      <a href="<?php echo esc_url(home_url('/programacion/solo-un-cafe')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Solo un café" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/solo-un-cafe.png" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Solo Un Café
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            13 a 14 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      </a>

      <!-- Card 6 -->
      <a href="<?php echo esc_url(home_url('/programacion/frecuencia-informativa')); ?>">
        <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Solo un café" class="w-full h-40 object-cover" height="200" src="<?php echo get_template_directory_uri(); ?>/assets/images/institucional/frecuencia-informativa.png" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Frecuencia Informativa
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            10 a 10:15 h <br>
            12 a 12:15 h <br>
            16 a 16:15 h <br>
            20 a 20:15 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      </a>
    </div>
    <!-- Sábados heading -->
    <h2 id="toggle-sabados" class="text-sm font-semibold text-[#003366] flex items-center gap-1 mb-6 cursor-pointer select-none">
      Sábados
      <i class="fas fa-chevron-up text-[#003366] text-xs rotate-180 transition-transform duration-300" id="icon-sabados">
      </i>
    </h2>

    
    <div id="content-sabados" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 transition-height" style="height:auto; opacity:1;">
   
      <!--article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Rock Nacional text on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/813d1b14-d728-4b95-c7a6-0c9008120ccd.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Rock Nacional
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Sábados
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            8 a 9 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
   
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Sonidos de Latinoamérica text on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/a102de11-aa9e-4279-5f08-2272cfe48b3a.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Sonidos de Latinoamérica
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Sábados
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            9 a 10 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
    
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Tangos y milongas text on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/eb016dd2-bece-45c4-28fe-897dcc805b71.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Tangos y milongas
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Sábados
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            10 a 11 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article-->
    </div>
  </section>
</div>


<style>
  .transition-height {
    transition-property: height, opacity;
    transition-duration: 300ms;
    transition-timing-function: ease;
    overflow: hidden;
  }


  .next,
  .prev {
    color: #486faf;
    font-weight: 700;

  }

  .current {
    background-color: #A9A9A9;
    padding: 5px 15px;
    border-radius: 4px;
  }
</style>






<?php get_footer(); ?>