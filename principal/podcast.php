<div class="max-w-7xl mx-auto">
    <div class="flex justify-center md:gap-12 py-6 gap-3 items-baseline select-none">
        <h1 class="font-bold text-[150px] text-[#4a5568]" style=" font-family: 'Antonio', sans-serif;">PODCAST</h1>
    </div>

    <?php
    // Traer 9 podcasts (los últimos)
    $podcast_query = new WP_Query([
        'post_type' => 'podcast',
        'posts_per_page' => 9,
    ]);
    ?>


    <?php if ($podcast_query->have_posts()): ?>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <?php
            $count = 0;
            while ($podcast_query->have_posts() && $count < 3): $podcast_query->the_post();
                $imagen = get_field('imagen_podcast');
                $audio = get_field('audio_podcast');
                $audio_url = $audio['url'] ?? '';
            ?>
                <!-- Tarjeta grande -->
                <a href="<?php echo get_permalink() ?>">
                    <div class="bg-[#1a1a1a] rounded-md h-full flex flex-col">

                        <div class="relative">

                            <img alt="<?php the_title_attribute(); ?>" class="rounded-t-md w-full h-[190px] object-cover" src="<?php the_post_thumbnail_url('full'); ?>" />


                            <?php if ($audio_url): ?>
                                <a href="<?php echo esc_url($audio_url); ?>" target="_blank" rel="noopener noreferrer">Escuchar podcast</a>
                            <?php endif; ?>

                            <div class="absolute bottom-3 left-3 font-semibold text-[#d6d60a] uppercase leading-none">
                                <?php
                                $categories = get_the_category();
                                if (! empty($categories)) {

                                    echo esc_html($categories[0]->name) . ' ';
                                }
                                ?>
                                <div class="font-semibold text-[#f0f0f0] leading-none">
                                    <?php echo get_the_date(); ?>
                                </div>
                            </div>

                        </div>

                        <div class="p-3">
                            <h2 class="text-white font-semibold mb-2 leading-tight"><?php the_title(); ?></h2>
                            <p class="text-sm text-[#a0aec0] leading-snug">
                                <?php
                                $descripcion = get_field('descripcion_podcast');
                                echo esc_html(wp_trim_words($descripcion, 20, '...'));
                                ?>
                            </p>
                        </div>

                    </div>
                </a>
            <?php

                $count++;
            endwhile;
            ?>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 mb-8">
            <?php while ($podcast_query->have_posts()): $podcast_query->the_post();
                $imagen = get_field('imagen_podcast');
                $audio = get_field('audio_podcast');
            ?>
                <!-- Tarjeta pequeña -->

                <a href="<?php echo get_permalink() ?>">
                    <div class="bg-[#f0f0f0] rounded-xl flex flex-col">
                        <div class="relative">



                            <?php if ($imagen): ?>
                                <img alt="<?php the_title_attribute(); ?>" class="rounded-t-md w-full h-[130px] object-cover" src="<?php echo esc_url($imagen); ?>" />
                            <?php endif; ?>


                            <?php if ($audio && isset($audio['url'])): ?>
                                <a href="<?php echo esc_url($audio['url']); ?>" class="absolute top-1 right-1 bg-white w-5 h-5 rounded-full flex items-center justify-center text-black text-xs" target="_blank">
                                    <i class="fas fa-play"></i>
                                </a>
                            <?php endif; ?>


                        </div>
                        <div class="p-2">
                            <h3 class="text-sm font-semibold mt-1 leading-tight text-gray-800">


                               
                                    <?php
                                    $descripcion = the_title();
                                    echo esc_html(wp_trim_words($descripcion, 20, '...'));
                                    ?>
                              
                            </h3>
                        </div>
                    </div>
                </a> <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>

    <div class="flex justify-center">
        <a href="<?php echo get_post_type_archive_link('podcast'); ?>" class="bg-[#d6d60a] text-black text-base cursor-pointer font-semibold px-6 py-2 rounded-md" type="button">
            Más podcasts
        </a>
    </div>
</div>