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
<?php
if ( have_rows( 'get_page_services' ) ):
	?>
	<div class="get_page_services">
		<?php
		$counter    = 0;
		$subcounter = 0;
		while ( have_rows( 'get_page_services' ) ) : the_row();
			?>
			<section class="page-services-list-wrapper">
				<div class="container">
					<div class="data-re">
						<div class="by">
							<figure class="service-icon">
								<img src="<?php the_sub_field( 'image' ) ?>" />
							</figure>
							<h3 id="<?php echo strtolower(str_replace(' ','-', get_sub_field( 'title' )));?>"><?php the_sub_field( 'title' ) ?></h3>
							<?php the_sub_field( 'description' ) ?>
						</div>

						<div class="panel-group" id="accordion-<?php echo $counter; ?>">
							<?php
							if ( have_rows( 'get_accordion' ) ):
								while ( have_rows( 'get_accordion' ) ) : the_row();
									?>
									<div class="panel panel-default accordion-services">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion-<?php echo $counter; ?>" href="#collapse-<?php echo $subcounter; ?>">
													<?php the_sub_field( 'heading' ) ?>
												</a>
											</h4>
										</div>
										<div id="collapse-<?php echo $subcounter; ?>" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="line-data">
													<div class="line-data-details">
														<?php
														if ( have_rows( 'add_icon_and_content' ) ):
															?>
															<?php
															while ( have_rows( 'add_icon_and_content' ) ) : the_row();
																?>
																<div class="row icon-de">
																	<div class="col-xs-3 col-md-1">
																		<figure>
																			<img src="<?php the_sub_field('icon')?>" />
																		</figure>
																	</div>
																	<div class="col-xs-9 col-md-11">
																			<p><span><?php the_sub_field('title')?></span> - <?php the_sub_field('description')?></p>
																	</div>
																</div>
															<?php
															endwhile;
															?>
														<?php
														endif;
														?>
														<?php the_sub_field( 'content' ) ?>
													</div>

												</div>

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

				</div>
			</section>
		<?php
			$counter++;
		endwhile;
		?>
	</div>

<?php
endif;
?>
<?php
get_footer();
