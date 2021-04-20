<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					Search
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
					<h1 class="section-label h5 text-off-light"><?php printf( esc_html__( 'Results for: %s', 'liquidred' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					// get_template_part( 'template-parts/content', 'search' );
					get_template_part( 'template-parts/content', 'summary' );

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
