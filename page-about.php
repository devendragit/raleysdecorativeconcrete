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
	<section class="inner-main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php the_field( 'main_content' ) ?>
				</div>
			</div>
		</div>
	</section>
	<section class="our-services-wrapper-page">
		<div class="container">
			<h3>OUR SERVICES</h3>
			<?php
			if ( have_rows( 'get_services' ) ):
				?>
				<ul class="our-services-list">
					<?php
					while ( have_rows( 'get_services' ) ) : the_row();
						?>
						<li><?php the_sub_field('service_name')?></li>
					<?php
					endwhile;
					?>
				</ul>
			<?php
			endif;
			?>
			<div class="service-page-two-col">
				<div class="row">
					<div class="col-md-5">
						<figure>
							<img class="img-responsive" src="<?php the_field('service_image')?>" />
						</figure>
					</div>
					<div class="col-md-7">
						<h4><?php the_field('service_heading')?></h4>
						<span>We serve the following areas with our services:</span>
						<?php
						if ( have_rows( 'get_service_areas' ) ):
							?>
							<ul class="our-services-areas-list">
								<?php
								while ( have_rows( 'get_service_areas' ) ) : the_row();
									?>
									<li><?php the_sub_field('service_area')?></li>
								<?php
								endwhile;
								?>
							</ul>
						<?php
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
