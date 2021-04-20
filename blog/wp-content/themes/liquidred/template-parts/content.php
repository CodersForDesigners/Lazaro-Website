<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Liquid_Red
 */

$is_podcast = get_the_category()[ 0 ]->slug == "podcast";

?>

<article<?php echo $is_podcast ? ' itemscope itemtype="http://schema.org/TVEpisode"' : '' ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Breadcrumbs -->
	<div>
		<?php
			if ( function_exists( "yoast_breadcrumb" ) ) {
				yoast_breadcrumb( '<h1 class="section-label h5 text-off-light">', '</h1>' );
			}
		?>
	</div><!-- END : Breadcrumbs -->

	<!-- Featured Video or Image -->
	<?php get_featured_media(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<!-- Post Title Meta -->
		<div class="post-title-meta">
			<?php
				$post_categories = get_the_category();
				if ( $post_categories ) :
					foreach ( $post_categories as $category ) :
						echo '<a href="'.get_category_link( $category->term_id ).'" rel="cat" class="h5 inline cat-mini-i cat-'.$category->slug.'">'.$category->name.'</a>';
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
				the_title( '<h1'. ( $is_podcast ? ' itemprop="name"' : '' ) .' class="h3">', '</h1>' );
			else :
				the_title( '<h2'. ( $is_podcast ? ' itemprop="name"' : '' ) .' class="h3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	</div><!-- END : Post Title -->

	<!-- Post Content -->
	<div class="post-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'liquidred' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- END : Post Content -->

	<?php if ( get_post_type() == "post" ) : ?>
		<hr>
		<!-- Post Author -->
		<div class="post-author">
			Author : <?php get_post_author(); ?>
		</div><!-- END : Post Author -->

		<?php if ( $is_podcast ) : ?>
			<div class="podcast-meta">
				<span class="title">Show : 
					<span itemprop="partOfTVSeries" itemscope itemtype="http://schema.org/TVSeries">
						<span itemprop="name">
							<?php echo get_the_category()[ 0 ]->description; ?>
						</span>
					</span>
				</span> – 
				<span itemprop="partOfSeason" itemscope itemtype="http://schema.org/TVSeason" class="season-number">Season 
					<span itemprop="seasonNumber">
						<?php echo get_field( "season_num" ); ?>
					</span>,
				</span>
				<span class="episode-number">Episode 
					<span itemprop="episodeNumber">
						<?php echo get_field( "episode_num" ); ?>
					</span>
				</span>
				<div class="episode-url">URL : <a itemprop="url" href="https://www.youtube.com/watch?v=<?php echo get_field( "youtube_id" ); ?>" target="_block">https://www.youtube.com/watch?v=<?php echo get_field( "youtube_id" ); ?></a></div>
			</div>
		<?php endif; ?>

	<?php endif; ?>

</article><!-- #post-## -->
