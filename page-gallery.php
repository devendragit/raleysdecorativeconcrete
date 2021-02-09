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
	<section class="show-various-galleries">
		<?php
		if ( have_rows( 'add_gallery' ) ):
			?>
			<?php
			while ( have_rows( 'add_gallery' ) ) : the_row();
				?>
				<div class="show-gallery">
					<div class="container">
						<h3><?php the_sub_field( 'title' ) ?></h3>
						<?php if (wp_is_mobile()) :
							$gallery = get_sub_field( 'image_gallery', false );
							$new_shortcode = str_replace(']', ' images_per_page="2" number_of_columns="2"]', $gallery );
							echo do_shortcode($new_shortcode);
						else : ?>
							<?php the_sub_field( 'image_gallery' ); ?>
						<?php endif; ?>

					</div>
				</div>
			<?php
			endwhile;
			?>
		<?php
		endif;
		?>
	</section>
<?php
get_footer();
