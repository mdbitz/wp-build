<?php
get_header();

//  ----------------------------------------------------------------------------
//  Reviews
//  ----------------------------------------------------------------------------
    $args = array(
        'posts_per_page' => 4,
        'post_type' => 'review'
    );
    $review_query = new WP_Query( $args );
    if( $review_query->have_posts() ) {
        ?><section class="reviews_container"><?php
            ?><div class="shell"><?php
                ?><div class="featured_area"><?php
                    $review_query->the_post();
                    get_template_part( 'partials/review', 'article' );
                ?></div><?php
                ?><div class="secondary_area"><?php
                while( $review_query->have_posts() ) {
                    $review_query->the_post();
                    get_template_part( 'partials/review', 'article' );
                }
                ?></div><?php
            ?></div><?php
        ?></section<?php
    }

//  ----------------------------------------------------------------------------
//  Literary Happenings
//  ----------------------------------------------------------------------------
    ?><section class="sosmashup_container"><?php
        ?><div class="shell"><?php
            ?><h2>Literary Happenings</h2><?php
            echo SoSMashup_ShortCode::sosmashup_widget_tiles();
        ?></div><?php
    ?></section><?php

//  ----------------------------------------------------------------------------
//  Library
//  ----------------------------------------------------------------------------
    $args = array(
        'posts_per_page' => 12,
        'post_type' => 'book',
        'orderby' => 'modified',
        'order' => 'DESC',
		'meta_query' => array(
			'edition_clause' => array(
				'key' => 'editions_%_is_owned',
				'value' => 1,
				'compare' => '='
			)
		)
	);

    add_filter('posts_where', 'nm_where_owned');

    $lib_query = new WP_Query( $args );
    remove_filter('posts_where', 'nm_where_owned');

    if( $lib_query->have_posts() ) {
        ?><section class="library_container"><?php
            ?><div class="shell"><?php
                ?><h2><?php
                    if( get_field('page_my_library', 'options') ) {
                        ?><a href="<?php the_field('page_my_library', 'options'); ?>">Matthew's Library</a><?php
                    } else {
                        ?>Matthew's Library<?php
                    }
                ?></h2><?php
                ?><div class="book_carousel"><?php
                    while( $lib_query->have_posts() ) {
                        $lib_query->the_post();
                        get_template_part( 'partials/book', 'cover' );
                    }
                ?></div><?php
            ?></div><?php
        ?></section<?php
    }

//  ----------------------------------------------------------------------------
//  Wanted
//  ----------------------------------------------------------------------------
$args = array(
    'posts_per_page' => 10,
    'post_type' => 'book',
    'meta_query' => array(
        'relation' => 'AND',
        'edition_clause' => array(
            'key' => 'editions_%_is_owned',
            'value' => 0,
            'compare' => '='
        ),
        'desire_clause' => array(
            'key' => '__level_of_desire',
            'compare' => 'EXISTS'
        )
    ),
    'orderby' => array(
        'desire_clause' => 'DESC'
    )
);


// perform query
add_filter('posts_where', 'nm_where_wanted');
$wanted_query = new WP_Query( $args );
remove_filter('posts_where', 'nm_where_wanted');

if( $wanted_query->have_posts() ) {
    ?><section class="library_container"><?php
    ?><div class="shell"><?php
    ?><h2><?php
    if( get_field('page_most_wanted', 'options') ) {
        ?><a href="<?php the_field('page_most_wanted', 'options'); ?>">Most Wanted</a><?php
    } else {
        ?>Most Wanted<?php
    }
    ?></h2><?php
    ?><div class="book_carousel"><?php
    while( $wanted_query->have_posts() ) {
        $wanted_query->the_post();
        get_template_part( 'partials/book', 'cover' );
    }
    ?></div><?php
    ?></div><?php
    ?></section<?php
}


get_footer();