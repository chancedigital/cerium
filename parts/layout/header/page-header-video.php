<video
	poster="<?php echo get_field( 'header_background_image' ) ? esc_url( get_field( 'header_background_image' )['url'] ) : esc_url( get_the_post_thumbnail_url() ); ?>"
	id="js-page-header-video"
	class="page-header__video"
	playsinline
	autoplay
	muted
	loop
>
	<?php
	while ( have_rows( 'header_background_video' ) ) :
		the_row();
		$video_file_url = get_sub_field( 'video_url' );
		if ( $video_file_url && filter_var( $video_file_url, FILTER_VALIDATE_URL ) ) :
			$video_file_ext = pathinfo( wp_parse_url( $video_file_url )['path'], PATHINFO_EXTENSION );
			if ( in_array( $video_file_ext, [ 'mp4', 'webm', 'ogv' ], true ) ) :
				?>

				<source src="<?php echo esc_url( $video_file_url ); ?>" type="video/<?php echo esc_attr( $video_file_ext ); ?>">

				<?php
			endif;
		endif;
	endwhile;
	?>
</video>
