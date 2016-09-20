<?php

/**
 * This file is used to display your front page.
 * @package Podcaster
 * @since 1.0
 * @author Theme Station : http://www.themestation.net
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.net
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/*
Template Name: Front Page
*/
get_header(); ?>

	<?php
	$args = array(
		'post_type'             => 'podcast',
		'posts_per_page'        => 5,
		'paged'                 => get_query_var( 'paged' ),
		'ignore_sticky_posts'   => true,
	);

	global $post;
	$podcast_episodes = get_posts( $args );
	$post = reset( $podcast_episodes );
	setup_postdata( $post ); ?>

	<div class="latest-episode front-header" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
		<div id="loading_bg"></div>
		<div class="translucent">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php
							$id = get_the_ID();
							$file = af_get_enclosure( $id );
							$terms = wp_get_post_terms( $id , 'series' );
							$audiourl = apply_filters( 'thst_the_action', $file );
							foreach( $terms as $term ) {
								$series_id = $term->term_id;
								$series = $term->name;
								break;
							} ?>
							<div class="main-featured-post clearfix">
								<span class="mini-title">Featured Episode</span>
								<a href="<?php the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
								<div class="audio">
									<?php if ( $file != '' ) :
										echo '<div class="audio_player">' . do_shortcode('[audio mp3="' . $file . '"][/audio]</div><!--audio_player-->');
									endif; ?>
								</div><!-- .audio -->
							</div><!-- .main-featured-post -->
						<div class="next-week">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<span class="mini-title">Never miss an episode!</span>
									<h3>Subscribe to the Apply Filters podcast </h3>
								</div><!-- .col -->
								<div class="col-lg-6 col-md-6">
									<div class="content">
										<a href="https://itunes.apple.com/ca/podcast/apply-filters/id689285167?mt=2" class="butn small" rel="nofollow"><?php echo __('Subscribe with iTunes', 'thstlang'); ?></a>
										<a href="<?php echo home_url( '?feed=podcast' ); ?>" class="butn small"><?php echo __('Subscribe with RSS', 'thstlang'); ?></a>
									</div><!-- .content -->
								</div><!-- .col -->
							</div><!-- .row -->
						</div><!-- .next-week -->
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .translucent -->
	</div><!-- .latest-episode -->

	<div class="list-of-episodes">
		<div class="container">
			<div class="row">
					<?php
					for ( $i = 1; $i < count( $podcast_episodes ); $i++ ) :
					$post = $podcast_episodes[ $i ];
					setup_postdata( $post );
					$featured_image_align = get_post_meta( $post->ID, 'featured_image_align', true );
					$image_args = array();
					if ( '' !== $featured_image_align ) {
						$image_args = array(
							'style' => 'margin-left: ' . $featured_image_align . 'px;',
						);
					} ?>
					<article <?php post_class( 'col-lg-12 list' ); ?>>
						<div class="featured-image">
							<div class="featured-image-inner">
								<?php the_post_thumbnail( 'apply-filters-podcast-front-page-hard', $image_args ); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="hover">
								<span class="batch icon" data-icon="&#xF16b;"></span>
							</a><!-- .hover -->
						</div><!-- .featured-image -->
						<div class="inside">
							<div class="post-header">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div><!-- .post-header -->
							<div class="post-content">
								<?php the_excerpt(); ?>
							</div>
							<div class="post-footer clearfix">
								<span class="date"><?php echo get_the_date(); ?></span>
							</div><!-- .post-footer -->
						</div><!-- .inside -->
					</article>
					<?php endfor; ?>
					<div class="button-container col-lg-12">
						<a class="butn small podcast-archive-button" href="<?php echo home_url( 'podcast' ); ?>">Podcast Archive</a>
					</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .list-of-episodes -->

<?php get_footer(); ?>
