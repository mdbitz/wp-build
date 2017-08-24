<?php if (have_posts()) : ?>        
	<?php while (have_posts()) : the_post(); ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> in <?php the_category(', '); ?>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read More</a>
	<?php endwhile; ?>
<?php endif; ?>