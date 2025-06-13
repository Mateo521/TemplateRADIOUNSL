<?php get_header(); ?>
<div class="bg-gray-100 entrys-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Get categories for labels
            $categories = get_the_category();
            $category_labels = [];
            foreach ($categories as $cat) {
                // Use category slug or name for label color logic
                $slug = strtolower($cat->slug);
                $label_color = 'bg-gray-300 text-black'; // default
                if ($slug === 'sonido-urbano') {
                    $label_color = 'bg-blue-600 text-white';
                } elseif ($slug === 'política' || $slug === 'politica') {
                    $label_color = 'bg-yellow-400 text-black';
                }
                $category_labels[] = '<span class="font-semibold ' . esc_attr($label_color) . ' rounded px-2 py-0.5 inline-block">' . esc_html(strtoupper($cat->name)) . '</span>';
            }

            // Get featured image URL and alt text
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
            <main class="max-w-4xl mx-auto px-4 py-8">
                <h1 class="font-semibold text-lg md:text-xl leading-tight mb-4"><?php the_title(); ?></h1>
                <div class="flex flex-wrap gap-2 mb-3">
                    <?php echo implode(' ', $category_labels); ?>
                    <span class="text-gray-600 self-center"><?php echo get_the_date('d/m/Y'); ?></span>
                </div>
                <img
                    src="<?php echo esc_url($thumb_url); ?>"
                    alt="<?php echo esc_attr($thumb_alt); ?>"
                    class="w-full h-auto mb-2"
                    width="900"
                    height="300" />
                <?php if (get_post_meta(get_the_ID(), 'pie_de_foto', true)) : ?>
                    <p class="text-gray-600 mb-8">
                        Pie de foto: <?php echo esc_html(get_post_meta(get_the_ID(), 'pie_de_foto', true)); ?>
                    </p>
                <?php else : ?>
                    <p class="text-gray-600 mb-8">Pie de foto: La escuela está ubicada la calle Marcelino Poblet 668.</p>
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
</div>
<?php get_footer(); ?>