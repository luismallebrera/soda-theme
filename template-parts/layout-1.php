<?php
/**
 * Header Layout 1 - Default (Logo Left, Menu Right)
 *
 * @package soda-theme
 */
?>

<header id="masthead" class="site-header header-layout-1">
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

	<div class="site-navigation-toggle-holder">
		<div class="site-navigation-toggle menu-toggle" role="button" tabindex="0" aria-label="Menu" aria-controls="primary-menu" aria-expanded="false">
			<?php if ( get_theme_mod( 'mobile_menu_show_text', true ) ) : ?>
			<span class="menu-text-wrapper">
				<span class="menu-text"><?php echo esc_html( get_theme_mod( 'mobile_menu_text', 'MENU' ) ); ?></span>
				<span class="menu-text"><?php echo esc_html( get_theme_mod( 'mobile_menu_close_text', 'CLOSE' ) ); ?></span>
			</span>
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

		<?php if ( get_theme_mod( 'enable_action_button', false ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'action_button_url', '#' ) ); ?>" class="action-button">
				<?php echo esc_html( get_theme_mod( 'action_button_text', 'Contact' ) ); ?>
			</a>
		<?php endif; ?>

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
