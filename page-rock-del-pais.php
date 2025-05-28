<?php
/* Template Name: ROCK DEL PAÍS */
get_header();
?>

<div class="bg-white">

    <img class="w-full" src="http://10.230.5.252/radiounsl/wp-content/uploads/2025/05/Captura-de-pantalla-2025-05-27-094945.png" alt="">

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                ROCK DEL PAÍS
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A VIERNES DE 7 A 9 H
            </p>
            <p class="  mb-2 leading-tight">
                Staff: Producción general y conducción de Mario Otero. En la producción e
                informes especiales, Verónica Miranda. La información judicial Cristina Sosa.
                Desde exteriores participa Gladys Aguilar. La locución es de Leonardo
                Mancuello. El operador técnico es Rodrigo Moraga
            </p>
            <p class="  mb-2 leading-tight">
                Es un programa "típicamente periodístico", en tanto sólo hace
                periodismo. Procura mantener la centralidad de los temas locales, con voces
                plurales, de todos los sectores políticos y sociales. En este sentido ha marcado
                una agenda alternativa a la clásica de los gobiernos. Se caracteriza por las
                entrevistas a los protagonistas de las noticias, con los que invariablemente se
                procura profundizar los temas. Es referencia en la información parlamentaria.
            </p>
            <div class="flex flex-wrap gap-3">
                <a class="flex items-center gap-2 bg-[#3b8a3b] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="tel:+2664555555">
                    <i class="fab fa-whatsapp">
                    </i>
                    2664555555
                </a>
                <a class="flex items-center gap-2 bg-[#3b5998] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.facebook.com/NADASECRETO97.9" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-facebook-f">
                    </i>
                    ROCK DEL PAÍS UNSL
                </a>
                <a class="flex items-center gap-2 bg-[#b72f8a] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.instagram.com/nadasecretounsl/?hl=es" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-instagram">
                    </i>
                    nadasecretounsl
                </a>
            </div>
        </section>

        <section class="mb-10">
            <h2 class=" sm:text-sm font-normal mb-4">Últimas noticias de ROCK DEL PAÍS</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $noticias_query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'tax_query' => [
                        'relation' => 'AND',
                        [
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => ['rock-del-pais'],
                            'operator' => 'IN',
                        ],
                        [
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => ['podcast'],
                            'operator' => 'NOT IN',
                        ],
                    ],
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
                            <p class="text-sm text-[#2a6ad1] font-semibold uppercase mb-1">ROCK DEL PAÍS</p>
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
            <h2 class=" sm:text-sm font-normal mb-4">Últimos podcasts de ROCK DEL PAÍS</h2>
            <div class="flex gap-3 overflow-x-auto pb-2">
                <?php
                $podcast_query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'tax_query' => [
                        [
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => ['podcast'],
                        ],
                        [
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => ['rock-del-pais'],
                        ],
                        'relation' => 'AND',
                    ],
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
                            <p class="text-sm text-[#2a6ad1] font-semibold uppercase mb-1">ROCK DEL PAÍS</p>
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