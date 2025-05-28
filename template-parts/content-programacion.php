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
    <div class="max-w-screen-xl w-full">


    <!-- ACORDION -->
    
<div id="accordion-collapse" data-accordion="collapse">
  <h2 id="accordion-collapse-heading-1">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
      <span  style="color:#07376A;" class="font-bold">Lunes a Viernes</span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
     

    <!-- SECCIONPROGRAMACION -->

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Nada Secreto logo white italic text on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/08b5ca9e-ca26-4783-6594-e4ca92b3a894.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Nada secreto
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      7 a 9:30 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Sonido Urbano logo white bold text with city skyline and microphone in studio background" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/c2ab6dd0-90f0-46c7-6992-f93151e24fb0.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Sonido urbano
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      9:30 a 12 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="La Locomotora logo white train icon and text on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/e5257a93-5b91-4cab-8ede-e68c43f74066.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      La locomotora
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      17 a 19 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Rock del País logo white text with stars and lightning bolts on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/35a257b7-b858-4d45-b499-9c34f9fb1195.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Rock del país
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      21:30 a 23 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Rock del País logo white text with stars and lightning bolts on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/35a257b7-b858-4d45-b499-9c34f9fb1195.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Rock del país
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      21:30 a 23 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Rock del País logo white text with stars and lightning bolts on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/35a257b7-b858-4d45-b499-9c34f9fb1195.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Rock del país
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      21:30 a 23 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
  </div>

<!-- FINSECCIONPROGRAMACION -->


    </div>
  </div>
  <h2 id="accordion-collapse-heading-2">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
      <span   style="color:#07376A;" class="font-bold">Sábados</span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
    </button>
  </h2>
  <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
      



    <!-- SECCIONPROGRAMACION -->
   <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Nada Secreto logo white italic text on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/08b5ca9e-ca26-4783-6594-e4ca92b3a894.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Nada secreto
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      7 a 9:30 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Sonido Urbano logo white bold text with city skyline and microphone in studio background" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/c2ab6dd0-90f0-46c7-6992-f93151e24fb0.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Sonido urbano
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      9:30 a 12 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="La Locomotora logo white train icon and text on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/e5257a93-5b91-4cab-8ede-e68c43f74066.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      La locomotora
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      17 a 19 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Rock del País logo white text with stars and lightning bolts on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/35a257b7-b858-4d45-b499-9c34f9fb1195.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Rock del país
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      21:30 a 23 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Rock del País logo white text with stars and lightning bolts on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/35a257b7-b858-4d45-b499-9c34f9fb1195.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Rock del país
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      21:30 a 23 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
   <article class="bg-white rounded-md shadow-md overflow-hidden">
    <img alt="Rock del País logo white text with stars and lightning bolts on black transparent background over microphone in studio" class="w-full h-48 object-cover" height="200" src="https://storage.googleapis.com/a1aa/image/35a257b7-b858-4d45-b499-9c34f9fb1195.jpg" width="600"/>
    <div class="p-4">
     <h3 class="text-sm font-semibold text-[#0c2e5a] mb-1">
      Rock del país
     </h3>
     <p class="text-sm text-blue-600 mb-0.5 cursor-pointer">
      Lunes a viernes
     </p>
     <p class="text-sm text-[#0c2e5a] flex items-center justify-between">
      21:30 a 23 h
      <i class="fas fa-chevron-right text-sm">
      </i>
     </p>
    </div>
   </article>
  </div>
<!-- FINSECCIONPROGRAMACION -->




</div>
  </div>
</div>

    <!-- FINACORDION -->



    </div>
</div>
<style>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Encuentra el elemento del subtítulo por su id
        var fecha = document.getElementById('horario');
        var otraUbicacionContainer_3 = document.querySelector('.horarios');
        // Mueve el subtítulo al nuevo contenedor
        fecha.appendChild(otraUbicacionContainer_3);
    });
</script>
<?php wp_reset_postdata(); // Restaurar datos originales de la consulta 
?>




<?php get_footer(); ?>