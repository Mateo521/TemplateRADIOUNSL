<div class="bg-[#F0F0F0] px-4 py-0">
    <div class="grid grid-cols-1 max-w-6xl mx-auto md:grid-cols-3 gap-6">
        <?php

        $args = array(
            'post_type'      => 'noticias',
            'posts_per_page' => 1,
            'category_name'  => 'institucional',
        );
        $query_institucional = new WP_Query($args);


        if ($query_institucional->have_posts()) :
            while ($query_institucional->have_posts()) : $query_institucional->the_post();
        ?>

                <div class="md:col-span-2 bg-white rounded-md flex justify-between flex-col shadow-md overflow-hidden">
                    <a href="<?php echo get_permalink() ?>">
                        <img alt="<?php the_title(); ?>" class="w-full h-83 object-cover" height="200" src="<?php the_post_thumbnail_url('full'); ?>" width="600" />
                        <div class="p-4">
                            <h3 class="text-gray-900 leading-snug font-normal">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-gray-500 mt-2">
                                <?php echo get_the_date(); ?>
                            </p>
                            <p class="text-xs text-[#486faf] font-semibold uppercase mt-2">
                                <?php

                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </p>
                        </div>
                    </a>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
        endif;


        $args_otros = array(
            'post_type'      => 'noticias',
            'posts_per_page' => 3,
            'category__not_in' => array(get_cat_ID('institucional')),
        );
        $query_otros = new WP_Query($args_otros);

        if ($query_otros->have_posts()) :
            ?>
            
            <div class="space-y-4 flex flex-col ">
                <?php
                while ($query_otros->have_posts()) : $query_otros->the_post();
                ?>
                    <a href="<?php echo get_permalink() ?>">
                        <div class="bg-white rounded-md shadow-md overflow-hidden flex">
                            <img alt="<?php the_title(); ?>" class="w-28 h-34 object-cover flex-shrink-0" height="100" src="<?php the_post_thumbnail_url('thumbnail'); ?>" width="120" />
                            <div class="p-3 flex flex-col justify-between">
                                <h4 class="text-gray-900 leading-tight text-sm  font-normal">
                                    <?php the_title(); ?>
                                </h4>
                                <p class="text-gray-500 text-sm mt-1">
                                    <?php echo get_the_date(); ?>
                                </p>
                                <p class="text-xs text-[#486faf] font-semibold uppercase">
                                    <?php

                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php
        endif;
        ?>
    </div>
 
    <div class="mt-8 flex justify-center">
        <a href="<?php echo get_post_type_archive_link('noticias'); ?>">
            <button class="bg-[#486faf] cursor-pointer text-white text-base font-semibold px-6 py-2 rounded hover:bg-[#123d83] transition" type="button">
                Más noticias
            </button>
        </a>
    </div>
</div>