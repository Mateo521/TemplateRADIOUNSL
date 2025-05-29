<?php
/* Template Name: La Locomotora */
get_header();
?>

<div class="bg-white">

    <img class="w-full" src="http://10.230.5.252/radiounsl/wp-content/uploads/2025/05/Captura-de-pantalla-2025-05-27-094945.png" alt="">

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                Baja un Cambio
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A VIERNES DE 18 A 21 H
            </p>
            <p class="  mb-2 leading-tight">
           <b> Staff:</b> Conducido por Hernán Corral e Ivana Pereyra. Juan Valdeón a cargo de la producción y de las noticias universitarias; Cristina Sosa frente de la información judicial; Gladys Aguilar de las noticias legislativas y de actualidad; y Danny Cayumán con entrevistas a bandas y artistas musicales. producción de Juan Valdeón.
            </p>
            <p class="  mb-2 leading-tight">
             <b>  Descripción:</b>  La Locomotora es el clásico de las tardes radiales de San Luis transmitiendo desde hace 23 años. Somos un programa que brinda información actualizada, noticias del entretenimiento y entrevistas de interés. Además, las columnas de deporte, espectáculo y una exquisita selección musical
            </p>
            <p class="  mb-6 leading-tight">
                Detrás, un gran equipo de profesionales que trabaja día tras día con dedicación para acompañar e informar a quienes escuchan.
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
            <h2 class=" sm:text-sm font-normal mb-4">Últimas noticias de Bajá un cambio</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $noticias_query = new WP_Query([
                    'category_name' => 'la-locomotora',
                    'posts_per_page' => 3,
                    'post_type' => 'post',
                ]);

                while ($noticias_query->have_posts()) : $noticias_query->the_post();
                ?>
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

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </section>



        <section>
            <h2 class=" sm:text-sm font-normal mb-4">Últimos podcasts de La Locomotora</h2>
            <div class="flex gap-3 overflow-x-auto pb-2">
                <?php
                $podcast_query = new WP_Query([
                    'category_name' => 'podcast,la-locomotora',
                    'posts_per_page' => 6,
                    'post_type' => 'post',
                ]);

                while ($podcast_query->have_posts()) : $podcast_query->the_post();
                ?>
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

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </section>

    </main>

</div>

<?php get_footer(); ?>