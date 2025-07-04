<?php get_header(); ?>

<div class="bg-gray-100">
    <header class="flex justify-center items-center bg-[#f3f3f3] py-2 border-b shadow border-gray-300">
        <div class="flex justify-center md:gap-12 gap-3 items-baseline">
            <h1 id="titulo-categoria" class="font-bold text-[#1476B3]" style=" font-family: 'Antonio', sans-serif;">
                <?php single_term_title(); ?>
            </h1>
            <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-11.png" alt="">
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">

        <section class="relative w-full max-w-full rounded-md overflow-hidden shadow-md">
            <div class="swiper swiper-container h-[280px] sm:h-[320px] md:h-[360px] rounded-md">
                <div class="swiper-wrapper">
                    <?php
                    $term = get_queried_object();
                    $carousel_query = new WP_Query(array(
                        'posts_per_page' => 5,
                        'post_type' => 'noticias',
                        'meta_key' => '_thumbnail_id',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categoria_noticia',
                                'field' => 'slug',
                                'terms' => $term->slug,
                            ),
                        ),
                    ));

                    if ($carousel_query->have_posts()) :
                        while ($carousel_query->have_posts()) : $carousel_query->the_post();

                            $terms = get_the_terms(get_the_ID(), 'categoria_noticia');

                            $cat_names = array();
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    $cat_names[] = $term->name;
                                }
                            }
/*
                            if (!empty($cat_names)) {
                                echo implode(', ', $cat_names);
                            } else {
                                echo 'Sin categoría';
                            }
*/

                            $img_url = get_the_post_thumbnail_url(get_the_ID(), array(1200, 360));
                            if (!$img_url) {

                                $img_url = "https://placehold.co/1200x360?text=Sin+imagen";
                            }
                    ?>

                            <div class="swiper-slide relative">
                                <a href="<?php echo get_permalink() ?>">
                                    <img
                                        src="<?php echo esc_url($img_url); ?>"
                                        alt="<?php echo esc_attr(get_the_title()); ?>"
                                        class="w-full h-full object-cover"
                                        width="1200"
                                        height="360" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                    <div class="absolute bottom-6 left-6 max-w-3xl text-white">
                                        <div class="flex space-x-2 mb-2">
                                            <?php
                                            if ($terms && !is_wp_error($terms)) {
                                                $count = 0;
                                                foreach ($terms as $term) {
                                                    if ($count >= 2) break;
                                                    echo '<span class="bg-[#2a7bbd] text-xs font-semibold px-2 py-0.5 rounded">' . esc_html($term->name) . '</span>';
                                                    $count++;
                                                }
                                            } else {
                                                echo 'Sin categoría';
                                            }
                                            ?>
                                        </div>
                                        <h2 class="text-xl sm:text-2xl font-semibold leading-tight max-w-xl">
                                            <?php the_title(); ?>
                                        </h2>
                                        <div class="flex space-x-1 mt-2 text-white text-lg opacity-80">
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                            <i class="fas fa-circle"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <button
                    aria-label="Previous slide"
                    class="swiper-button-prev absolute left-2 top-0 bottom-0 my-auto text-white text-lg opacity-70 hover:opacity-100"></button>
                <button
                    aria-label="Next slide"
                    class="swiper-button-next absolute right-2 top-0 bottom-0 my-auto text-white text-lg opacity-70 hover:opacity-100"></button>
                <div class="swiper-pagination"></div>

            </div>
        </section>

        <!-- News grid -->
        <section
            class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4"
            id="news-grid">
            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $term = get_queried_object();

            $news_query = new WP_Query(array(
                'post_type' => 'noticias',
                'posts_per_page' => 12,
                'paged' => $paged,
                'meta_key' => '_thumbnail_id',
                'orderby' => 'date',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria_noticia',
                        'field' => 'slug',
                        'terms' => $term->slug,
                    ),
                ),
            ));

            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();

                    $terms = get_the_terms(get_the_ID(), 'categoria_noticia');

                    $first_cat = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->name : '';

                    $img_url = get_the_post_thumbnail_url(get_the_ID(), array(400, 220));
                    if (!$img_url) {
                        $img_url = "https://placehold.co/400x220?text=Sin+imagen";
                    }
            ?>

                    <article class="bg-white h-full  border border-gray-200 rounded-md shadow-sm overflow-hidden">
                        <div class="block relative hover:shadow-lg transition-shadow duration-200">
                            <a href="<?php the_permalink(); ?>">
                                <img
                                    src="<?php echo esc_url($img_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                    class="w-full h-36 object-cover"
                                    width="400"
                                    height="220" />
                            </a>

                            <?php if (get_field('audio_de_noticia')): ?>
                                <button aria-label="Play podcast"
                                    class="play-button absolute bottom-3 right-3 bg-[#ffffff] w-6 h-6 rounded-full flex items-center justify-center z-10"
                                    onclick="toggleAudio(this)">
                                    <i class="fas fa-play text-[#0a1626] text-sm"></i>
                                </button>
                                <div class="audio-wrapper opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                    <audio class="w-full mt-0 absolute top-0" controls>
                                        <source src="<?php echo esc_url(get_field('audio_de_noticia')); ?>" type="audio/mpeg">
                                        Tu navegador no soporta audio HTML5.
                                    </audio>
                                </div>
                            <?php endif; ?>
                        </div>
                        <a href="<?php the_permalink(); ?>">
                            <div class="p-3 relative">
                                <p class="text-xs text-[#2a7bbd] font-semibold uppercase mb-1">
                                    <?php echo esc_html($first_cat); ?>
                                </p>
                                <h3 class="text-sm font-normal text-gray-900 leading-snug mb-1">
                                    <?php echo wp_trim_words(get_the_title(), 20, '...'); ?>
                                </h3>
                                <time class="text-xs text-gray-400">
                                    <?php echo get_the_date('d/m/Y'); ?>
                                </time>
                            </div>
                        </a>


                    </article>


                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p class="col-span-full text-center text-gray-500">No hay noticias disponibles.</p>
            <?php endif; ?>
        </section>


        <nav
            aria-label="Pagination"
            class="mt-8 flex justify-center items-center space-x-2 text-gray-500 text-sm select-none">
            <?php

            $big = 999999999;
            $pagination_links = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $news_query->max_num_pages,
                'type' => 'array',
                'prev_text' => '<i class="fas fa-chevron-left"></i>',
                'next_text' => '<i class="fas fa-chevron-right"></i>',
                'show_all' => false,
                'end_size' => 1,
                'mid_size' => 1,
            ));

            if (!empty($pagination_links)) :

                foreach ($pagination_links as $link) {

                    if (strpos($link, 'current') !== false) {
                        echo '<button class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-400 cursor-default" disabled>' . strip_tags($link) . '</button>';
                    } else {

                        $link = str_replace('<a', '<a class="px-3 py-1 rounded border border-gray-300 text-[#2a7bbd] hover:underline"', $link);
                        echo $link;
                    }
                }
            endif;
            ?>
        </nav>
    </main>

</div>
<style>
    .swiper-pagination-bullet-active {
        background-color: #d8b90a !important;
    }
</style>
<?php get_footer();

?>