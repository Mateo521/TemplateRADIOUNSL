<?php get_header(); ?>

<h1>Podcasts</h1>

<?php if (have_posts()) : ?>
    <div class="podcasts-archive">
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
    </div>
<?php else : ?>
    <p>No hay noticias.</p>
<?php endif; ?>

<?php get_footer();
wp_reset_postdata();
?>