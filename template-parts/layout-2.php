<?php
/**
 * Header Layout 2 - Centered (Logo & Menu Centered)
 *
 * @package soda-theme
 */
?>

<header id="masthead" class="site-header header-layout-2">
	<div class="header-container">
		<div class="site-branding">
			<?php
			soda_theme_custom_logo();
			$soda_theme_description = get_bloginfo( 'description', 'display' );
			if ( $soda_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $soda_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'soda-theme' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</div><!-- .header-container -->
</header><!-- #masthead -->
