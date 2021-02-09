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
	<section class="faqs-listings">
		<div class="container">
			<?php
			$counter = 0;
			$subcounter = 0;
			if ( have_rows( 'get_faqs' ) ):
				?>
				<?php
				while ( have_rows( 'get_faqs' ) ) : the_row();
					?>
					<div class="faqs-data">
						<h3><?php the_sub_field( 'heading' ) ?></h3>
						<div class="panel-group" id="accordion-<?php echo $counter;?>">
							<?php
							if ( have_rows( 'get_question_&_answers' ) ):
								while ( have_rows( 'get_question_&_answers' ) ) : the_row();
									?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-<?php echo $counter;?>" href="#collapse-<?php echo $subcounter;?>">
													<?php the_sub_field( 'question' ) ?>
												</a>
											</h4>
										</div>
										<div id="collapse-<?php echo $subcounter;?>" class="panel-collapse collapse">
											<div class="panel-body">
												<?php the_sub_field( 'answer' ) ?>
											</div>
										</div>
									</div>
								<?php
									$subcounter++;
								endwhile;
							endif;
							?>
						</div>
					</div>
					<?php
					$counter++;
				endwhile;
				?>
			<?php
			endif;
			?>
		</div>
	</section>
<?php
get_footer();
