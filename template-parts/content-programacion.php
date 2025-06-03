<?php



/*
Template Name: Plantilla de Podcasts
*/

get_header();

?>
<!-- TITULO -->
<div class="flex justify-center md:gap-12 gap-3 items-baseline" style="background-color: #F5F5F5; padding:15px 0;">
  <h1 id="titulo-categoria" class="font-bold" style=" font-family: 'Antonio', sans-serif; color:#07376A;">PROGRAMACIÓN</h1>
  <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-4.png" alt="">
</div>
<!-- FINTITULO -->
<div>
  <img class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-2.png" alt="">
</div>
<div class="flex justify-center p-8 bg-white">
  <section class="max-w-7xl w-full">
    <!-- Lunes a viernes heading -->
    <h2 id="toggle-lunes" class="text-sm font-semibold text-[#003366] flex items-center gap-1 mb-6 cursor-pointer select-none">
      Lunes a viernes
      <i class="fas fa-chevron-up text-[#003366] text-xs transition-transform duration-300" id="icon-lunes">
      </i>
    </h2>
    <!-- Grid for Lunes a viernes -->
    <div id="content-lunes" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 transition-height" style="height:auto; opacity:1;">
      <!-- Card 1 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Nada secreto logo in white italic text on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/9e28573b-1aba-4fa6-220d-c0e6a9337bc4.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Nada secreto
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            7 a 9:30 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      <!-- Card 2 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Sonido urbano white logo on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/db445afd-e676-46a8-f572-c32c2219f7ad.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Sonido urbano
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            9:30 a 12 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      <!-- Card 3 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="La locomotora white logo on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/58889d7e-3bdb-454c-f692-d284048282f2.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            La locomotora
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            17 a 19 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      <!-- Card 4 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Rock del país white logo on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/b5c16a95-9a1a-4b23-03e3-73fb2ee335f0.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Rock del país
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            21:30 a 23 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      <!-- Card 5 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Rock del país white logo on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/b5c16a95-9a1a-4b23-03e3-73fb2ee335f0.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Rock del país
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            21:30 a 23 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
      <!-- Card 6 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
        <img alt="Rock del país white logo on black background with microphone" class="w-full h-40 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/b5c16a95-9a1a-4b23-03e3-73fb2ee335f0.jpg" width="600" />
        <div class="p-4">
          <h3 class="text-sm font-semibold text-[#003366] mb-1">
            Rock del país
          </h3>
          <p class="text-xs text-[#0056b3] mb-0.5">
            Lunes a viernes
          </p>
          <p class="text-xs text-gray-700 mb-0 flex justify-between items-center">
            21:30 a 23 h
            <i class="fas fa-chevron-right text-gray-400 text-xs">
            </i>
          </p>
        </div>
      </article>
    </div>
    <!-- Sábados heading -->
    <h2 id="toggle-sabados" class="text-sm font-semibold text-[#003366] flex items-center gap-1 mb-6 cursor-pointer select-none">
      Sábados
      <i class="fas fa-chevron-up text-[#003366] text-xs transition-transform duration-300" id="icon-sabados">
      </i>
    </h2>
    <!-- Grid for Sábados -->
    <div id="content-sabados" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 transition-height" style="height:auto; opacity:1;">
      <!-- Card 1 -->
      <article class="bg-white rounded-md shadow-sm overflow-hidden">
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
      <!-- Card 2 -->
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
      <!-- Card 3 -->
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
      </article>
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
    color: #07376A;
    font-weight: 700;

  }

  .current {
    background-color: #A9A9A9;
    padding: 5px 15px;
    border-radius: 4px;
  }
</style>






<?php get_footer(); ?>