<?php get_header(); ?>

<div class="bg-gray-100">

    <header class="flex justify-center  items-center bg-[#f3f3f3] py-2 border-b shadow border-gray-300">
        <div class="flex justify-center md:gap-12 gap-3 items-baseline">
            <h1 id="titulo-categoria" class="font-bold text-[#1476B3]" style=" font-family: 'Antonio', sans-serif;">
                BÚSQUEDA
            </h1>

            <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-11.png" alt="">

        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">

        <div class="text-center font-bold py-6 text-xl md:text-2xl">
            <h1><?php printf(esc_html__('Resultados de búsqueda para: %s', 'tu-tema'), '<span>' . get_search_query() . '</span>'); ?></h1>
        </div>


        <section class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4" id="news-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post();


                    $terms_podcast = get_the_terms(get_the_ID(), 'categoria_podcast');
                    $terms_noticia = get_the_terms(get_the_ID(), 'categoria_noticia');
                    if (!empty($terms_podcast) && !is_wp_error($terms_podcast)) {
                        $first_cat = esc_html($terms_podcast[0]->name);
                    } elseif (!empty($terms_noticia) && !is_wp_error($terms_noticia)) {
                        $first_cat = esc_html($terms_noticia[0]->name);
                    } else {
                        $first_cat = 'Sin categoría';
                    }

                    $post_type = get_post_type();
                    if ($post_type == 'podcast') {
                        $category_class = 'is-podcast';
                    } elseif ($post_type == 'noticias') {
                        $category_class = 'is-noticia';
                    } else {
                        $category_class = 'sin-categoria';
                    }


                    $img_url = get_the_post_thumbnail_url(get_the_ID(), array(400, 220));
                    if (!$img_url) {
                        $img_url = "https://placehold.co/400x220?text=Sin+imagen";
                    }
            ?>







                    <?php

                    $post_type = get_post_type();


                    if ($post_type == 'podcast') {

                        $audio_url = get_field('audio_podcast');
                        $excerpt = get_field('descripcion_podcast');
                        $title = get_field('titulo');
                        $imagen = get_field('imagen_podcast');
                    ?>
                        <article class="w-full bg-white rounded shadow-sm overflow-hidden flex-shrink-0 flex  <?php echo $category_class; ?>  flex-col">
                            <div class="relative w-full h-44">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ($imagen): ?>
                                        <img src="<?php echo esc_url($imagen); ?>"
                                            alt="<?php echo esc_attr($title); ?>"
                                            class="w-full h-full object-cover" />
                                    <?php endif; ?>
                                </a>
                                <?php if ($audio_url): ?>
                                    <button aria-label="Play podcast"
                                        class="play-button absolute bottom-3 right-3 bg-[#e6c94a] w-6 h-6 rounded-full flex items-center justify-center z-10"
                                        onclick="toggleAudio(this)">
                                        <i class="fas fa-play text-[#0a1626] text-sm"></i>
                                    </button>
                                    <div class="audio-wrapper opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                                        <audio class="w-full audio-element mt-0 absolute top-0" controls>
                                            <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                                            Tu navegador no soporta audio HTML5.
                                        </audio>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <div class="p-3 flex-1 flex flex-col justify-between">
                                    <p class="text-sm text-[#2a6ad1] font-semibold uppercase mb-1">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'categoria_podcast');
                                        echo !empty($terms) && !is_wp_error($terms) ? esc_html($terms[0]->name) : 'Sin categoría';
                                        ?>
                                    </p>
                                    <h3 class="text-xs sm:text-sm font-semibold leading-snug line-clamp-2"><?php echo esc_html($title); ?></h3>
                                    <?php if ($excerpt): ?>
                                        <p class="text-xs mt-2 text-gray-600 line-clamp-2"><?php echo esc_html($excerpt); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </article>
                    <?php
                    } elseif ($post_type == 'noticias') {

                    ?>
                        <article class="w-full bg-white rounded shadow-sm overflow-hidden  <?php echo $category_class; ?>  flex-shrink-0 flex flex-col">
                            <div class="relative w-full h-44">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>"
                                            alt="<?php the_title_attribute(); ?>"
                                            class="w-full h-full object-cover" />
                                    <?php endif; ?>
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
                                <div class="p-3 flex-1 flex flex-col justify-between">
                                    <p class="text-sm text-[#2a6ad1] font-semibold uppercase mb-1">
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'categoria_noticia');
                                        echo !empty($terms) && !is_wp_error($terms) ? esc_html($terms[0]->name) : 'Sin categoría';
                                        ?>
                                    </p>
                                    <h3 class="text-xs sm:text-sm font-semibold leading-snug line-clamp-2"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </article>
                    <?php
                    } else {

                        $categories = get_the_category();
                        $first_cat = $categories ? $categories[0]->name : '';
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), array(400, 220));
                        if (!$img_url) {
                            $img_url = "https://placehold.co/400x220?text=Sin+imagen";
                        }
                    ?>



                        <a href="<?php the_permalink(); ?>" class="block hover:shadow-lg transition-shadow duration-200">
                            <article class="bg-white h-full border border-gray-200 rounded-md shadow-sm overflow-hidden">
                                <img
                                    src="<?php echo esc_url($img_url); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                    class="w-full h-36 object-cover"
                                    width="400"
                                    height="220" />
                                <div class="p-3">
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
                            </article>
                        </a>

                    <?php
                    }
                    ?>







                <?php endwhile;
            else : ?>
                <p class="col-span-full text-center text-gray-500">No se encontraron resultados.</p>
            <?php endif; ?>
        </section>


        <nav aria-label="Pagination" class="mt-8 flex justify-center items-center space-x-2 text-gray-500 text-sm select-none">
            <?php
            global $wp_query;
            $big = 999999999;
            $pagination_links = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
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
    .is-podcast {
        background-color: #faf6de;
        border-left: 4px solid #e5cc26;
    }

    .is-noticia {
        background-color: #f9f9f9;
        border-left: 4px solid #123d83;
    }

    .sin-categoria {
        background-color: #fff;
    }
</style>

<?php get_footer(); ?>