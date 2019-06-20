<article>
	<header>
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}

		the_title( '<h2 itemprop="name"><a href="' . esc_url( get_permalink() ) . '" itemprop="url">', '</a></h2>' );
		?>
	</header>
	<div itemprop="description">
		<?php the_excerpt(); ?>
	</div>
</article>
