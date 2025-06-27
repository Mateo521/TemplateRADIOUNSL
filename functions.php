<?php
function radio_sop()

{
    add_theme_support('title-tag');
}

add_action('setup', 'add_theme_support');

function linksradio_unsl_estilos()
{
    $version = wp_get_theme()->get('Version');



    wp_enqueue_style(
        'unsl_estilo-flowbite',
        get_template_directory_uri() . "/assets/flowbite.min.css",
        array(),
        '3.1.2',
        'all'
    );

    // Estilo principal
    wp_enqueue_style(
        'unsl_estilo-style',
        get_template_directory_uri() . "/style.css",
        array('unsl_estilo-flowbite'),
        $version,
        'all'
    );

    // Tailwind generado


    wp_enqueue_style(
        'unsl_tailwind-style',
        get_template_directory_uri() . "/assets/output.css",
        array(),
        $version,
        'all'
    );


    // Lightbox CSS
    wp_enqueue_style(
        'lightbox-css',
        get_template_directory_uri() . "/assets/lightbox2-2.11.4/src/css/lightbox.css",
        array(),
        '2.11.4',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'linksradio_unsl_estilos');



function linksradio_unsl_scripts()
{




    wp_enqueue_script('barba', get_template_directory_uri() . "/assets/barba.umd.js", array(), '3.1.2', false);


    wp_enqueue_script(
        'unsl_flowbite',
        get_template_directory_uri() . '/assets/flowbite.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'unsl_tailwind',
        'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4',
        array(),
        null,
        true
    );





    wp_enqueue_script('unsl_estilo-fontawesome', "https://kit.fontawesome.com/19e7896a5a.js", array(), '1.0', false);

    wp_enqueue_script('unsl_estilo-jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js", array(), '3.6.4', false);

    wp_enqueue_script('lightbox', get_template_directory_uri() . "/assets/lightbox2-2.11.4/src/js/lightbox.js", array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'linksradio_unsl_scripts');



function mi_tema_scripts()
{


    wp_enqueue_script('main', get_template_directory_uri() . "/assets/main.js", array(), '1.0.0', true);


    wp_localize_script('main', 'miTema', array(
        'themeURL' => get_template_directory_uri(),
    ));
}
add_action('wp_enqueue_scripts', 'mi_tema_scripts');



?>

<?php

function save_contact_form_message_as_comment()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form_submit'])) {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        $comment_data = array(
            'comment_post_ID' => 0,
            'comment_author' => $name,
            'comment_author_email' => $email,
            'comment_content' => $message,
            'comment_approved' => '0',
        );
        wp_insert_comment($comment_data);
        wp_redirect(home_url());
        exit;
    }
}

add_action('init', 'save_contact_form_message_as_comment');

?>

<?php

/**
 * Numeric pagination via WP core function paginate_links().
 * @link http://codex.wordpress.org/Function_Reference/paginate_links
 *
 * @param array $args
 *
 * @return string HTML for numneric pagination
 */
function my_pagination($args = array())
{
    global $wp_query;
    $output = '';

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $pagination_args = array(
        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'total'        => $wp_query->max_num_pages,
        'current'      => max(1, get_query_var('paged')),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        //'prev_text'    => __( '&laquo; Prev', 'text-domain' ),
        //'next_text'    => __( 'Next &raquo;', 'text-domain' ),
        //'prev_text'    => __( '&lsaquo; Prev', 'text-domain' ),
        //'next_text'    => __( 'Next &rsaquo;', 'text-domain' ),
        'prev_text'    => sprintf(
            '<i></i> %1$s',
            apply_filters(
                'my_pagination_page_numbers_previous_text',
                __('Newer Posts', 'text-domain')
            )
        ),
        'next_text'    => sprintf(
            '%1$s <i></i>',
            apply_filters(
                'my_pagination_page_numbers_next_text',
                __('Older Posts', 'text-domain')
            )
        ),
        'add_args'     => false,
        'add_fragment' => '',

        // Custom arguments not part of WP core:
        'show_page_position' => false, // Optionally allows the "Page X of XX" HTML to be displayed.
    );

    $pagination_args = apply_filters('my_pagination_args', array_merge($pagination_args, $args), $pagination_args);

    $output .= paginate_links($pagination_args);

    // Optionally, show Page X of XX.
    if (true == $pagination_args['show_page_position'] && $wp_query->max_num_pages > 0) {
        $output .= '<span class="page-of-pages">' .
            sprintf(__('Page %1s of %2s', 'text-domain'), $pagination_args['current'], $wp_query->max_num_pages) .
            '</span>';
    }

    return $output;
}

/**
 * Modify the main query on the posts index or category 
 * page. Set posts per page to 2.
 *
 * @param object $query
 */
function wpse_modify_home_category_query($query)
{


    if (is_admin() || !$query->is_main_query()) {
        return false;
    }


    if ($query->is_home() || $query->is_category()) {
        $query->set('posts_per_page', 2);
    }
}
add_action('pre_get_posts', 'wpse_modify_home_category_query');




?>

<?php

function custom_comment_callback($comment, $args, $depth)
{
?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment">
            <header class="comment-meta flex gap-5 py-3 mx-3">

                <?php echo get_avatar($comment, 60, '', 'Avatar del usuario', array('class' => 'comment-avatar')); ?>
                <div>
                    <cite class="font-bold comment-author"><?php comment_author(); ?></cite>
                    <time class="comment-time" style="color:#535353;"><?php comment_date(); ?></time>
                    <div class="comment-content">
                        <?php comment_text(); ?>
                    </div>
                </div>
            </header>
        </article>
        <style>
            .comment-avatar {
                border-radius: 50%;
            }

            .comment-author {
                font-style: normal;
            }
        </style>
    <?php
}


/*LOGIN PERSONALIZADO*/

function custom_login_logo()
{
    echo '<style type="text/css">
        .login h1 a {
          background-image: url(assets/images/logo3.png);
          background-position: center center;
		  background-size: contain;
	      width: 100%;
        }
    </style>';
}
add_action('login_head', 'custom_login_logo');

function login_url()
{
    return "#";
}
add_filter('login_headerurl', 'login_url');

function login_background()
{
    echo '<style type="text/css">
body { background: #486faf; }
.login form { background: #cfd9e3; }
.login #nav a{ color:white;}
.login #backtoblog a { color:White;}
</style>';
}
add_action('login_head', 'login_background');






add_theme_support('post-thumbnails');






add_theme_support('title-tag');


function mi_titulo_personalizado($title)
{
    if (is_single()) {
        $post_id = get_the_ID();
        $categoria = get_the_category($post_id);
        $nombre_categoria = $categoria ? $categoria[0]->name . ' - ' : '';
        $titulo_post = get_the_title($post_id);
        return $nombre_categoria . $titulo_post . ' | ' . get_bloginfo('name');
    }
    return $title;
}
add_filter('pre_get_document_title', 'mi_titulo_personalizado');



function meta_description_personalizada()
{
    if (is_single()) {
        global $post;
        $excerpt = strip_tags($post->post_excerpt ? $post->post_excerpt : wp_trim_words($post->post_content, 30));
        echo '<meta name="description" content="' . esc_attr($excerpt) . '">' . "\n";
    } elseif (is_home() || is_front_page()) {
        echo '<meta name="description" content="' . get_bloginfo('name') . '">' . "\n";
    } else {
        echo '<meta name="description" content="' . get_bloginfo('description') . '">' . "\n";
    }
}
add_action('wp_head', 'meta_description_personalizada');




function mostrar_clima_san_luis()
{
    ob_start();
    ?>
        <div id="widget-clima"></div>
        <script>
            async function obtenerClima() {
                const res = await fetch('https://api.open-meteo.com/v1/forecast?latitude=-33.295&longitude=-66.3356&daily=temperature_2m_max,temperature_2m_min&timezone=America/Argentina/Buenos_Aires');
                const data = await res.json();

                const hoy = 0;
                const tempMin = data.daily.temperature_2m_min[hoy];
                const tempMax = data.daily.temperature_2m_max[hoy];

                document.getElementById("widget-clima").innerHTML = `
                <div style="padding:15px;border-radius:10px;text-align:center;">
                    <h3>Ciudad de San Luis</h3>
                    <p><strong>Mín:</strong> ${tempMin}°C<br><strong>Máx:</strong> ${tempMax}°C</p>
                    <p>Despejado ☀️</p>
                </div>
            `;
            }

            obtenerClima();
        </script>
        <?php
        return ob_get_clean();
    }
    add_shortcode('clima_san_luis', 'mostrar_clima_san_luis');










    function custom_post_types_init()
    {

        register_post_type('noticias', array(
            'labels' => array(
                'name' => 'Noticias',
                'singular_name' => 'Noticia'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'noticias'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-megaphone',
            'taxonomies' => array('post_tag', 'category')
        ));


        register_post_type('podcast', array(
            'labels' => array(
                'name' => 'Podcasts',
                'singular_name' => 'Podcast'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'podcasts'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            'menu_icon' => 'dashicons-microphone',
            'taxonomies' => array('post_tag', 'category')
        ));
    }
    add_action('init', 'custom_post_types_init');





    function mostrar_noticias_por_categoria($categoria_slug, $titulo = '')
    {
        if (!$titulo) {
            $titulo = "Últimas noticias de " . strtoupper(str_replace('-', ' ', $categoria_slug));
        }

        $noticias_query = new WP_Query([
            'post_type' => 'noticias',
            'posts_per_page' => 3,
            'tax_query' => [
                [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => [$categoria_slug],
                ],
            ],
        ]);

        if ($noticias_query->have_posts()) : ?>
            <section class="mb-10">
                <h2 class="sm:text-sm font-normal mb-4"><?php echo esc_html($titulo); ?></h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php while ($noticias_query->have_posts()) : $noticias_query->the_post(); ?>
                        <article class="w-full bg-white rounded shadow-sm overflow-hidden flex-shrink-0 flex flex-col">
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
                                        $categories = get_the_category();
                                        echo !empty($categories) ? esc_html($categories[0]->name) : 'Sin categoría';
                                        ?>
                                    </p>
                                    <h3 class="text-xs sm:text-sm font-semibold leading-snug line-clamp-2"><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php
        endif;

        wp_reset_postdata();
    }


    function mostrar_podcasts_por_categoria($categoria_slug, $titulo = '')
    {
        if (!$titulo) {
            $titulo = "Últimos podcasts de " . strtoupper(str_replace('-', ' ', $categoria_slug));
        }

        $podcast_query = new WP_Query([
            'post_type' => 'podcast',
            'posts_per_page' => 6,
            'tax_query' => [
                [
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => [$categoria_slug],
                ],
            ],
        ]);

        if ($podcast_query->have_posts()) : ?>
            <section>
                <h2 class="sm:text-sm font-normal mb-4"><?php echo esc_html($titulo); ?></h2>
                <div class="flex gap-3 overflow-x-auto pb-2">
                    <?php while ($podcast_query->have_posts()) : $podcast_query->the_post();
                        $audio_url = get_field('audio_podcast');
                        $excerpt = get_field('descripcion_podcast');
                        $title = get_field('titulo');
                        $imagen = get_field('imagen_podcast');
                    ?>
                        <article class="w-64 bg-white rounded shadow-sm overflow-hidden flex-shrink-0 flex flex-col">
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
                                        $categories = get_the_category();
                                        echo !empty($categories) ? esc_html($categories[0]->name) : 'Sin categoría';
                                        ?>
                                    </p>
                                    <h3 class="text-xs sm:text-sm font-semibold leading-snug line-clamp-2"><?php echo esc_html($title); ?></h3>
                                    <?php if ($excerpt): ?>
                                        <p class="text-xs mt-2 text-gray-600 line-clamp-2"><?php echo esc_html($excerpt); ?></p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
    <?php
        endif;

        wp_reset_postdata();
    }
