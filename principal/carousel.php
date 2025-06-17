<div class="relative w-full max-w-full h-[320px] sm:h-[360px] md:h-[400px] rounded-md overflow-hidden">
    <div class="swiper mySwiper h-full">
        <div class="swiper-wrapper h-full">
            <?php

            $args_institucional = array(
                'post_type'      => 'noticias',
                'posts_per_page' => 1,
                'category_name'  => 'institucional',
            );
            $query_institucional = new WP_Query($args_institucional);
            if ($query_institucional->have_posts()) :
                while ($query_institucional->have_posts()) : $query_institucional->the_post();
                    // Obtener datos de la noticia institucional
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $title = get_the_title();
                    $categories = get_the_category();
                    $cat_names = wp_list_pluck($categories, 'name');
            ?>
                    <div class="swiper-slide relative h-full rounded-md overflow-hidden">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover" loading="lazy" />
                        <div class="absolute inset-0 bg-black/50"></div>


                        <div class="absolute bottom-8 px-12 md:px-24 z-10 max-w-3xl">

                          <div class=" flex flex-wrap gap-2 z-10">
                                <?php foreach ($cat_names as $cat): ?>
                                    <span class="bg-[#486faf] text-white text-xs font-semibold px-2 py-0.5 rounded">
                                        <?php echo esc_html($cat); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <h2 class="text-white py-2 text-xl sm:text-2xl font-semibold leading-tight max-w-lg">
                                <?php echo esc_html($title); ?>
                            </h2>

                          
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;


            $args_otros = array(
                'post_type'      => 'noticias',
                'posts_per_page' => 3,
                'category__not_in' => array(get_cat_ID('institucional')),
            );
            $query_otros = new WP_Query($args_otros);

            if ($query_otros->have_posts()) :
                while ($query_otros->have_posts()) : $query_otros->the_post();
                    // Obtener datos de cada noticia
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $title = get_the_title();
                    $categories = get_the_category();
                    $cat_names = wp_list_pluck($categories, 'name');
                ?>
                    <div class="swiper-slide relative h-full rounded-md overflow-hidden">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover" loading="lazy" />
                        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                        <div class="absolute top-6 left-6 flex space-x-2 z-10">
                            <?php foreach ($cat_names as $cat): ?>
                                <span class="bg-[#486faf] text-white text-xs font-semibold px-2 py-0.5 rounded">
                                    <?php echo esc_html($cat); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <div class="absolute bottom-8 left-6 z-10 max-w-3xl">
                            <h2 class="text-white text-xl sm:text-2xl font-semibold leading-tight max-w-lg">
                                <?php echo esc_html($title); ?>
                            </h2>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <div class="swiper-pagination absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10"></div>

        <button aria-label="Previous slide" class="swiper-button-prev absolute top-1/2 left-3 -translate-y-1/2 text-white text-lg z-10">

        </button>
        <button aria-label="Next slide" class="swiper-button-next absolute top-1/2 right-3 -translate-y-1/2 text-white text-lg z-10">

        </button>
    </div>
</div>