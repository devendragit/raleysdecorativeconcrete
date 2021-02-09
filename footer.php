<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package raly
 */

?>
<section class="our-clients">
	<div class="container">
		<h3><?php the_field( 'our_clients_title', 'option' ); ?></h3>
		<p><?php the_field( 'our_clients_sub_title', 'option' ); ?></p>
		<?php
		if ( have_rows( 'add_client_logos', 'option' ) ):
			echo '<div class="clients-logos-wrapper"><div class="clients-logos">';
			while ( have_rows( 'add_client_logos', 'option' ) ) : the_row();
				echo '<div class="client-logo">';
				?>
				<img src="<?php the_sub_field( 'logo_image' ) ?>" />
				<?php
				echo '</div>';
			endwhile;
			echo '</div></div>';
		endif;
		?>
	</div>
</section>
<section class="our-newsletter">
	<div class="container">
		<div class="newsletter-wrap">
			<div class="title">
				<h3>Newsletter</h3>
				<p>Subscribe Our Newsletter for Updates</p>
			</div>
			<div class="form">
				<?php echo do_shortcode('[contact-form-7 id="110" title="Newsletter form"]');?>
			</div>
		</div>
	</div>
</section>
	<footer id="colophon" class="site-footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="footer-top-heading"><?php the_field('footer_heading', 'option')?></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="footer-bottom-form">
							<?php echo do_shortcode('[contact-form-7 id="20" title="Contact form"]');?>
						</div>
					</div>
					<div class="col-md-1">

					</div>
					<div class="col-md-6">
						<div class="footer-bottom-info">
							<div class="footer-logo-image">
								<img class="img-responsive" src="<?php the_field('footer_logo', 'option')?>" />
							</div>
							<div class="footer-text">
								<p>
									<span class="orange">Wesley Bowers (owner)</span>
									<span><?php the_field('address', 'option');?></span>
									<span><?php the_field('phone_number', 'option');?></span>
									<span><?php the_field('email', 'option');?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p><?php the_field('copyright', 'option')?></p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<div class="back-to-button">
	<a class="back-to-top" href="javascript:void(0)"><i class="glyphicon glyphicon-chevron-up" aria-hidden="true"></i></a>
</div>
</body>
</html>
