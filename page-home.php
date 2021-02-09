<?php
get_header();
?>
	<section class="home-slides-wrap">
		<div class="home-slides">
			<?php
			if ( have_rows( 'get_slides' ) ):
				while ( have_rows( 'get_slides' ) ) : the_row();
					?>
					<div class="home-slide" style="background-image: url(<?php the_sub_field('image')?>)">
						<div class="container">
							<div class="home-slide-data">
								<div class="home-slide-data-inner">
									<h4><?php the_sub_field('title')?></h4>
									<h3><?php the_sub_field('subtitle')?></h3>
									<a data-href="<?php the_sub_field('button_url')?>" href="<?php the_sub_field('button_url')?>"><?php the_sub_field('button_title') ?></a>
								</div>
							</div>
						</div>
					</div>
				<?php
				endwhile;
			endif;
			?>
		</div>

	</section>
	<section class="home-content-and-image">
		<div class="container">
			<div class="row">
				<div class="main-content-text col-md-7">
					<p><?php the_field( 'home_content' ); ?></p>
					<a href="<?php the_field('home_link')?>"><?php the_field('home_link_title')?> <img src="<?php echo get_template_directory_uri();?>/images/right-link-shape.png" /></a>
				</div>
				<div class="col-md-1">
				</div>
				<div class="col-md-4">
					<img class="img-responsive" src="<?php the_field( 'home_image' ); ?>" />
				</div>
			</div>
		</div>
	</section>
	<section class="our-services-wrapper">
		<div class="container">
			<h3><?php the_field( 'our_services_title' ); ?></h3>
		</div>
		<img style="width: 100%" class="img-responsive" src="<?php the_field( 'our_services_image' ); ?>" />
		<div class="container">
			<div class="our-services">
				<?php
				if ( have_rows( 'get_services' ) ):
					while ( have_rows( 'get_services' ) ) : the_row();
						?>
						<div class="our-service">
							<a href="<?php the_sub_field('link')?>">
								<div class="image" style="background-image: url(<?php the_sub_field('image')?>)">
								</div>
								<h4><?php the_sub_field('title')?></h4>
							</a>
						</div>
					<?php
					endwhile;
				endif;
				?>
				<div class="our-service our-service-last">
					<a href="<?php the_field('services_view_all_link')?>">View All <img src="<?php echo get_template_directory_uri();?>/images/right-link-shape.png" /></a>
				</div>
			</div>
			<div class="mobile">
				<a class="view-all-services-mobile" href="<?php the_field('services_view_all_link')?>">View All searvices <img src="<?php echo get_template_directory_uri();?>/images/right-link-shape.png" /></a>
			</div>
		</div>
	</section>
	<section class="our-work-wrapper">
		<div class="container">
			<h3><?php the_field( 'our_work_title' ); ?></h3>
			<?php
			if ( have_rows( 'get_works' ) ):
				echo '<div class="our-works">';
				while ( have_rows( 'get_works' ) ) : the_row();
					?>
					<div class="our-work" style="background-image: url(<?php the_sub_field('image')?>)">
						<div data-href="<?php the_sub_field('link')?>" class="hover">
							<h4><?php the_sub_field('title')?></h4>
							<a href="<?php the_sub_field('link')?>"><img src="<?php echo get_template_directory_uri();?>/images/our-work-hover-image.png" /></a>
						</div>

					</div>
					<?php
				endwhile;
				echo '</div>';
			endif;
			?>
			<div class="row">
				<div class="col-md-12">
					<a class="view-all-work-link" href="<?php the_field('view_all_work_link')?>">View All Works <img src="<?php echo get_template_directory_uri();?>/images/right-link-shape.png" /></a>
				</div>
			</div>
		</div>

	</section>
	<section class="our-testimonials">
		<div class="container">
			<h3><?php the_field( 'testimonials_title' ); ?></h3>
			<?php
			if ( have_rows( 'get_testimonials' ) ):
				echo '<div class="clients-testimonials">';
				while ( have_rows( 'get_testimonials' ) ) : the_row();
					echo '<div class="clients-testimonial">';
					?>
					<p><?php the_sub_field('testimonial');?></p>
					<h5><?php the_sub_field('author_name');?></h5>
					<?php
					echo '</div>';
				endwhile;
				echo '</div>';
			endif;
			?>
		</div>

	</section>
<?php
get_footer();
