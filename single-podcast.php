<?php
/**
 * Template file for display single podcast episodes
 *
 * @package WordPress
 * @subpackage SeriouslySimplePodcasting
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

get_header();
the_post();

$id = get_the_ID();
$file = af_get_enclosure( $id );
$terms = wp_get_post_terms( $id , 'series' );
foreach( $terms as $term ) {
	$series_id = $term->term_id;
	$series = $term->name;
	break;
}
$audiourl = apply_filters( 'thst_the_action', $file );
$position = get_the_author_meta( 'user_position' );
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>

	<div class="single-featured thumb_bg" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
		<div class="background">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="player_container<?php if( has_post_thumbnail() && isset( $pod_ssp_single_header_display ) && $pod_ssp_single_header_display == 'thumbnail' ) echo ' with_thumbnail'; ?>">
							<?php if ( isset( $series ) ) : ?>
							<span class="mini-title"><?php echo get_the_date(); ?> &bull; <?php echo $series; ?></span>
							<?php endif; ?>
							<h2><?php the_title(); ?></h2>
							<div class="audio">
								<?php if($file != '') {
									echo '<div class="audio_player">' . do_shortcode('[audio mp3="' . $file . '"][/audio]</div><!--audio_player-->');
								} ?>
							</div><!-- .audio -->
						</div><!-- .player_container -->
						<div class="download-wrapper">
							<a href="<?php echo $audiourl; ?>" class="download-episode" rel="nofollow"><strong>Download Episode</strong> (<?php echo get_post_meta( $id, 'filesize', true ); ?>)</a>
						</div>
						<div class="clear"></div>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .background -->
	</div><!-- .single-featured -->

	<div class="thst-main-posts">
		<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="content">
							<div class="content-inner-wrap">
								<?php the_content(); ?>

								<?php if( has_category() ) : ?>
									<ul class="entry-categories">
										<li><strong><?php echo __('Categories: ', 'thstlang'); ?></strong><?php the_category(', </li> <li> '); ?></li>
									</ul><!--tags-->
								<?php endif; ?>

								<footer class="entry-meta clearfix">
									<ul class="singlep_pagi clearfix">
										<li class="right">
											<p><?php echo __('Previous Post', 'thstlang'); ?></p>
											<?php previous_post_link('%link &rarr;'); ?>
										</li>
										<li class="left">
											<p><?php echo __('Next Post', 'thstlang'); ?></p>
											<?php next_post_link('&larr; %link'); ?>
										</li>
									</ul>
								</footer><!-- .entry-meta -->

								<?php comments_template(); ?>
							</div><!-- .content-inner-wrap -->
						</div><!-- .content-->
					</div>

					<div class="col-lg-4 col-md-4">
					<?php
						/*This displays the sidebar with help of sidebar.php*/
						get_template_part('sidebar');
					?>
					</div><!--span4-->
				</div><!--row-->
		</div><!--container-->
	</div><!--thst-main-posts-->
<?php get_footer(); ?>