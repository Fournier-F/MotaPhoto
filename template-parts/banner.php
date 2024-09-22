<div class="banner">

    <?php 
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 1,
        'orderby' => 'rand'
    );

    $my_query = new WP_Query( $args );

    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    ?>
	
    <img src="<?php echo get_field("photo"); ?>" alt="<?php echo the_title(); ?>">

	<?php
    endwhile;
    endif;

    wp_reset_postdata();
    ?>

    <div class="text">Photographe Event</div>

</div>