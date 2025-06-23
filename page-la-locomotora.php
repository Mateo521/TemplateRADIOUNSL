<?php
/* Template Name: La Locomotora */
get_header();
?>

<div class="bg-white">

    <div class="relative  flex justify-center items-center h-96">
        <img class="w-full h-full absolute z-0  object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" alt="Fondo programación">

        <p class="z-10 relative  md:!text-6xl !text-2xl  text-gray-100 bold">LA LOCOMOTORA</p>
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

        <section class="mb-10">
            <h2 class=" sm:text-sm font-normal mb-4">Últimas noticias de La Locomotora</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $noticias_query = new WP_Query([
                    'post_type' => 'noticias',
                    'posts_per_page' => 3,
                    'tax_query' => [
                        'relation' => 'AND',
                        [
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => ['la-locomotora'],
                            'operator' => 'IN',
                        ]
                    ],
                ]);


                while ($noticias_query->have_posts()) : $noticias_query->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>">
                        <article class="w-64 bg-white rounded shadow-sm overflow-hidden flex-shrink-0 flex flex-col">
                            <div class="relative w-full h-44">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                        class="w-full h-full object-cover" />
                                <?php endif; ?>

                                <div class="absolute right-0 bottom-0 p-1 flex items-center justify-center bg-black bg-opacity-50">
                                    <svg class="svgs" height="2em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="p-3 flex-1 flex flex-col justify-between">
                                <p class="text-sm text-[#2a6ad1] font-semibold uppercase mb-1">LA LOCOMOTORA</p>
                                <h3 class="text-xs sm:text-sm font-semibold leading-snug line-clamp-2">
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                        </article>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </section>



        <section>
            <h2 class=" sm:text-sm font-normal mb-4">Últimos podcasts de La Locomotora</h2>
            <div class="flex gap-3 overflow-x-auto pb-2">
                <?php
                $podcast_query = new WP_Query([
                    'post_type' => 'podcast',
                    'posts_per_page' => 6,
                    'tax_query' => [
                        [
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => ['la-locomotora'],
                        ],
                        'relation' => 'AND',
                    ],
                ]);

                while ($podcast_query->have_posts()) : $podcast_query->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>">
                        <article class="w-64 bg-white rounded shadow-sm overflow-hidden flex-shrink-0 flex flex-col">
                            <div class="relative w-full h-44">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                        class="w-full h-full object-cover" />
                                <?php endif; ?>

                                <div class="absolute right-0 bottom-0 p-1 flex items-center justify-center bg-black bg-opacity-50">
                                    <svg class="svgs" height="2em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="p-3 flex-1 flex flex-col justify-between">
                                <p class="text-sm text-[#2a6ad1] font-semibold uppercase mb-1">LA LOCOMOTORA</p>
                                <h3 class="text-xs sm:text-sm font-semibold leading-snug line-clamp-2">
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                        </article>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </section>

    </main>

</div>

<?php get_footer(); ?>