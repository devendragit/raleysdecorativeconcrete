<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package raly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'raly' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-wrap">
				<div class="left">
					<div class="site-branding">
						<a href="<?php echo site_url();?>">
							<img class="img-responsive" src="<?php the_field('header_logo', 'option');?>" alt="Site Logo"/>
						</a>
					</div>
				</div>

				<div class="right">
					<div class="top">
						<div class="top-content">
							<div class="contact-info-top">
								<a href="tel:<?php the_field('header_phone_number', 'option')?>" class="phone-number"><?php the_field('header_phone_number', 'option')?></a>
								<a href="mailto:<?php the_field('header_email_address', 'option')?>" class="email-address"><?php the_field('header_email_address', 'option')?></a>
							</div>
							<div class="social-links">
								<a target="_blank" href="<?php the_field('facebook_link', 'option')?>"><img src="<?php echo get_template_directory_uri();?>/images/facebook-icon.png" /></a>
								<a target="_blank" href="<?php the_field('instagram_link', 'option')?>"><img src="<?php echo get_template_directory_uri();?>/images/instagram-icon.png" /></a>
								<a target="_blank" href="<?php the_field('youtube_link', 'option')?>"><img src="<?php echo get_template_directory_uri();?>/images/youtube-icon.png" /></a>
								<a target="_blank" href="<?php the_field('twitter_link', 'option')?>"><img src="<?php echo get_template_directory_uri();?>/images/twitter-icon.png" /></a>
							</div>
						</div>
					</div>
					<div class="bottom">
						<nav id="site-navigation" class="main-navigation">
							<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'raly' ); ?></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>

				</div>
			</div>

		</div>
		<div class="hidden-md nav-bar-toggle">
			<img class="img-responsive" src="<?php echo get_template_directory_uri();?>/images/Menu.png" alt="Site Menu Toggle"/>
			<div style="display: none;" class="mobile-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'mobile-menu',
					)
				);
				?>
			</div>
		</div>
	</header><!-- #masthead -->
