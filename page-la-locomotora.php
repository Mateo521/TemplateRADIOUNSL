<?php
/* Template Name: La Locomotora */
get_header();
?>

<div class="bg-white">

    <div class="relative  flex justify-center items-center h-96">
        <img class="w-full h-full absolute z-0  object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" alt="Fondo programación">
     <div class="absolute size-full bg-black/60"></div>
        <p class="z-10 relative  md:!text-6xl !text-2xl  text-gray-100 font-bold">LA LOCOMOTORA</p>
    </div>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                LA LOCOMOTORA
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A VIERNES DE 15 A 18 H
            </p>
            <p class="  mb-2 leading-tight">
                <b> Staff:</b> Conducción Ivana Pereyra y Juan Valdeón y cuenta con la producción general de Lucas Gallardo. También son parte del equipo de La Locomotora, Mauricio Di Pasquale, María Laura Campo, Danny Cayumán. La selección musical está a cargo de Emilio Gómez. También participan semanalmente los periodistas Oscar Flores y Cristina Sosa, con columnas de análisis de noticias.

            </p>
            <p class="  mb-2 leading-tight">
                <b>Descripción:</b> El programa La Locomotora es un magazine periodístico que se emite de manera continua desde el año 1999.
            </p>
            <p class="  mb-6 leading-tight">
                La Locomotora ha recorrido sus viajes durante 26 años en las tardes de Radio Universidad. Actualmente es uno de los programas más consolidados de la emisora universitaria y uno de los más elegidos por la audiencia puntana. </p>
            <p class="  mb-6 leading-tight">
                El programa fue nominado en reiteradas oportunidades al Premio Faro de Oro, Gaviota de Oro y Gaviota Federal, de Mar del Plata. Y fue ganador del premio Juan Pascual Pringles como Mejor Programa de Interés General y premio Juan Pascual Pringles de Oro.
            </p>
            <p class="  mb-6 leading-tight">
                En marzo del año 2018, La Locomotora fue galardonada por la Fundación Puntanos Ilustres, por su aporte a la cultura puntana, en una gala que se llevó a cabo en el Museo Dora Ochoa de Masramón.

            </p>
            <div class="flex flex-wrap gap-3">
                <a class="flex items-center gap-2 bg-[#3b8a3b] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="tel:+2664555555">
                    <i class="fab fa-whatsapp">
                    </i>
                    2664555555
                </a>
                <a class="flex items-center gap-2 bg-[#3b5998] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.facebook.com/LaLocomotora2021" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-facebook-f">
                    </i>
                    LaLocomotora2021
                </a>
                <a class="flex items-center gap-2 bg-[#b72f8a] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.instagram.com/lalocomotorasl" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-instagram">
                    </i>
                    lalocomotorasl
                </a>
            </div>
        </section>

         <?php
        mostrar_noticias_por_categoria('la-locomotora');
        mostrar_podcasts_por_categoria('la-locomotora');
        ?>

    </main>

</div>

<?php get_footer(); ?>