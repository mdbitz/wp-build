<?php if (have_posts()) : ?>        
	<?php while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> in <?php the_category(', '); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php endif; ?>
