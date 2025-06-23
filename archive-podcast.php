<?php get_header(); ?>


<header class="flex justify-center items-center bg-[#f3f3f3] py-2 border-b border-gray-300">
  <div class="flex justify-center md:gap-12 gap-3 items-baseline">
    <h1 id="titulo-categoria" class="font-bold text- text-[#e6c94a]" style=" font-family: 'Antonio', sans-serif;">PODCASTS</h1>
    <img id="img-c" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-12.png" alt="">
  </div>
</header>

<main
  class="max-w-[1200px] mx-auto px-4 py-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php

  if (have_posts()) :
    while (have_posts()) : the_post();
      $audio_url = get_field('audio_podcast');
      $date = get_the_date('d/m/Y');
      $category = get_the_category();
      $category_name = !empty($category) ? $category[0]->name : 'Podcast';
      $category_slug = !empty($category) ? $category[0]->slug : 'podcast';
      $duration = get_post_meta(get_the_ID(), 'podcast_duration', true);
      $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      if (!$thumbnail_url) {
        $thumbnail_url = 'https://placehold.co/320x180?text=No+Image';
      }
      $excerpt = get_the_excerpt();
      $title = get_the_title();
      $permalink = get_permalink();
  ?>


      <article class="bg-[#0a1626] relative rounded-md overflow-hidden group">
        <a href="<?php echo esc_url($permalink); ?>" class="block">
          <img
            alt="<?php echo esc_attr($title); ?> thumbnail"
            class="w-full h-[180px] object-cover rounded-t-md"
            height="180"
            src="<?php echo esc_url($thumbnail_url); ?>"
            width="320"
            loading="lazy" />
          <div class="p-3 text-sm space-y-1">
            <p class="text-[#e6c94a] font-bold uppercase"><?php echo esc_html($category_name); ?></p>
            <p class="text-[#6a7a8a]"><?php echo esc_html($date); ?></p>
            <p class="text-white font-semibold leading-tight"><?php echo esc_html($title); ?></p>
            <p class="text-[#6a7a8a] leading-snug"><?php echo esc_html(wp_trim_words($excerpt, 30, '...')); ?></p>
          </div>
        </a>

        <!-- Botón de reproducción -->
        <button
          aria-label="Play podcast"
          class="play-button absolute bottom-3 right-3 bg-[#e6c94a] w-6 h-6 rounded-full flex items-center justify-center z-10"
          onclick="toggleAudio(this)">
          <i class="fas fa-play text-[#0a1626] text-sm"></i>
        </button>

        <?php if ($duration) : ?>
          <div class="absolute bottom-3 right-10 text-sm text-white bg-[#0a1626cc] rounded px-1">
            <?php echo esc_html($duration); ?>
          </div>
        <?php endif; ?>

        <?php if ($audio_url): ?>
          <div class="audio-wrapper opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
            <audio class="audio-element w-full mt-2" controls>
              <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
              Tu navegador no soporta audio HTML5.
            </audio>
          </div>
        <?php endif; ?>
      </article>

    <?php
    endwhile;
  else :
    ?>
    <p class="col-span-full text-center text-gray-400">
      No podcasts found.
    </p>
  <?php
  endif;
  ?>
</main>
<?php


the_posts_pagination(array(
    'mid_size' => 1,
    'prev_text' => '←',
    'next_text' => 'Siguiente →',
    'screen_reader_text' => '',
));





get_footer();

?>