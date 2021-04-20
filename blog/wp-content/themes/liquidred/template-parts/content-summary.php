<?php
/**
 * Template part for displaying posts summary
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liquid_Red
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="columns small-12 medium-6">
			<!-- Post Featured Image -->
			<div class="post-summary-image thumbnail">
				<?php
					if ( has_post_thumbnail() ) {
						echo '<a href="' . esc_url( get_permalink() ) . '">';
						the_post_thumbnail( "large" );
						echo '</a>';
					}
				?>
			</div><!-- END : Post Featured Image -->
		</div>
		<div class="columns small-12 medium-6">

			<?php if ( 'post' === get_post_type() ) : ?>
				<!-- Post Title Meta -->
				<div class="post-title-meta">
					<?php
						$post_categories = get_the_category();
						if ( $post_categories ) :
							foreach ( $post_categories as $category ) :
								echo '<div class="h5 inline cat-mini-i cat-'.$category->slug.'">' . $category->name . '</div>';
							endforeach;
						endif;
					?>
					<div class="h5 inline">
						<?php liquidred_get_post_date(); ?>
					</div>
				</div><!-- END : Post Title Meta -->
			<?php
			endif; ?>

			<!-- Post Title -->
			<div class="post-title">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="h4">', '</h1>' );
				else :
					the_title( '<h2 class="h4"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</div><!-- END : Post Title -->

		</div>
	</div>
</article><!-- #post-## -->
