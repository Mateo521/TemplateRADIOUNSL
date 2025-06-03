<?php
/*
Template Name: Página de Noticias
*/

get_header();
?>


<h1 class="m-0 pb-4 pt-8 text-3xl bg-white text-center font-bold">Noticias</h1>
<section class="bg-white pb-2">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $podcast_cat_id = get_cat_ID('podcast');

    // Query para las 3 últimas noticias
    $args_latest = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'paged' => 1,
        'category__not_in' => array($podcast_cat_id),
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $latest_news_query = new WP_Query($args_latest);

    if ($latest_news_query->have_posts()) : ?>
        <div class="swiper-container max-w-7xl my-8 relative " style="position: relative;">
            <style>
                /* Posición relativa para que los botones se ubiquen correctamente */
                .swiper-container {
                    width: 100%;

                    margin: 0 auto;
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                }

                .swiper-slide {
                    position: relative;
                    
                    color: white;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-end;
                    padding: 20px;
                    box-sizing: border-box;
                }

                .swiper-slide::before {
                    content: "";
                    position: absolute;
                    inset: 0;
                    background: linear-gradient(to top, rgba(7, 55, 106, 0.8), rgba(7, 55, 106, 0.3));
                    z-index: 0;
                    border-radius: 12px;
                }

                .swiper-slide>div {
                    position: relative;
                    z-index: 10;
                }

                .swiper-slide .title {
                    font-weight: 700;
                    font-size: 1.5rem;
                    margin-bottom: 0.5rem;
                }

                .swiper-slide .excerpt {
                    font-size: 0.95rem;
                    margin-bottom: 0.75rem;
                    line-height: 1.3;
                }

                .swiper-button-next,
                .swiper-button-prev {
                    color: white;
                    top: 50%;
                    width: 44px;
                    height: 44px;
                    margin-top: -22px;
                    border-radius: 50%;
                    background-color: rgba(7, 55, 106, 0.7);
                    transition: background-color 0.3s ease;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
                }

                .swiper-button-next:hover,
                .swiper-button-prev:hover {
                    background-color: rgba(7, 55, 106, 0.9);
                }

                .swiper-button-next::after,
                .swiper-button-prev::after {
                    font-size: 18px;
                }
            </style>

            <div class="swiper-wrapper">
                <?php while ($latest_news_query->have_posts()) : $latest_news_query->the_post(); ?>
                    <div class="swiper-slide !h-[600px] md:!h-[400px]" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>'); background-size: cover; background-position: center;">
                        <div class="px-3 md:px-14">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <div class="excerpt"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="inline-block text-white font-semibold underline hover:text-gray-200 transition-colors duration-300">
                                Leer más <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Agregar botones de navegación -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
</section>



<?php endif;
    wp_reset_postdata(); ?>

<?php
// Query para las noticias restantes
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'paged' => $paged,
    'category__not_in' => array($podcast_cat_id),
);

$noticias_query = new WP_Query($args);

if ($noticias_query->have_posts()) : ?>

    <div class="flex justify-center p-8 bg-white">
        <div class="max-w-screen-xl w-full">
            <div class="grid md:grid-cols-3 gap-8">

                <?php while ($noticias_query->have_posts()) : $noticias_query->the_post(); ?>
                    <div class="flex flex-col w-full my-6 bg-white rounded-md shadow-lg shadow-gray-500/50 overflow-hidden transition-transform duration-300 hover:scale-101 hover:shadow-xl">
                        <?php
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        if ($thumbnail_url): ?>
                            <img class="rounded-t-md w-full object-cover" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                        <?php endif; ?>
                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="font-bold py-4 text-[#07376A] text-lg leading-tight"><?php the_title(); ?></h2>
                            <div class="flex-grow text-gray-700 text-sm leading-relaxed"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="mt-4 inline-block text-[#07376A] font-semibold hover:text-[#05507a] transition-colors duration-300">
                                Leer más <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>

    <div class="pagination bg-white">
        <?php
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%/',
            'current' => $paged,
            'total' => $noticias_query->max_num_pages,
            'prev_text' => __('&laquo; Anterior'),
            'next_text' => __('Siguiente &raquo;')
        ));
        ?>
    </div>

<?php else : ?>
    <p class="text-center py-10">No se encontraron noticias.</p>
<?php endif;

wp_reset_postdata();
?>




<style>
    .pagination {
        justify-content: center;
        display: flex;
        align-items: center;
        padding: 20px;
    }

    .pagination .current {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ccc;
        color: whitesmoke;
        background-color: #282828;
        text-decoration: none;
    }

    .pagination .current:hover {
        color: white;
    }

    .pagination a {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ccc;
        background-color: #f4f4f4;
        text-decoration: none;
    }

    .pagination a:hover {
        background-color: #ddd;
    }
</style>

<?php
get_footer();
