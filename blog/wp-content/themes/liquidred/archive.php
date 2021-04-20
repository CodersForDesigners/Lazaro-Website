<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liquid_Red
 */

get_header(); ?>


	<!-- Page Title Section -->
	<section class="page-title-section fill-off-dark">
		<div class="container">
			<div class="row">
				<!-- Page Title -->
				<h1 class="h1 page-title columns small-12 medium-8 large-7 large-offset-1">
					<?php
						if ( ! empty( category_description() ) ) {
							$page_heading = category_description();
						} else if ( ! empty( single_cat_title( "", false ) ) ) {
							$page_heading = single_cat_title( "", false );
						} else {
							$page_heading = "Archive";
						}
						echo $page_heading;
					?>
				</h1>
			</div>
		</div>
	</section>


	<section class="posts-section fill-off-dark">
		<div class="container">

			<!-- Posts -->
			<div class="posts columns small-12 medium-8 large-7 large-offset-1">

			<?php
			if ( have_posts() ) : ?>

				<header class="page-header">
						<!-- <div class="section-label h5 text-neutral">Articles</div> -->
						<?php
							if ( function_exists( "yoast_breadcrumb" ) ) {
								yoast_breadcrumb( '<h1 class="section-label h5 text-off-light">', '</h1>' );
							}
							// the_archive_title( '<h1 class="section-label h5 text-off-light">', '</h1>' );
							// the_archive_description( '<div class="archive-description">', '</div>' );
						?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'summary' );
					// get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</div>





			<!-- Content Sidebar -->
			<div class="content-sidebar columns small-12 medium-4 large-3">

				<div class="section-label h5 text-neutral">Categories</div>
				<?php get_category_list(); ?>

				<div class="section-label h5 text-neutral">Search</div>
				<?php get_sidebar(); ?>

			</div><!-- END : Content Sidebar -->





		</div>
	</section>

<?php
get_footer();
