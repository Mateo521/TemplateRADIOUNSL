<?php get_header() ?>





<div class="bg-white">
    <header class="bg-gradient-to-r flex from-[#0a2a4d] to-[#0f3a6a] p-6 md:p-10">
        <div class="max-w-6xl w-full grid grid-cols-1  justify-items-center md:grid-cols-[1fr_200px] gap-5 mx-auto">
            <div class="order-2 md:order-0 w-full">
                <p class="text-sm text-yellow-400 font-semibold uppercase mb-2">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'categoria_podcast');
                    if (!empty($terms) && !is_wp_error($terms)) {
                        $term = array_shift($terms);
                        $term_link = get_term_link($term);

                        if (!is_wp_error($term_link)) {
                            echo '<a href="' . esc_url($term_link) . '" class=" font-semibold uppercase">' . esc_html($term->name) . '</a>';
                        }
                    }
                    ?>


                </p>
                <h1 class="text-white font-semibold text-xl md:text-2xl leading-tight mb-3">
                    <?php echo esc_html(get_field('titulo')); ?>
                </h1>
                <p class="text-sm text-white max-w-3xl mb-4 leading-relaxed">
                    <?php echo esc_html(get_field('descripcion_podcast')); ?>
                </p>

                <?php if (get_field('audio_podcast')): ?>
                    <div class="w-full max-w-md">
                        <!-- focus:outline-none focus:ring-2 focus:ring-yellow-400 -->
                        <button
                            id="podcastBtn"
                            aria-expanded="false"
                            aria-controls="podcastPlayer"
                            class="relative cursor-pointer inline-flex items-center gap-2 bg-[#E5CC26] text-sm font-semibold text-black rounded px-4 py-2 hover:bg-yellow-500 transition  overflow-hidden"
                            type="button">
                            <i class="fas fa-play transition-transform duration-300 ease-in-out" id="iconPlay"></i>
                            <span class="whitespace-nowrap transition-opacity duration-300 ease-in-out" id="btnText">Escuchar podcast</span>
                        </button>

                        <div
                            id="podcastPlayer"
                            class="max-h-0 overflow-hidden rounded-b-xl rounded-r-xl  bg-[#E5CC26] shadow-inner"
                            aria-hidden="true">
                            <audio
                                controls
                                class="w-full p-2 bg-[#E5CC26] text-black"
                                preload="none"
                                src="<?php echo esc_url(get_field('audio_podcast')); ?>"
                                style="outline:none;">
                                Su navegador no soporta reproducción de audio HTML5.
                            </audio>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-3 flex gap-2">
                    <button class="bg-[#0f3a6a] text-white text-base font-semibold px-2 py-1 rounded hover:bg-[#0a2a4d] transition flex items-center gap-1">
                        COMPARTIR <i class="fas fa-share-alt text-[10px]"></i>
                    </button>
                    <a aria-label="Facebook" class="bg-[#0f3a6a] p-1 rounded hover:bg-[#0a2a4d] transition" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
                        <i class="fab fa-facebook-f text-white text-sm"></i>
                    </a>
                    <a aria-label="Twitter" class="bg-[#0f3a6a] p-1 rounded hover:bg-[#0a2a4d] transition" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" rel="noopener" target="_blank">
                        <i class="fab fa-twitter text-white text-sm"></i>
                    </a>
                    <a aria-label="WhatsApp" class="bg-[#0f3a6a] p-1 rounded hover:bg-[#0a2a4d] transition" href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" rel="noopener" target="_blank">
                        <i class="fab fa-whatsapp text-white text-sm"></i>
                    </a>
                    <a aria-label="Telegram" class="bg-[#0f3a6a] p-1 rounded hover:bg-[#0a2a4d] transition" href="https://t.me/share/url?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" rel="noopener" target="_blank">
                        <i class="fab fa-telegram-plane text-white text-sm"></i>
                    </a>
                    <a aria-label="Envelope" class="bg-[#0f3a6a] p-1 rounded hover:bg-[#0a2a4d] transition" href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode(get_permalink()); ?>">
                        <i class="fas fa-envelope text-white text-sm"></i>
                    </a>
                </div>
            </div>




            <?php
            $imagen = get_field('imagen_podcast');
            if ($imagen): ?>

                <div class="w-[200px] h-[200px] relative size-full">

                    <lottie-player class="podcast-lottie absolute w-full h-full top-0 left-0"
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/podcast.json"
                        background="transparent"
                        speed="1"

                        loop
                        autoplay>
                    </lottie-player>

                    <img class="size-full  rounded-xl object-cover" src="<?php echo esc_url($imagen); ?>" alt="<?php the_title_attribute(); ?>">


                </div>

            <?php endif; ?>

        </div>



    </header>

    <main class="max-w-4xl mx-auto px-4 md:px-10 py-8">
        <?php if (has_post_thumbnail()) :
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_url($thumb_id, 'large');
            $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
            if (!$thumb_alt) {
                $thumb_alt = get_the_title() . ' - imagen destacada';
            }
        ?>
            <img
                src="<?php echo esc_url($thumb_url); ?>"
                alt="<?php echo esc_attr($thumb_alt); ?>"
                class="w-full rounded-xl h-auto mb-2"
                width="900"
                height="300" />
        <?php endif; ?>

        <article id="entrys" class="mb-10 text-base leading-relaxed">
            <?php the_content(); ?>
        </article>
        <section>
            <h3 class="font-semibold text-xl mb-4">
                Últimos podcasts
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4  scrollbar-hide pb-2">
                <?php
                $recent_podcasts = new WP_Query(array(
                    'post_type' => 'podcast',
                    'posts_per_page' => 4,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                if ($recent_podcasts->have_posts()) :
                    while ($recent_podcasts->have_posts()) : $recent_podcasts->the_post();

                        $audio_url = get_field('audio_podcast');
                        $title = get_field('titulo');
                        $imagen = get_field('imagen_podcast');
                ?>
                        <article class="w-full bg-white rounded shadow-sm overflow-hidden flex-shrink-0 flex flex-col">
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
                                </div>
                            </a>
                        </article>





                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    ?>
                    <p class="text-sm text-gray-500">
                        No hay podcasts recientes disponibles.
                    </p>
                <?php endif; ?>
            </div>
            <div class="mt-6">
                <a class="bg-yellow-400 text-black text-sm font-semibold px-5 py-2 rounded hover:bg-yellow-500 transition inline-block text-center" href="<?php echo esc_url(get_post_type_archive_link('podcast')); ?>">
                    Más podcasts
                </a>
            </div>
        </section>
    </main>
</div>

<style>
    #entrys img {
        border-radius: 10px;
    }
</style>
<?php get_footer() ?>