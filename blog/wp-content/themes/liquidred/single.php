<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Liquid_Red
 */

get_header(); ?>

	<?php
	while ( have_posts() ) : the_post();
	?>

	<!-- Page Title Section -->
	<section class="page-title-section fill-off-dark">
		<div class="container">
			<div class="row">
				<!-- Page Title -->
				<h1 class="h1 page-title columns small-12 medium-8 large-7 large-offset-1">
					<?php echo get_the_category()[ 0 ]->name; ?>
				</h1>
			</div>
		</div>
	</section>

	<!-- Content Section -->
	<section class="content-section fill-off-dark">
		<div class="container">
			<div class="row">

				<!-- Content -->
				<div class="content columns small-12 medium-8 large-7 large-offset-1">
					<?php
						get_template_part( 'template-parts/content', get_post_format() );
					?>
				</div><!-- END : Content -->

				<!-- Content Sidebar -->
				<div class="content-sidebar columns small-12 medium-4 large-3">

					<div class="section-label h5 text-neutral">Categories</div>
					<?php get_category_list(); ?>

					<div class="section-label h5 text-neutral">Search</div>
					<?php get_sidebar(); ?>

				</div><!-- END : Content Sidebar -->

			</div>
		</div>
	</section> <!-- END : Content Section -->

	<!-- Content Extra Section -->
	<section class="content-extra-section fill-dark">
		<div class="container">
			<div class="content-extra row">
				<div class="post-tags columns small-12 large-10 large-offset-1">
					<?php
					$post_tags = get_the_tags();
					if ( $post_tags ) :
						foreach ( $post_tags as $tag ) :
							echo '<a href="'.get_tag_link( $tag->term_id) .'" rel="tag" class="h5 tag tag-'.$tag->slug.'">'.$tag->name.'</a>';
						endforeach;
					endif;
					?>
				</div>
				<div class="post-comments columns small-12 large-10 large-offset-1 fill-light">
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>
			</div>
		</div>
	</section> <!-- END : Content Extra Section -->

	<?php
		//the_post_navigation();
	?>


<?php
endwhile; // End of the loop.
?>


<?php
//get_sidebar();
get_footer();
