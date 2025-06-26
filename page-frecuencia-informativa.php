<?php
/* Template Name: FRECUENCIA INFORMATIVA */
get_header();
?>

<div class="bg-white">

    <div class="relative  flex justify-center items-center h-96">
        <img class="w-full h-full absolute z-0  object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" alt="Fondo programación">
     <div class="absolute size-full bg-black/60"></div>
        <p class="z-10 relative  md:!text-6xl !text-2xl  text-gray-100 font-bold">FRECUENCIA INFORMATIVA</p>
    </div>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                FRECUENCIA INFORMATIVA
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A VIERNES DE <br> 10 A 10:15 H <br> 12 A 12:15 H <br> 16 A 16:15 H <br> 20 A 20:15 H
            </p>
            <p class="  mb-2 leading-tight">
             <b>  Staff:</b>  Conducción de Leonardo Mancuello, Ada Arena, Pablo Almada e Ivana
                Pereyra. Producción Hernán Corral y Mauricio Di Pasquale.

            </p>
            <p class="  mb-2 leading-tight">
              <b>Descripción:</b>  Es un informativo con más de 30 años al aire. Desde 2025
                cuenta con cuatro ediciones de 15 minutos, brindando información local,
                universitaria, nacional e internacional. Además boletines cada 30 minutos,
                durante toda la jornada
            </p>
            <div class="flex flex-wrap gap-3">
                <a class="flex items-center gap-2 bg-[#3b8a3b] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="tel:+2664555555">
                    <i class="fab fa-whatsapp">
                    </i>
                    2664555555
                </a>
                <a class="flex items-center gap-2 bg-[#3b5998] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.facebook.com/unslradio" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-facebook-f">
                    </i>
                    Radio Universidad Nacional de San Luis

                </a>
                <a class="flex items-center gap-2 bg-[#b72f8a] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.instagram.com/unslradio/?hl=es" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-instagram">
                    </i>
                    unslradio

                </a>
            </div>
        </section>

       
         <?php
        mostrar_noticias_por_categoria('frecuencia-informativa');
        mostrar_podcasts_por_categoria('frecuencia-informativa');
        ?>

    </main>

</div>

<?php get_footer(); ?>