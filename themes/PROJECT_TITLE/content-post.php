<?php while(have_posts()): the_post(); ?>

	<article class="post">
		<h2 class="entry_title">
			<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
		</h2>

		<div class="entry_content">
			<?php the_excerpt(); ?>
		</div>
	</article>
	
<?php endwhile; ?>