<?php
get_header();
$args = array(
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'category__not_in' => array(
        get_cat_ID('pdocast'),
        get_cat_ID('institucional'),
        /* get_cat_ID('NombreCategoria3')*/
    )
);


$args_estatico = array(
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'category__not_in' => array(7, 8)
);


$args_podcasts = array(
    'category_name' => 'podcast',
    'posts_per_page' => 9
);

$args_institucional = array(
    'category_name' => 'institucional',
    'posts_per_page' => 1
);

$args_programacion = array(
    'category_name' => 'programacion',
    'posts_per_page' => 9
);


$latest_posts = new WP_Query($args);
$estaticos_posts = new WP_Query($args_estatico);
$podcasts_query = new WP_Query($args_podcasts);
$programacion_query = new WP_Query($args_programacion);
$institucional_query = new WP_Query($args_institucional);



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
?>


<!-- CAROUSEL -->




<?php wp_reset_postdata();  ?>


<div class="swiper mySwiper">
    <div class="swiper-wrapper">

        <!-- Slide de la noticia desde RSS -->
        <div class="swiper-slide">
            <a href="<?php echo esc_url($link); ?>" target="_blank">
                <div class="carousel-r w-full h-[400px] bg-cover bg-center relative " style="background-image: url('<?php echo esc_url($image); ?>');">

                    <div class="absolute inset-0  flex flex-col justify-end">
                        <div class="bg-gradient-to-t from-black to-transparent  p-6">
                            <h4 class="bg-[#0f3349] text-white px-3 py-1 rounded mb-2 inline-flex w-max">NOTICIAS UNSL</h4>
                            <?php foreach ($categories as $cat): ?>
                                <span class="bg-[#1476B3] text-white px-2 py-1 inline-flex w-max rounded mr-1 text-xs"><?php echo esc_html($cat); ?></span>
                            <?php endforeach; ?>
                            <h3 class="text-white text-2xl mt-3"><?php echo esc_html($title); ?></h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Slides desde posts -->
        <?php foreach ($latest_posts->posts as $post) : setup_postdata($post); ?>
            <?php
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $entry_title = get_the_title();
            $entry_tags = get_the_tags();
            ?>
            <div class="swiper-slide">
                <a href="<?php the_permalink(); ?>">
                    <div class="w-full carousel-r  h-[400px] bg-cover bg-center relative bg-[url('<?php echo esc_url($image_url); ?>')]">

                        <div class="absolute inset-0  flex flex-col justify-end">
                            <div class="bg-gradient-to-t from-black to-transparent  p-6">
                                <h4 class="bg-[#0f3349] w-max text-white px-3 py-1 rounded mb-2 inline-flex">RADIO UNSL</h4>
                                <?php if ($entry_tags): ?>
                                    <?php foreach ($entry_tags as $tag): ?>
                                        <span class="bg-[#1476B3] w-max inline-flex gap-1 text-white px-2 py-1 rounded mr-1 text-xs"><?php echo esc_html($tag->name); ?></span>
                                    <?php endforeach; ?>

                                <?php endif; ?>
                                <h3 class="text-white text-2xl mt-3"><?php echo esc_html($entry_title); ?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Botones y paginación -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev !text-blue-300 md:!left-[30px]"></div>
    <div class="swiper-button-next !text-blue-300 md:!right-[30px]"></div>
</div>


<!-- FINCAROUSEL -->
<!-- SECCION NOTICIAS -->
<section style="background-color: #F0F0F0;" class="p-6">
    <div class="flex justify-center">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-12 max-w-screen-xl h-full">

            <div class="flex flex-col w-full ">
                <?php foreach ($institucional_query->posts as $post) :
                    setup_postdata($post);

                    $content = get_the_content();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $entry_title = get_the_title();
                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');

                    $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';
                ?>
                    <a href="<?php the_permalink(); ?>">
                        <img class="w-full" src="<?php echo esc_url($image_url); ?>" id="noticia-g" alt="<?php echo esc_attr($entry_title); ?>">
                    </a>

                    <div class="px-6 py-3 w-full bg-white h-full noticia-d shadow-lg shadow-gray-500/50">
                        <a href="<?php the_permalink(); ?>">
                            <p style="color: #486faf; text-transform: uppercase;" class="font-bold py-1"><?php echo esc_html($entry_title); ?></p>
                        </a>

                        <a href="<?php the_permalink(); ?>">
                            <?php the_excerpt(); ?>
                        </a>

                        <div class="flex items-center justify-between gap-3 pt-4">
                            <?php
                            if (!empty($categories)) {
                                echo '<h5 class="text-md font-bold tracking-tight" style="text-transform:uppercase;font-size:12px;">';
                                foreach ($categories as $index => $category) {
                                    if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                                        $category_link = get_category_link($category->term_id);
                                        echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';

                                        if ($index !== count($categories) - 1) {
                                            echo ', ';
                                        }
                                    }
                                }
                                echo '</h5>';
                            }
                            ?>
                            <h5><?php echo esc_html($entry_date); ?></h5>
                        </div>
                    </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>
            <style>
                .noticia-d {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    will-change: transform, box-shadow;
                }

                .noticia-d:hover {
                    transform: translateY(-6px) scale(1.01);
                    box-shadow: 0 20px 30px rgba(72, 111, 175, 0.3);
                    z-index: 10;
                }

                .noticia-d img {
                    transition: transform 0.4s ease;
                }

                .noticia-d:hover img {
                    transform: scale(1.01);
                }

                /*
        a h3 {
            transition: color 0.3s ease;
        }

        a:hover h3 {
            color: #2c5282;
        }

        
        a h3::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #486faf;
            transition: width 0.3s ease;
            margin-top: 4px;
            border-radius: 2px;
        }
*/
                a:hover h3::after {
                    width: 100%;
                }

                .category-links a {
                    position: relative;
                    color: #486faf;
                    font-weight: 600;
                    transition: color 0.3s ease;
                }

                .category-links a::after {
                    content: '';
                    position: absolute;
                    width: 0;
                    height: 1.5px;
                    bottom: -2px;
                    left: 0;
                    background-color: #486faf;
                    transition: width 0.3s ease;
                    border-radius: 1px;
                }

                .category-links a:hover {
                    color: #2c5282;
                }

                .category-links a:hover::after {
                    width: 100%;
                }

                /*
        #news-audio audio {
            width: 100%;
            outline-offset: 4px;
            outline-color: #486faf;
            outline-style: solid;
            outline-width: 2px;
            border-radius: 0.375rem;
        }*/
            </style>
            <div class="grid grid-col-1 items-center gap-3">
                <?php
                $counter = 0;
                foreach ($latest_posts->posts as $post) :
                    setup_postdata($post);

                    $content = get_the_content();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $entry_title = get_the_title();
                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');
                    $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';
                ?>
                    <div class="w-full noticia-d shadow-lg shadow-gray-500/50">
                        <div class="grid md:grid-cols-2 rounded-lg grid-cols-1">


                            <?php if ($image_url) : ?>
                                <img class="w-full h-full  object-cover rounded-l-lg" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>">
                            <?php endif; ?>


                            <div class="p-3 bg-white rounded-r-lg">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 style="color: #486faf;" class="font-bold py-1"><?php echo esc_html($entry_title); ?></h3>

                                    <p class="py-2">
                                        <?php
                                        $contenido = wp_strip_all_tags(get_the_content());
                                        $limiteCaracteres = 50;

                                        $textoRecortado = strlen($contenido) > $limiteCaracteres
                                            ? substr($contenido, 0, $limiteCaracteres) . '...'
                                            : $contenido;

                                        echo $textoRecortado;
                                        ?>
                                    </p>

                                    <div class="flex items-center justify-between gap-3" style="flex-wrap:wrap;">
                                        <h5><?php echo esc_html($entry_date); ?></h5>

                                        <?php
                                        if (!empty($categories)) {
                                            echo '<h5 class="text-md font-bold tracking-tight" style="text-transform:uppercase;font-size:12px;">';
                                            foreach ($categories as $index => $category) {
                                                if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                                                    $category_link = get_category_link($category->term_id);
                                                    echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
                                                    if ($index !== count($categories) - 1) {
                                                        echo ', ';
                                                    }
                                                }
                                            }
                                            echo '</h5>';
                                        }
                                        ?>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <?php if (preg_match($pattern, $content, $matches2)) : ?>
                            <div class="w-full bg-white rounded-b-lg" id="news-audio" style="margin:0;">
                                <?php echo $matches2[0]; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach;
                wp_reset_postdata(); ?>
            </div>



        </div>

    </div>
    <div class="flex justify-center" style="padding: 50px 0;">
        <a href="<?php echo esc_url(home_url('/noticias')); ?>">
            <div class="m-6 p-3 text-center rounded-lg inline-flex text-white justify-center" style="background-color: #486faf;">Más noticias</div>
        </a>
    </div>
</section>
<!-- FINSECCION NOTICIAS -->



<!-- SECCION SLIDER -->

<section class="bg-[#F0F0F0]  p-6 ">
    <div class="swiper newSwiper max-w-7xl h-96 rounded-lg">
        <div class="swiper-wrapper ">
            <div class="swiper-slide relative w-full">
                <img alt="Radio studio with people wearing headphones and microphones, computers and radio equipment on a wooden table" class="w-full h-full object-center object-cover" height="300" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" width="1200" />
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="font-italic-bold text-[32px] sm:text-[36px] md:text-[40px] leading-tight text-center">
                        NADA SECRETO
                    </h1>
                    <p class="mt-2 text-[20px] sm:text-[22px] md:text-[24px] font-semibold flex items-center gap-2">
                        <i class="fas fa-clock">
                        </i>
                        LUNES a VIERNES: 7 a 9:30 h
                    </p>
                    <button class="mt-4 bg-red-700 hover:bg-red-800 text-white font-semibold text-[16px] sm:text-[18px] py-1 px-4 rounded">
                        AL AIRE
                    </button>
                </div>
            </div>
            <div class="swiper-slide relative w-full">
                <img alt="Radio studio with people wearing headphones and microphones, computers and radio equipment on a wooden table" class="w-full h-full object-center object-cover" height="300" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" width="1200" />
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="font-italic-bold text-[32px] sm:text-[36px] md:text-[40px] leading-tight text-center">
                        HACIENDO RUIDO
                    </h1>
                    <p class="mt-2 text-[20px] sm:text-[22px] md:text-[24px] font-semibold flex items-center gap-2">
                        <i class="fas fa-clock">
                        </i>
                        LUNES a VIERNES: 9 a 13 h
                    </p>
                    <button class="mt-4 bg-red-700 hover:bg-red-800 text-white font-semibold text-[16px] sm:text-[18px] py-1 px-4 rounded">
                        AL AIRE
                    </button>
                </div>
            </div>
            <div class="swiper-slide relative w-full">
                <img alt="Radio studio with people wearing headphones and microphones, computers and radio equipment on a wooden table" class="w-full h-full object-center object-cover" height="300" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" width="1200" />
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="font-italic-bold text-[32px] sm:text-[36px] md:text-[40px] leading-tight text-center">
                        FRECUENCIA INFORMATIVA
                    </h1>
                    <p class="mt-2 text-[20px] sm:text-[22px] md:text-[24px] font-semibold flex items-center gap-2">
                        <i class="fas fa-clock text-center">
                        </i>
                        LUNES a VIERNES:
                    <p class="text-xl"> 10 a 10:15 h <br> 12 a 12:15 h <br> 16 a 16:15 h <br> 20 a 20:15 h </p>
                    </p>
                    <button class="mt-4 bg-red-700 hover:bg-red-800 text-white font-semibold text-[16px] sm:text-[18px] py-1 px-4 rounded">
                        AL AIRE
                    </button>
                </div>
            </div>
            <div class="swiper-slide relative w-full">
                <img alt="Radio studio with people wearing headphones and microphones, computers and radio equipment on a wooden table" class="w-full h-full object-center object-cover" height="300" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" width="1200" />
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="font-italic-bold text-[32px] sm:text-[36px] md:text-[40px] leading-tight text-center">
                        SOLO UN CAFÉ
                    </h1>
                    <p class="mt-2 text-[20px] sm:text-[22px] md:text-[24px] font-semibold flex items-center gap-2">
                        <i class="fas fa-clock">
                        </i>
                        LUNES a VIERNES: 13 a 14 h
                    </p>
                    <button class="mt-4 bg-red-700 hover:bg-red-800 text-white font-semibold text-[16px] sm:text-[18px] py-1 px-4 rounded">
                        AL AIRE
                    </button>
                </div>
            </div>
            <div class="swiper-slide relative w-full">
                <img alt="Radio studio with people wearing headphones and microphones, computers and radio equipment on a wooden table" class="w-full h-full object-center object-cover" height="300" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" width="1200" />
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="font-italic-bold text-[32px] sm:text-[36px] md:text-[40px] leading-tight text-center">
                        ROCK DEL PAÍS
                    </h1>
                    <p class="mt-2 text-[20px] sm:text-[22px] md:text-[24px] font-semibold flex items-center gap-2">
                        <i class="fas fa-clock">
                        </i>
                        LUNES a VIERNES: 21 a 23 h
                    </p>
                    <button class="mt-4 bg-red-700 hover:bg-red-800 text-white font-semibold text-[16px] sm:text-[18px] py-1 px-4 rounded">
                        AL AIRE
                    </button>
                </div>
            </div>
            <div class="swiper-slide relative w-full">
                <img alt="Radio studio with people wearing headphones and microphones, computers and radio equipment on a wooden table" class="w-full h-full object-center object-cover" height="300" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" width="1200" />
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center text-white px-4">
                    <h1 class="font-italic-bold text-[32px] sm:text-[36px] md:text-[40px] leading-tight text-center">
                        Finanzas para todos
                    </h1>
                    <p class="mt-2 text-[20px] sm:text-[22px] md:text-[24px] font-semibold flex items-center gap-2">
                        <i class="fas fa-clock">
                        </i>
                        MARTES: 14 h
                    </p>
                    <button class="mt-4 bg-red-700 hover:bg-red-800 text-white font-semibold text-[16px] sm:text-[18px] py-1 px-4 rounded">
                        AL AIRE
                    </button>
                </div>
            </div>
        </div>
        <div class="swiper-pagination mt-3">
        </div>
    </div>

</section>
<!-- FINSECCION SLIDER -->




<style>
    #news-audio .wp-block-audio audio {
        padding: 0;
    }

    .entry-title {
        font-size: 3.75rem;
        line-height: 1;
        margin-top: 1rem;
    }

    .carousel-r {
        animation-name: slidein;
        animation: desp-x 50s infinite;
    }

    @media screen and (min-width:1111px) {
        .carousel-r {
            animation: desp-y 75s infinite;
        }
    }

    @media screen and (max-width:766px) {





        .entry-title {
            font-size: 25px;
        }

    }

    .slide {
        pointer-events: none;
    }

    .slider {
        box-sizing: border-box;
        background: #F0F0F0;
        width: 100%;
        height: 350px;
        overflow: hidden;
    }

    .slider .slides-container {
        display: flex;
        width: 100%;
        height: 100%;
        cursor: -webkit-grab;
        cursor: grab;
        transition: transform .5s;
    }

    .slider:active .slides-container {
        cursor: -webkit-grabbing;
        cursor: grabbing;
    }

    .slider .slides-container.moving {
        transition: none;
    }

    .slider .slides-container.moving .slide {
        transition: none;
    }

    .slider .slides-container.moving .parallax {
        transition: none;
    }



    .swiper-pagination-bullet {
        background-color: rgb(203, 228, 255) !important;

    }

    .slider .slide {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;

        opacity: .8;
        transform: scale(.9);
        transform-origin: center;
        transition: transform .5s, opacity .5s;
    }

    .slider .slide.current {
        background-color: blue;
        opacity: 1;
        transform: scale(1);
    }

    .slider .slide .parallax {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        pointer-events: none;
        transition: transform .5s, opacity .5s;
    }

    .slider .slide.current .parallax {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }

    .slider .slide .parallax .center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        text-align: center;
        color: white;
        font-family: Circular, sans-serif;
        font-size: 3em;
    }

    #pod-card audio::-webkit-media-controls-play-button,
    #pod-card audio::-webkit-media-controls-panel {
        background-color: #E5CC26;
    }


    #podcast {
        padding: 0;
    }
</style>


<!-- SECCION PODCAST -->




<section style="background-color: #010B15;">
    <h1 class="text-center " id="podcast">PODCAST</h1>



    <div class="flex justify-center">
        <div class=" max-w-screen-xl p-6" id="podcasts-6">
            <div class="flex justify-center gap-8" id="pod-card">

                <?php


                if ($podcasts_query->have_posts()) :
                    $counter = 0;
                    while ($podcasts_query->have_posts()) :
                        $counter++;

                        $podcasts_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                        $content = get_the_content();

                        $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';

                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');


                        $short_content = mb_substr($content, 0, 400);
                        if (strlen($content) > 400) {
                            $short_content .= '...';
                        }

                        // Obtener título y etiquetas

                        $entry_title = get_the_title();
                        $categories = get_the_category();
                        $entry_date = get_the_date('d/m/Y');

                        if ($counter >= 4) :
                            continue;
                        endif;


                ?>
                        <!--style="grid-template-rows:1fr 1fr;"-->



                        <div class="rounded-lg w-full shadow dark:bg-gray-800 dark:border-gray-700 relative w-full">
                            <!--style="height:0;"-->
                            <div class="relative z-1 card-image-wrapper rounded-t-lg" style="height:275px;">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="absolute flex flex-col justify-center p-3" style="right: 0; bottom:0; z-index:3; background-color:#e5cc2663;">
                                        <svg id="svgs-pod" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                        </svg>
                                        <p class="hora text-center p-1 text-white"></p>
                                    </div>
                                    <img class=" w-full h-full object-cover absolute" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" />
                                </a>
                            </div>
                            <div>



                                <div class="p-5" style="background-color:#041824 ;">


                                    <a href="<?php the_permalink(); ?>" class="flex gap-5 w-full justify-between">







                                        <p class="mb-3 font-bold text-white dark:text-gray-400" style="color:#E5CC26;">
                                            <?php echo esc_html($entry_title); ?>


                                    </a>

                                    <a href="<?php the_permalink(); ?>">
                                        <p class="py-2 text-white">
                                            <?php

                                            $contenido = wp_strip_all_tags(get_the_content());
                                            $textoRecortado = wp_trim_words($contenido, 20, '...');
                                            echo $textoRecortado;
                                            ?>
                                        </p>
                                    </a>



                                    <div class="flex items-center justify-between">
                                        <h6 class="text-gray-500"><?php echo esc_html($entry_date); ?></h6>
                                        <?php


                                        if (!empty($categories)) {
                                            echo '<h5 class="text-white text-md font-bold tracking-tight" style="text-transform:uppercase;font-size:12px;">';

                                            foreach ($categories as $index => $category) {
                                                if ($category->slug !== "sin-categoria" && $category->slug !== "podcast") {
                                                    $category_link = get_category_link($category->term_id); // Obtenemos el enlace de la categoría
                                                    echo '<a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';

                                                    if ($index !== count($categories) - 1) {
                                                        echo ' '; // Agregar coma y espacio entre categorías
                                                    }
                                                }
                                            }

                                            echo '</h5>';
                                        }

                                        ?>








                                        <!--   <p class="mb-3 font-normal text-white dark:text-gray-400"><?php echo esc_html(strip_tags($short_content)); ?></p> -->
                                    </div>
                                </div>
                                <?php
                                if (preg_match($pattern, $content, $matches2)) {
                                    echo $matches2[0];
                                }
                                ?>
                            </div>

                        </div>

                <?php
                    endwhile;
                //  wp_reset_postdata();
                endif;
                ?>

            </div>





            <div class="grid gap-4 grid-cols-1 md:grid-cols-6 py-6 px-2" id="grids">

                <?php
                if ($podcasts_query->have_posts()) :
                    $counter = 0;
                    while ($podcasts_query->have_posts()) :
                        $counter++;

                        $podcasts_query->the_post();
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $entry_title = get_the_title();
                        $categories = get_the_category();
                        $content = get_the_content();
                        $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';
                        $has_audio = preg_match($pattern, $content, $matches2);
                        $card_classes = ''; #flex flex-col h-full rounded-lg shadow bg-white overflow-hidden transition-all duration-300
                        if ($has_audio) {
                            $card_classes .= ' has-audio';
                        }

                        if ($counter > 3) {
                            $has_audio = preg_match($pattern, $content, $matches2);
                            if ($has_audio) {
                                echo "<!-- Post $counter HAS AUDIO -->";
                            } else {
                                echo "<!-- Post $counter has NO audio -->";
                            }
                        }


                        if ($counter <= 3) continue;
                ?>

                        <div class="flex  flex-col h-full rounded-lg shadow bg-white overflow-hidden">
                            <a href="<?php the_permalink(); ?>" class="relative card-image-wrapper block h-24 w-full overflow-hidden">
                                <img class="w-full h-full object-cover" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" />

                                <div class="absolute right-0 bottom-0 p-1 bg-black bg-opacity-60 flex items-center justify-center">
                                    <svg class="svgs" height="2.5em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                    </svg>
                                </div>
                            </a>

                            <div class="flex-1 flex flex-col justify-between bg-[#F5F5F5] px-3 py-2">
                                <div>
                                    <a href="<?php the_permalink(); ?>">
                                        <p class="font-bold text-sm line-clamp-2 mb-2"><?php echo esc_html($entry_title); ?></p>
                                    </a>

                                    <?php if (!empty($categories)) : ?>
                                        <h5 class="text-xs font-semibold uppercase tracking-tight">
                                            <?php
                                            foreach ($categories as $index => $category) {
                                                if (!in_array($category->slug, ['sin-categoria', 'podcast'])) {
                                                    $link = get_category_link($category->term_id);
                                                    echo '<a href="' . esc_url($link) . '">' . esc_html($category->name) . '</a> ';
                                                }
                                            }
                                            ?>
                                        </h5>
                                    <?php endif; ?>
                                </div>
                                <div class="<?php echo $card_classes; ?>">
                                    <?php
                                    if (preg_match($pattern, $content, $matches2)) {
                                        echo $matches2[0];
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>



            <div class="flex justify-center" style="padding: 50px 0;">
                <a href="<?php echo esc_url(home_url('/podcasts')); ?>">
                    <div class="m-6 p-3 text-center font-bold rounded-lg inline-flex justify-center" style="background-color: #E5CC26;">Más podcasts</div>
                </a>
            </div>
        </div>

    </div>

    <style>
        #boxes figure {
            background-color: #F5F5F5;
        }
    </style>

</section>
<!-- FINSECCION PODCAST -->

<!-- SECCION CARD -->
<section class="bg-white">
    <div class="max-w-screen-xl  bg-white" id="card-i">
        <div class="grid grid-cols-2 shadow-lg shadow-gray-500/50" id="historia">
            <img class="w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/aire.png" alt="">
            <div class=" w-full text-center md:px-6 px-2 py-3  ">
                <h1 class="md:text-5xl text-2xl font-bold p-6" id="title-card">30 años de Radio Universidad</h1>
                <p class="text-xl p-3 md:p-6 font-bold" id="title-card-2">La misión de la emisora es representar los valores de
                    una universidad abierta que se vincula con la comunidad que le da sentido y justifica su razón de
                    ser.</p>
                <a href="<?php echo esc_url(home_url('/institucional')); ?>">
                    <p class="rounded-lg p-4 text-white inline-flex" style="background-color: #486faf;"> Conocé nuestra
                        historia</p>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- FINSECCION CARD -->

<!-- SECCION FORMULARIO -->
<h1 class="py-6 md:text-4xl text-2xl font-bold text-center bg-white" style="color:#486faf;">Dejanos un mensaje</h1>
<div class="flex justify-center  bg-white">

    <div style="max-width: 640px;width: 100%;">

        <form class="p-6" method="post" action="">
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input autocomplete="on" type="text" id="nombre" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu nombre" required>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mail</label>
                <input autocomplete="on" name="email" type="email" id="mail" placeholder="Tu mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mensaje</label>
                <textarea name="message" placeholder="Tu mensaje" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required style="padding: 5px 5px 45px 5px;"></textarea>
            </div>
            <button name="contact_form_submit" style="position: relative; left: 50%; transform: translateX(-50%); background-color: #486faf; margin: 50px 0 100px 0;" type="submit" class=" text-white text-center  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600">Enviar
                mensaje</button>
        </form>
    </div>
</div>
<!-- FINSECCION FORMULARIO -->




<!--div class="relative w-full  p-6 text-white" >
   <div class="backdrop-brightness-50 backdrop-blur-sm p-6 rounded-lg">
    <h1 class="font-fredoka text-3xl text-white text-center leading-tight">
     Pronóstico del Clima
    </h1>
    <p class="text-center text-base mt-1 mb-6">
     Viernes 6 de junio
    </p>
    <div class="text-center mb-6">
     <h2 class="font-bold uppercase text-white text-lg mb-3">
      Ciudad de San Luis
     </h2>
     <div class="flex justify-center items-center space-x-6">
      <div class="flex flex-col items-center">
       <img alt="Ícono de sol amarillo brillante para clima despejado" class="w-12 h-12" height="48" src="https://storage.googleapis.com/a1aa/image/640bcd42-5e0d-4e04-97fe-f6300c376805.jpg" width="48"/>
       <p class="text-xs mt-1">
        Despejado
       </p>
      </div>
      <div class="flex flex-col items-center">
       <span class="font-fredoka text-6xl leading-none">
        5°
       </span>
       <span class="text-sm font-semibold">
        Min.
       </span>
      </div>
      <div class="flex flex-col items-center">
       <span class="font-fredoka text-6xl leading-none">
        23°
       </span>
       <span class="text-sm font-semibold">
        Max.
       </span>
      </div>
     </div>
    </div>
    <hr class="border-t border-white border-opacity-40 mb-4"/>
    <div class="space-y-4 text-white text-sm font-semibold">
     <div class="flex items-center justify-between border-b border-white border-opacity-40 pb-2">
      <span class="uppercase font-bold">
       Villa Mercedes
      </span>
      <div class="flex items-center space-x-2">
       <img alt="Ícono de sol amarillo para clima despejado" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/33f3cfd8-13e8-47c5-e64e-ab58f8e5e8b9.jpg" width="24"/>
       <div class="text-right">
        <p>
         Min: 3°C
        </p>
        <p>
         Máx: 23°C
        </p>
       </div>
      </div>
     </div>
     <div class="flex items-center justify-between border-b border-white border-opacity-40 pb-2">
      <span class="uppercase font-bold">
       Villa de Merlo
      </span>
      <div class="flex items-center space-x-2">
       <img alt="Ícono de sol con nube para clima parcialmente nublado" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/25ac39d5-d04e-4135-bf59-21b431a2926f.jpg" width="24"/>
       <div class="text-right">
        <p>
         Min: 7°C
        </p>
        <p>
         Máx: 21°C
        </p>
       </div>
      </div>
     </div>
     <div class="flex items-center justify-between border-b border-white border-opacity-40 pb-2">
      <span class="uppercase font-bold">
       Unión
      </span>
      <div class="flex items-center space-x-2">
       <img alt="Ícono de sol amarillo para clima despejado" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/33f3cfd8-13e8-47c5-e64e-ab58f8e5e8b9.jpg" width="24"/>
       <div class="text-right">
        <p>
         Min: 5°C
        </p>
        <p>
         Máx: 26°C
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div-->



<?php
get_footer();
?>