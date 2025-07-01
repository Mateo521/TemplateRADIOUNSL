<?php get_header(); ?>
<div class="bg-gray-100 entrys-content">

    <div class="max-w-6xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-[70%_1fr]  lg:flex-row gap-8">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();

                $terms = get_the_terms(get_the_ID(), 'categoria_noticia');
                $category_labels = [];

                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $slug = strtolower($term->slug);
                        $label_color = 'bg-gray-300 text-black';

                        if ($slug === 'sonido-urbano') {
                            $label_color = 'bg-blue-600 text-white';
                        } elseif ($slug === 'política' || $slug === 'politica') {
                            $label_color = 'bg-yellow-400 text-black';
                        }

                        $term_link = get_term_link($term);

                        if (!is_wp_error($term_link)) {
                            $category_labels[] = '<a href="' . esc_url($term_link) . '" class="inline-block">
                <span class="font-semibold ' . esc_attr($label_color) . ' rounded px-2 py-0.5 text-xs">' . esc_html(strtoupper($term->name)) . '</span>
            </a>';
                        }
                    }
                }






                if (has_post_thumbnail()) {
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_url($thumb_id, 'large');
                    $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    if (!$thumb_alt) {
                        $thumb_alt = get_the_title() . ' - imagen destacada';
                    }
                } else {
                    $thumb_url = 'https://placehold.co/900x300?text=No+Image';
                    $thumb_alt = 'Imagen destacada no disponible';
                }
        ?>



                <main class="flex-1 w-full max-w-[768px]">


                    <h1 class="font-semibold text-lg md:text-xl leading-tight mb-4"><?php the_title(); ?></h1>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <?php echo implode(' ', $category_labels); ?>
                        <span class="text-gray-600 self-center"><?php echo get_the_date('d/m/Y'); ?></span>
                    </div>




                    <img
                        src="<?php echo esc_url($thumb_url); ?>"
                        alt="<?php echo esc_attr($thumb_alt); ?>"
                        class="w-full rounded-xl h-auto mb-2"
                        width="900"
                        height="300" />
                    <?php if (get_post_meta(get_the_ID(), 'pie_de_foto', true)) : ?>
                        <p class="text-gray-600 mb-8">
                            Pie de foto: <?php echo esc_html(get_post_meta(get_the_ID(), 'pie_de_foto', true)); ?>
                        </p>
                    <?php else : ?>
                        <p class="text-gray-600 mb-8"></p>
                    <?php endif; ?>

                    <?php if (get_post_meta(get_the_ID(), 'subtitulo', true)) : ?>
                        <p class="mb-4 font-semibold"><?php echo esc_html(get_post_meta(get_the_ID(), 'subtitulo', true)); ?></p>
                    <?php endif; ?>



                    <div class="prose max-w-none  mb-4 leading-relaxed">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    // Spotify embed URL from custom field 'spotify_embed_url'
                    $spotify_url = get_post_meta(get_the_ID(), 'spotify_embed_url', true);
                    if ($spotify_url) :
                    ?>
                        <div class="mb-8">
                            <iframe
                                src="<?php echo esc_url($spotify_url); ?>"
                                class="w-full h-20 rounded"
                                loading="lazy"
                                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                title="Fragmento de audio"></iframe>
                        </div>
                    <?php endif; ?>


                    <?php if (get_field('audio_de_noticia')): ?>
                        <div class="w-full bg-gradient-to-t rounded-b-xl from-gray-300 to-gray-100 flex justify-center py-6  mb-6">
                            <div class="max-w-4xl w-full">
                                <?php if (get_field('titulo_de_audio')): ?>
                                    <p class="px-3 pt-5 font-bold"><?php echo esc_html(get_field('titulo_de_audio')); ?> </p>
                                <?php endif; ?>
                                <div class="pt-5 px-4">
                                    <div class=" overflow-hidden rounded-xl">
                                        <audio
                                            controls
                                            class="w-full text-black"
                                            preload="none"
                                            src="<?php echo esc_url(get_field('audio_de_noticia')); ?>"
                                            style="outline:none;">
                                            Su navegador no soporta reproducción de audio HTML5.
                                        </audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="flex items-center gap-3 mb-6">
                        <button class="flex items-center gap-2 font-semibold border border-gray-300 rounded px-3 py-1 hover:bg-gray-100 transition" onclick="if(navigator.share){navigator.share({title: '<?php echo esc_js(get_the_title()); ?>', url: '<?php the_permalink(); ?>'});}else{alert('Función de compartir no soportada en este navegador.');}">
                            <i class="fas fa-share-alt"></i> COMPARTIR
                        </button>
                        <a class="text-gray-600 hover:text-gray-900 transition" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer" aria-label="Compartir en Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-gray-600 hover:text-gray-900 transition" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo rawurlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" aria-label="Compartir en Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-gray-600 hover:text-gray-900 transition" href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' ' . get_the_permalink()); ?>" target="_blank" rel="noopener noreferrer" aria-label="Compartir en WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a class="text-gray-600 hover:text-gray-900 transition" href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php the_permalink(); ?>" aria-label="Compartir por correo electrónico">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>

                    <!--form class="space-y-2" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <label class="font-semibold flex items-center gap-2 mb-1" for="comentario">
                        <input class="w-4 h-4" id="comentario" name="comentario_check" type="checkbox" />
                        Dejamos tu comentario
                    </label>
                    <textarea
                        class="w-full border border-gray-300 rounded px-3 py-2 resize-none focus:outline-none focus:ring-1 focus:ring-blue-500"
                        id="comentario-text"
                        name="comentario_text"
                        placeholder="Escribí tu comentario"
                        rows="3"></textarea>
                    <input type="hidden" name="action" value="submit_comment" />
                    <input type="hidden" name="post_id" value="<?php the_ID(); ?>" />
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Enviar
                    </button>
                </form-->
                </main>
        <?php
            endwhile;
        endif;
        wp_footer();
        ?>



        <aside class="block w-full  sticky top-45 self-start">

            <div class="space-y-4">

                <div class="bg-white border-gray-800 rounded-xl shadow p-2 md:mb-3 mb-20">


 
                    <iframe
                        class="hidden lg:block facebook-iframe"
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Funslradio&tabs=timeline&width=305&height=370&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
                        width="100%"
                        height="370"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>
                    <iframe
                        class="lg:hidden facebook-iframe"
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Funslradio&tabs=timeline&width=350&height=370&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true"
                        width="100%"
                        height="370"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                    </iframe>


                </div>

                <div class="bg-white border-gray-800 rounded-xl shadow p-2 text-sm">
                    <iframe class="rounded-lg w-full" width="320" height="390" src="https://www.instagram.com/unslradio/embed" frameborder="0"></iframe>
                </div>

                <a target="_blank" href="https://open.spotify.com/show/0dyJ0gdV0rv7fenSBPZ9eF">
                    <div class="bg-[#1db954]  text-[#191414] font-bold border-gray-800 rounded-xl shadow p-2 text-sm flex justify-center items-center gap-2">
                        <i class="fab fa-spotify text-2xl"></i>
                        <h3 class="m-0">Seguinos en Spotify</h3>
                    </div>
                </a>

            </div>
        </aside>


    </div>
</div>

<?php get_footer(); ?>