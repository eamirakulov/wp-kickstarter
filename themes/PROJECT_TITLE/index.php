<?php get_header(); ?>
	
	<div>
		<?php
		if(have_posts())
			get_template_part('content', get_post_type());
		?>
	</div>
	
<?php get_footer(); ?>