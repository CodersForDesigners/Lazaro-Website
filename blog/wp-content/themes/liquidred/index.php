<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liquid_Red
 */

get_header(); ?>


	<?php
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

		<?php
		endif;
		?>

			<!-- Page Title Section -->
			<section class="page-title-section fill-off-dark">
				<div class="container">
					<div class="row">
						<!-- Page Title -->
						<h1 class="h1 page-title columns small-12 medium-8 large-7 large-offset-1">
							Blog
						</h1>
					</div>
				</div>
			</section>

			<!-- Featured Section -->
			<section class="featured-section fill-off-dark">
				<div class="container">
					<div class="row">

						<!-- Featured -->
						<div class="featured columns small-12 medium-8 large-7 large-offset-1">

							<div class="section-label h5 text-neutral">Featured</div>

							<!-- Content-Featured.php -->
							<?php
								the_post();
								get_template_part( 'template-parts/content', 'featured' );
							?>

						</div><!-- END : Featured -->


						<!-- Content Sidebar -->
						<div class="content-sidebar columns small-12 medium-4 large-3">
							<div class="section-label h5 text-neutral">Categories</div>
							<?php get_category_list(); ?>
						</div><!-- END : Content Sidebar -->


					</div>
				</div>
			</section> <!-- END : Featured Section -->

			<!-- Posts Section -->
			<section class="posts-section fill-dark">
				<div class="container">
					<div class="row">

						<!-- Posts -->
						<div class="posts columns small-12 medium-8 large-7 large-offset-1">
							<div class="section-label h5 text-neutral">Articles</div>

							<!-- Content-Summary.php -->
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'summary' );
								//get_template_part( 'template-parts/content', get_post_format() );

							endwhile;
							?>

						</div><!-- END : Posts -->

						<!-- Content Sidebar -->
						<div class="content-sidebar columns small-12 medium-4 large-3">
							<div class="section-label h5 text-neutral">Search</div>
							<?php get_search_form(); ?>
						</div><!-- END : Content Section -->

					</div>
				</div>
			</section> <!-- END : Posts Section -->

		<?php

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

<?php
get_footer();
