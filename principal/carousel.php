<div class="flex justify-center bg-[#f0f0f0] w-full">
    <div class="relative w-full  h-[320px]  sm:h-[360px] md:h-[500px] overflow-hidden">
        <div class="swiper mySwiper h-full">
            <div class="swiper-wrapper">
                <?php



                $rss_url = 'https://noticias.unsl.edu.ar/?call_custom_simple_rss=1';
                $rss = simplexml_load_file($rss_url);

                if ($rss !== false && isset($rss->channel->item[0])) {
                    $item = $rss->channel->item[0];

                    $title = (string) $item->title;
                    $link = (string) $item->link;


                    $image = '';

                    if (isset($item->enclosure)) {
                        $image = (string) $item->enclosure['url'];
                    } elseif ($item->children('media', true)->content) {
                        $media = $item->children('media', true);
                        $image = (string) $media->content->attributes()->url;
                    }
                }


                $categories = [];

                foreach ($item->category as $cat) {
                    $category = (string)$cat;


                    $categoryName = match ($category) {
                        '3' => 'Institucional',
                        '4' => 'Ciencia',
                        '2218' => 'Coronavirus',
                        '7' => 'Destacado',
                        '8' => 'Cultura',
                        '9' => 'Entrevistas',
                        '5' => 'Sociedad',
                        '6' => 'Principal',
                        '639' => 'UNSL TV',
                        '3457' => 'Laboratorios',
                        default => 'Desconocida',
                    };

                    $categories[] = $categoryName;
                }

                function corregir_url_imagen_wp($url)
                {

                    return preg_replace('/-\d{2,4}x\d{2,4}(?=\.(jpg|jpeg|png|gif))/i', '', $url);
                }

                ?>



                <div class="swiper-slide relative h-full rounded-b-xl overflow-hidden">
                    <img src="<?php echo esc_url(corregir_url_imagen_wp($image)); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover" loading="lazy" />
                    <div class="absolute inset-0 bg-black/50"></div>
                    <div class="absolute bottom-8 px-12 md:px-24 z-10 max-w-3xl">
                        <div class="py-2">
                            <h2 class="bg-blue-800 text-white font-bold rounded-xl inline-flex px-3">Noticias UNSL</h2>
                        </div>
                        <div class="flex flex-wrap gap-2 z-10">
                            <?php foreach ($categories as $cat): ?>
                                <span class="bg-[#486faf] text-white text-xs font-semibold px-2 py-0.5 rounded">
                                    <?php echo esc_html($cat); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <a target="_blank" class="size-full" href="<?php echo esc_url($link); ?>">
                            <h2 class="text-white py-2 text-xl sm:text-2xl font-semibold leading-tight max-w-lg">
                                <?php echo esc_html($title); ?>
                            </h2>
                        </a>


                    </div>
                </div>

                <?php
                $args_institucional = array(
                    'post_type'      => 'noticias',
                    'posts_per_page' => 1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'categoria_noticia',
                            'field'    => 'slug',
                            'terms'    => array('institucional'),
                        ),
                    ),
                );
                $query_institucional = new WP_Query($args_institucional);

                if ($query_institucional->have_posts()) :
                    while ($query_institucional->have_posts()) : $query_institucional->the_post();

                        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $title = get_the_title();

                        $terms = get_the_terms(get_the_ID(), 'categoria_noticia');
                        $cat_names = !empty($terms) && !is_wp_error($terms) ? wp_list_pluck($terms, 'name') : [];




                ?>



                        <div class="swiper-slide relative h-full rounded-xl overflow-hidden">


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
                                <a class="size-full" href="<?php echo get_permalink() ?>">
                                    <h2 class="text-white py-2 text-xl sm:text-2xl font-semibold leading-tight max-w-lg">
                                        <?php echo esc_html($title); ?>
                                    </h2>

                                </a>




                            </div>



                        </div>


                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;


                $args_otros = array(
                    'post_type'      => 'noticias',
                    'posts_per_page' => 3,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'categoria_noticia',
                            'field'    => 'slug',
                            'terms'    => array('institucional'),
                            'operator' => 'NOT IN',
                        ),
                    ),
                );

                $query_otros = new WP_Query($args_otros);

                if ($query_otros->have_posts()) :
                    while ($query_otros->have_posts()) : $query_otros->the_post();

                        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $title = get_the_title();

                        $terms = get_the_terms(get_the_ID(), 'categoria_noticia');
                        $cat_names = !empty($terms) && !is_wp_error($terms) ? wp_list_pluck($terms, 'name') : [];

                    ?>
                        <div class="swiper-slide relative h-full rounded-b-xl overflow-hidden">
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

                                <a class="size-full" href="<?php echo get_permalink() ?>">
                                    <h2 class="text-white py-2 text-xl sm:text-2xl font-semibold leading-tight max-w-lg">
                                        <?php echo esc_html($title); ?>
                                    </h2>
                                </a>
                                <article>
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
                                </article>

                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="swiper-pagination absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10"></div>

            <button aria-label="Previous slide" class="swiper-button-prev absolute top-1/2 left-3  text-white text-lg z-10">

            </button>
            <button aria-label="Next slide" class="swiper-button-next absolute top-1/2 right-3  text-white text-lg z-10">

            </button>
        </div>
    </div>

</div>