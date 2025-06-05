<?php
/*
Template Name: Página de Noticias
*/

get_header();
?>


 <div class="flex justify-center md:gap-12 gap-3 items-baseline" style="background-color: white; padding:15px 0;">
        <h1 id="titulo-categoria" class="font-bold" style=" font-family: 'Antonio', sans-serif;">NOTICIAS</h1>
        <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-2.png" alt="">
    </div>
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
    <article class="flex flex-col w-full my-6 bg-white rounded-md shadow-lg shadow-gray-500/20 overflow-hidden hover-scale">
        <a aria-label="Leer noticia: <?php echo esc_attr(get_the_title()); ?>" class="card-link" href="<?php the_permalink(); ?>">
            <div class="card-image-wrapper">
                <?php
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if ($thumbnail_url): ?>
                    <img 
                        alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?: 'Imagen destacada de la noticia'); ?>" 
                        height="338" 
                        loading="lazy" 
                        src="<?php echo esc_url($thumbnail_url); ?>" 
                        width="600" 
                    />
                <?php endif; ?>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h2 class="font-bold py-4 text-[#486faf] text-lg leading-tight">
                    <?php the_title(); ?>
                </h2>
                <p class="flex-grow text-gray-700 text-sm leading-relaxed clamp-4">
                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                </p>
                <div class="mt-4 inline-flex items-center text-[#486faf] font-semibold hover:text-[#05507a] transition-colors duration-300">
                    Leer más
                    <i class="fas fa-arrow-right ml-2"></i>
                </div>
            </div>
        </a>
    </article>
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


 .hover-scale {
      transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1),
        box-shadow 0.35s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform, box-shadow;
    }
    .hover-scale:hover {
      transform: scale(1.03);
      box-shadow: 0 20px 40px rgba(72, 111, 175, 0.4);
      z-index: 10;
    }
    /* Fix image aspect ratio and uniform height */
    .card-image-wrapper {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 Aspect Ratio */
      overflow: hidden;
      border-top-left-radius: 0.375rem; /* rounded-t-md */
      border-top-right-radius: 0.375rem;
      background: #e2e8f0;
    }
    .card-image-wrapper img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      transition: transform 0.5s ease;
      border-top-left-radius: 0.375rem;
      border-top-right-radius: 0.375rem;
      will-change: transform;
    }
    .card-image-wrapper:hover img {
      transform: scale(1.1);
    }
    /* Entire card clickable */
    .card-link {
      display: block;
      color: inherit;
      text-decoration: none;
      height: 100%;
    }
    .card-link:focus-visible {
      outline: 3px solid #486faf;
      outline-offset: 3px;
    }
    /* Clamp excerpt to 4 lines */
    .clamp-4 {
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }


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
