<?php


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'category_name' => 'podcast', // Cambia esto al slug de tu categoría
    'post_type' => 'post', // Cambia esto al tipo de contenido de tus noticias si es diferente
    'posts_per_page' => 12, // Cambia el número de noticias por página según la preferencia :)
    'paged' => $paged
);
/*
Template Name: Plantilla de Podcasts
*/

get_header();
$the_query = new WP_Query($args);
?>


<div class="flex justify-center p-8" style="background-color:#010B15;">
    <div class="max-w-screen-xl w-full">

        <div class="grid md:grid-cols-3 gap-8">


            <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) :


                    $the_query->the_post();
                    $content = get_the_content();


                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    // Obtener título y etiquetas
                    $entry_title = get_the_title();

                    $categories = get_the_category();
                    $entry_date = get_the_date('d/m/Y');

                    $pattern = '/<figure[^>]*class="wp-block-audio"[^>]*>.*?<\/figure>/is';
            ?>

                    <div class="max-w-sm rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative w-full">
                        <!--style="height:0;"-->
                        <div class="relative z-1" style="height:275px;">
                            <a href="<?php the_permalink(); ?>">
                                <div class="absolute flex flex-col justify-center p-3" style="right: 0; bottom:0; z-index:3; background-color:#e5cc2663;">
                                    <svg id="svgs-pod" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                    </svg>
                                    <p class="hora text-center p-1 text-white"></p>
                                </div>
                                <img class="rounded-t-lg w-full h-full object-cover absolute" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_attr($entry_title); ?>" />
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



            <?php endwhile;
            endif; ?>
        </div>
        <!-- Agregar enlace a la página anterior y siguiente -->
        <div class="flex justify-center gap-8 items-center">

            <?php echo paginate_links(array(
                'total' => $the_query->max_num_pages,
                'current' => $paged,
                'prev_text' => '< Anterior',
                'next_text' => 'Siguiente >'
            )); ?>

        </div>


    </div>
</div>
<style>
    audio::-webkit-media-controls-play-button,
    audio::-webkit-media-controls-panel {
        background-color: #E5CC26;

    }

    .next,
    .prev {
        color: #486faf;
        font-weight: 700;

    }

    .current {
        background-color: #A9A9A9;
        padding: 5px 15px;
        border-radius: 4px;
    }
</style>
<?php wp_reset_postdata(); // Restaurar datos originales de la consulta 
?>







<?php get_footer(); ?>