<?php
/**
 * The main template file.
 *
 * @package cerium
 */

get_header();
?>

<div class="container">

	<main id="main" class="page-index__main" itemscope itemtype="https://schema.org/SearchResultsPage">

		<h1>
			<?php
			/* translators: the search query */
			printf( esc_html__( 'Search Results for: %s', 'cerium' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
			?>
		</h1>

		<?php if ( have_posts() ) : ?>

			<ul class="page-index__post-list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<li class="page-index__post-list-item" itemscope itemtype="http://schema.org/BlogPosting">
						<?php get_template_part( 'parts/components/post-excerpt' ) ?>
					</li>

				<?php endwhile; ?>
			</ul>

			<?php the_posts_navigation(); ?>
		<?php endif; ?>

	</main>

	<aside id="sidebar" class="page-index__sidebar">
		<?php get_sidebar(); ?>
	</aside>

</div>

<?php
get_footer();
