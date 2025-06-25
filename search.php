<?php get_header(); ?>

<div class="bg-gray-100">

    <header class="flex justify-center items-center bg-[#f3f3f3] py-2 border-b shadow border-gray-300">
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
            <?php endwhile; else : ?>
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

<?php get_footer(); ?>
