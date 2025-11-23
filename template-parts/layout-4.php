<?php
/**
 * Header Layout 4 - Full Width (Menu Below Logo)
 *
 * @package soda-theme
 */
?>

<header id="masthead" class="site-header header-layout-4">
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
	</div><!-- .header-container -->
	
	<div class="header-navigation-wrapper">
		<div class="site-navigation-toggle-holder">
			<div class="site-navigation-toggle menu-toggle" role="button" tabindex="0" aria-label="Menu" aria-controls="primary-menu" aria-expanded="false">
				<?php if ( soda_theme_option( 'mobile_menu_show_text', true ) ) : ?>
				<span class="menu-text"><?php echo esc_html( soda_theme_option( 'mobile_menu_text', 'MENU' ) ); ?></span>
				<?php endif; ?>
				<div class="hamburger" id="hamburger-1">
					<span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
				</div>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->

		<nav class="site-navigation-dropdown" aria-label="Mobile menu" aria-hidden="true">
			<div class="site-navigation-background"></div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'mobile-menu',
					'menu_class'     => 'mobile-nav-menu',
				)
			);
			?>
		</nav><!-- .site-navigation-dropdown -->
	</div><!-- .header-container -->
</header><!-- #masthead -->
