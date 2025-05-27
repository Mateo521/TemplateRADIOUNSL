<?php
/*
Template Name: Página de Noticias
*/

get_header();
?>

<h1 class="m-0 py-3 bg-white text-center font-bold">Noticias</h1>

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$podcast_cat_id = get_cat_ID('podcast');

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
                    <a href="<?php the_permalink(); ?>">
                        <div class="flex flex-col w-full my-6">
                        <?php
                         $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                     if ($thumbnail_url): ?>
                            <img class="rounded-t-md"   src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        <?php endif; ?>
                        
                            <div class="p-6 w-full bg-white h-full shadow-lg shadow-gray-500/50">
                                <h2 class="font-bold py-4" style="color:#07376A;"><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </a>
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
