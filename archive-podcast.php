<?php
/**
 * Template for podcast archive pages
 *
 * @package WordPress
 * @subpackage SeriouslySimplePodcasting
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div class="reg">
		<div class="static">
				<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="heading">
									<div class="title">
										<h1>Podcast Archive</h1>
									</div>
								</div><!-- .title -->
							</div>
						</div>
				</div>
		</div>
	</div>
		
	<div class="main-content page archive-page">
		<div class="container">
			<div class="entries grid clearfix">
				<div class="row">
					<section class="list-of-episodes">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); 
							global $post;
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
									<div class="post-footer clearfix">
										<span class="date"><?php echo get_the_date(); ?></span>
									</div><!-- .post-footer -->
								</div><!-- .inside -->
							</article>
						<?php endwhile; wp_reset_query();  ?>
					</section>
				</div><!--row-->
			</div><!--entries-->	

			<div class="archive-navigation clear">
				<span class="older"><?php next_posts_link( '&laquo; Older Podcasts' ); ?></span>
				<span class="newer"><?php previous_posts_link( 'Newer Podcasts &raquo;' ); ?></span>
			</div>

		</div>
	</div>
	<?php else: ?>
			<div class="reg">
				<div class="main-content page archive-page">
					<div class="container">
						<div class="entries grid clearfix">
							<div class="row">
								<section>
									<p>Sorry, no posts matched your criteria.</p>
								</section>
							</div>
						</div>
					</div>
				</div>			
			</div><!-- .reg -->
	<?php endif;  ?>
<?php get_footer(); ?>