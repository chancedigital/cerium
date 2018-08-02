<section class="masthead" id="js-masthead">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell medium-3 masthead__col masthead__col--logo">
				<?php chances_basetheme_custom_logo( 'masthead__logo' ); ?>
			</div>
			<div class="cell medium-9 masthead__col masthead__col--nav">
				<?php
				wp_nav_menu( [
					'menu_class'      => 'topnav__menu',
					'container'       => 'nav',
					'container_id'    => 'js-topnav',
					'container_class' => 'topnav',
					'theme_location'  => 'main-navigation',
					'walker'          => new Chances\WordPressBasetheme\Walker_Nav_Menu_Bem(),
				] );
				?>
				<button id="js-topnav-toggle" class="masthead__hamburger">
					<?php get_template_part( 'parts/components/hamburger' ); ?>
				</button>
			</div>
		</div>
	</div>
</section>
