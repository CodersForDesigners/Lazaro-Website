<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liquid_Red
 */

get_header(); ?>

	<section class="content-section fill-off-dark">
		<div class="container">
			<div class="row">

				<?php
				while ( have_posts() ) : the_post();

					?>
					<!-- Content -->
					<div class="content page-content columns small-12 medium-10 medium-offset-1">
						<?php
						// get_template_part( 'template-parts/content', 'page' );
						get_template_part( 'template-parts/content' );
						?>
					</div><!-- END : Content -->

					<!-- Comments -->
					<div class="post-comments columns small-12 large-10 large-offset-1 fill-light">
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
					</div><!-- END : Comments -->
					<?php

				endwhile; // End of the loop.
				?>

			</div>
		</div>
	</section>

<?php
get_footer();
