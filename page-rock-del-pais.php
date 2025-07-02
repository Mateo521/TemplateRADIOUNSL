<?php
/* Template Name: ROCK DEL PAÍS */
get_header();
?>

<div class="bg-white">

    <div class="relative  flex justify-center items-center h-96">
        <img class="w-full h-full absolute z-0  object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" alt="Fondo programación">
        <div class="absolute size-full bg-black/60"></div>
        <p class="z-10 relative  md:!text-6xl !text-2xl  text-gray-100 font-bold">ROCK DEL PAÍS</p>
    </div>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                ROCK DEL PAÍS
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A VIERNES DE 21 A 23 H
            </p>
            <p class="  mb-2 leading-tight">
                <b> Staff: </b> Conducción y producción general Danny Cayuman. Operación técnica
                Gustavo Altamira y Ricardo Ayala
            </p>
            <p class="  mb-2 leading-tight">
                <b>Descripción:</b>
                Rock del País es un programa de rock que se emite desde hace
                16 años en Radio Universidad Nacional de San Luis . Rock del País es el
                programa diario más longevo de la región, tiene más de 200 entrevistas a
                bandas nacionales e internacionales por año, se destaca también la presencia
                del programa en redes sociales y las presentaciones de discos y singles de
                manera exclusiva. <br><br>
                Rock del País ha sido desde un primer momento el primer programa de rock de
                San Luis que dio lugar a bandas de la provincia de San Luis a través de la
                difusión del material grabado por las mismas, como así también de entrevistas,
                acústicos y promoción de recitales. Siempre se tiene como eje para el
                programa el desarrollo de la cultura rock de San Luis.
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
        mostrar_noticias_por_categoria('rock-del-pais');
        mostrar_podcasts_por_categoria('rock-del-pais');
        ?>

    </main>

</div>

<?php get_footer(); ?>