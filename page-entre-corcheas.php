<?php
/* Template Name: Entre Corcheas */
get_header();
?>

<div class="bg-white">

    <div class="relative  flex justify-center items-center h-96">
        <img class="w-full h-full absolute z-0  object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" alt="Fondo programación">
     <div class="absolute size-full bg-black/60"></div>
        <p class="z-10 relative  md:!text-6xl !text-2xl  text-gray-100 font-bold">Entre Corcheas</p>
    </div>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <p class="text-sm bg-yellow-400 inline-flex px-2 py-1 rounded-md font-semibold uppercase mb-2">
                Podcast
            </p>
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                Entre Corcheas
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A LAS 14 H
            </p>
            <p class="  mb-2 leading-tight">
                La música es ritmo, historia y pasión… y en <b><i>Entre Corcheas</i></b> tienen su espacio.
                Descubrí sonidos, conocé a los artistas y viví cada nota.
                Javier Mamy trae la historia, anécdotas y curiosidades de nuestros músicos y
                bandas

            </p>

           <div class="flex flex-wrap gap-3">
                <a class="flex items-center gap-2 bg-[#3b8a3b] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="tel:+2664361329">
                    <i class="fab fa-whatsapp">
                    </i>
                     2664361329
                </a>
                <a class="flex items-center gap-2 bg-[#3b5998] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.facebook.com/unslradio" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-facebook-f">
                    </i>
                    Radio Universidad Nacional de San Luis

                </a>
                <a class="flex items-center gap-2 bg-[#b72f8a] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.instagram.com/unslradio/?hl=es" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-instagram">
                    </i>
                    @unslradio

                </a>
            </div>
        </section>


        <?php
        mostrar_noticias_por_categoria('entre-corcheas');
        mostrar_podcasts_por_categoria('entre-corcheas');
        ?>
    </main>

</div>

<?php get_footer(); ?>