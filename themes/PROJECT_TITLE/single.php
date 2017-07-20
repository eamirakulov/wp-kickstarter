<?php get_header(); ?>
	
	<?php if(have_posts()): the_post(); ?>
		<div>
			<article class="post single">
				<h2 class="entry_title">
					<?php the_title(); ?>
				</h2>

				<div class="entry_content">
					<?php the_content(); ?>
				</div>
			</article>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>