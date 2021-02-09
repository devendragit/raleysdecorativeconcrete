<?php
get_header();
?>
	<section style="background-image: url(<?php the_field( 'page_banner_image' ) ?>)" class="page-banner-wrapper">
		<div class="container">
			<div class="page-banner">
				<div class="title">
					<h1><?php the_field( 'page_banner_title' ) ?></h1>
				</div>
			</div>
		</div>
	</section>
	<section class="contact-main-content">
		<div class="container">
			<div class="col-md-12 col-lg-7">
				<?php echo do_shortcode('[contact-form-7 id="153" title="Contact Page Form"]')?>
			</div>
			<div class="col-md-12 col-lg-5">
				<div class="contact-info-sidebar">
					<div class="map-icon">
						<h3>Visit US</h3>
						<?php the_field('visit_us')?>
					</div>
					<div class="call-icon">
						<h3>Call us</h3>
						<span><?php the_field('call_us')?></span>
					</div>
					<div class="email-icon">
						<h3>Email us</h3>
						<?php the_field('email_us')?>
					</div>
					<div class="hours-icon">
						<img src="<?php echo get_template_directory_uri();?>/images/clock-icon.png" alt="hours" />
						<h3>Hours</h3>
						<?php the_field('hours')?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="our-map-wrapper">
		<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=3109%20Pleasant%20Valley%20Ln%20Arlington%20TX,%2076015%20+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
	</section>
<?php
get_footer();
