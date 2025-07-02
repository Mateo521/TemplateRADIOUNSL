<div class="max-w-7xl mx-auto pb-6">
    <div class="flex justify-center md:gap-12 py-6 gap-3 items-baseline select-none">
        <h1 class="font-bold text-[80px] md:text-[150px] text-[#4a5568]" style=" font-family: 'Antonio', sans-serif;">PODCAST</h1>
    </div>

    <?php
    // Traer 9 podcasts (los últimos)
    $podcast_query = new WP_Query([
        'post_type' => 'podcast',
        'posts_per_page' => 9,
    ]);
    ?>


    <?php if ($podcast_query->have_posts()): ?>
        <div class="grid grid-cols-1 sm:grid-cols-3 px-2 gap-6 mb-10">
            <?php
            $count = 0;
            while ($podcast_query->have_posts() && $count < 3): $podcast_query->the_post();
                $imagen = get_field('imagen_podcast');
                $audio_url = get_field('audio_podcast');
            ?>
                <!-- Tarjeta grande -->

                <div class="bg-[#1a1a1a] rounded-md h-full flex flex-col">

                    <div class="relative">
                        <div class="relative">
                            <a href="<?php echo get_permalink() ?>">
                                <img alt="<?php echo get_field('titulo'); ?>" class="rounded-t-md w-full h-[190px] object-cover" src="<?php echo esc_url($imagen); ?>" />
                            </a>

                            <?php if ($audio_url): ?>
                                <article>
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
                                </article>
                            <?php endif; ?>
                        </div>
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
                        <div class="absolute text-sm top-3 bg-black/70 py-1 px-2 rounded-xl left-3 font-semibold text-[#d6d60a] uppercase leading-none">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'categoria_podcast');
                            if (!empty($terms) && !is_wp_error($terms)) {
                                $term = array_shift($terms);
                                echo esc_html($term->name) . ' ';
                            }
                            ?>
                            <div class="font-semibold text-[#f0f0f0] leading-none">
                                <?php echo get_the_date(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <a href="<?php echo get_permalink() ?>">
                            <div class="p-3">
                                <h2 class="text-white font-semibold mb-2 leading-tight">
                                    <?php
                                    $titulo = get_field('titulo');
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
        <div class="grid grid-cols-1 sm:grid-cols-6 px-2 gap-4 mb-8">
            <?php while ($podcast_query->have_posts()): $podcast_query->the_post();
                $imagen = get_field('imagen_podcast');

            ?>
                <div class="bg-gray-100 rounded-xl flex flex-col">
                    <div class="relative">
                        <a href="<?php echo get_permalink() ?>">
                            <?php if ($imagen): ?>
                                <img alt="<?php get_field('titulo'); ?>" class="rounded-t-md w-full h-[170px] md:h-[130px] object-cover" src="<?php echo esc_url($imagen); ?>" />
                            <?php endif;
                            ?>
                        </a>
                        <?php if ($audio_url): ?>
                            <article>

                            
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
                            </article>
                        <?php endif; ?>
                    </div>
                    <div class="p-2">
                        <h3 class="text-sm font-semibold mt-1 leading-tight text-gray-800">


                            <a href="<?php echo get_permalink() ?>">
                                <?php
                                $descripcion = get_field('titulo');
                                echo esc_html(wp_trim_words($descripcion, 15, '...'));
                                ?>
                            </a>
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