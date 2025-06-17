<div class="max-w-7xl mx-auto pb-6">
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

            ?>
                <!-- Tarjeta grande -->

                <div class="bg-[#1a1a1a] rounded-md h-full flex flex-col">

                    <div class="relative">
                        <a href="<?php echo get_permalink() ?>">
                            <img alt="<?php the_title_attribute(); ?>" class="rounded-t-md w-full h-[190px] object-cover" src="<?php the_post_thumbnail_url('full'); ?>" />
                        </a>

                        <?php
                        $audio_url = get_field('audio_podcast');
                        ?>

                        <?php
                        /*
                             if ($audio_url): ?>
                                <div class="custom-audio-player bg-black text-white p-4 rounded-md w-full max-w-xl">
                                    <button class="play-pause bg-yellow-400 text-black font-bold px-4 py-2 rounded mr-4">▶️</button>
                                    <div class="progress-bar-container bg-gray-700 h-2 w-full relative rounded overflow-hidden">
                                        <div class="progress-bar bg-yellow-400 h-2 absolute left-0 top-0 w-0"></div>
                                    </div>
                                    <audio class="audio-element hidden">
                                        <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                                        Tu navegador no soporta audio HTML5.
                                    </audio>
                                </div>
                        
  <?php endif;

                            */



                        ?>





                        <div class="absolute text-sm bottom-3 bg-black/70 py-1 px-2 rounded-xl left-3 font-semibold text-[#d6d60a] uppercase leading-none">
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

                    <div>
                        <?php
                        if ($audio_url): ?>

                            <div class="audio-wrapper">
                                <audio class="audio-element hidden">
                                    <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                                    Tu navegador no soporta audio HTML5.
                                </audio>
                            </div>

                        <?php endif;
                        ?>
                        <a href="<?php echo get_permalink() ?>">
                            <div class="p-3">
                                <h2 class="text-white font-semibold mb-2 leading-tight">

                                    <?php
                                    $titulo = get_the_title();
                                    echo esc_html(wp_trim_words($titulo, 20, '...'));
                                    ?>

                                </h2>
                                <p class="text-sm text-[#a0aec0] leading-snug">
                                    <?php
                                    $descripcion = get_field('descripcion_podcast');
                                    echo esc_html(wp_trim_words($descripcion, 20, '...'));
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>

                </div>

            <?php

                $count++;
            endwhile;
            ?>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-6 gap-4 mb-8">
            <?php while ($podcast_query->have_posts()): $podcast_query->the_post();
                $imagen = get_field('imagen_podcast');

            ?>
                <!-- Tarjeta pequeña -->


                <div class="bg-[#f0f0f0] rounded-xl flex flex-col">

                    <div class="relative">


                        <a href="<?php echo get_permalink() ?>">
                            <?php if ($imagen): ?>
                                <img alt="<?php the_title_attribute(); ?>" class="rounded-t-md w-full h-[130px] object-cover" src="<?php echo esc_url($imagen); ?>" />
                            <?php endif;
                            ?>
                        </a>
                        <?php
                        $audio_url = get_field('audio_podcast'); // Ya es una URL
                        if ($audio_url): ?>
                            <div class="audio-wrapper">
                                <audio class="audio-element hidden">
                                    <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                                    Tu navegador no soporta audio HTML5.
                                </audio>
                            </div>
                        <?php endif; ?>



                    </div>
                    <div class="p-2">
                        <h3 class="text-sm font-semibold mt-1 leading-tight text-gray-800">



                            <?php
                            $descripcion = get_the_title();
                            echo esc_html(wp_trim_words($descripcion, 15, '...'));
                            ?>

                        </h3>
                    </div>

                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>

    <div class="flex justify-center">
        <a href="<?php echo get_post_type_archive_link('podcast'); ?>" class="bg-[#d6d60a] text-black text-base cursor-pointer font-semibold px-6 py-2 rounded-md" type="button">
            Más podcasts
        </a>
    </div>
</div>