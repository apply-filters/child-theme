<?php
/**
 * This file is used to display your standard pages.
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.co
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); 

$options = get_option('podcaster-theme');  

$attachment_id = get_post_thumbnail_id( $post->ID );
$image_attributes = wp_get_attachment_image_src( $attachment_id, 'original' ); // returns an array
$thumb_back = $image_attributes[0];

//Header Settings
$subtitle_blurb = get_post_meta($post->ID, 'cmb_thst_page_subtitle', true);
$bg_style = get_post_meta($post->ID, 'cmb_thst_page_header_bg_style', true);
$bg_parallax = get_post_meta($post->ID, 'cmb_thst_page_header_parallax', true);
$heading_align = get_post_meta($post->ID, 'cmb_thst_page_header_align', true);

?>

 	
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post(); 

$attachment_id = get_post_thumbnail_id( $post->ID );
$image_attributes = wp_get_attachment_image_src( $attachment_id, 'original' ); // returns an array
$thumb_back = $image_attributes[0];

//Header Settings
$subtitle_blurb = get_post_meta($post->ID, 'cmb_thst_page_subtitle', true);
$bg_style = get_post_meta($post->ID, 'cmb_thst_page_header_bg_style', true);
$bg_parallax = get_post_meta($post->ID, 'cmb_thst_page_header_parallax', true);
$heading_align = get_post_meta($post->ID, 'cmb_thst_page_header_align', true);

if(isset($options['pod-sticky-header'])){
	$pod_sticky_header = $options['pod-sticky-header'];
}
?>
	
	<?php if ( isset( $pod_sticky_header ) && $pod_sticky_header == TRUE ) : ?>
	<div class="reg sticky">
	<?php else : ?>
	<div class="reg">
	<?php endif ; ?>
		<div class="static">
			<?php if( has_post_thumbnail() ) : ?>
				<?php if( $bg_parallax == 'on' ) : ?>
					<div class="content_page_thumb" style="background-image: url('<?php echo $thumb_back ?>'); <?php echo $bg_style ?>" data-stellar-background-ratio="0.5">
				<?php else : ?>
					<div class="content_page_thumb" style="background-image: url('<?php echo $thumb_back ?>'); <?php echo $bg_style ?>">
				<?php endif; ?>
			<div class="transparent">
			<?php endif; ?>
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="heading">
							<?php if ( has_post_thumbnail() && $subtitle_blurb == '' ) : ?>
								<div class="title" style="padding:140px 0; <?php echo $heading_align ?>">
									<h1><?php the_title(); ?></h1>
								</div>
							<?php elseif ( has_post_thumbnail() && $subtitle_blurb != '' ) : ?>
								<div class="title" style="padding:90px 0; <?php echo $heading_align ?>">
									<h1><?php the_title(); ?></h1>
									<p><?php echo $subtitle_blurb ?></p>
								</div>
							<?php else : ?>
								<div class="title" style="padding:10px 0; <?php echo $heading_align ?>">
									<h1><?php the_title(); ?></h1>
								</div>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php if( has_post_thumbnail() ) : ?>
			</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	
	<div class="main-content page">
        <div class="container">
	            <div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="page post">
	
							<div class="content">
								<div class="entry-content clearfix">
									<?php the_content(); ?>
								</div><!--post_body-->
								<?php 
									wp_link_pages(array(
								        'before' => '<div class="post_pagination clearfix">',
								        'after' => '</div>',
								        'next_or_number' => 'next_and_number',
								        'nextpagelink' => __('Next'),
								        'previouspagelink' => __('Previous'),
								        'pagelink' => '%',
								        'echo' => 1 )
								    );
								 ?>
							</div><!--content-->			
						</div>
			        </div>
					
					<div class="col-lg-4 col-md-4">
						<?php get_template_part( 'sidebar' ); ?> 
					</div><!--span4-->
	            </div>
        </div>
    </div>
	
<?php endwhile; else: ?>
<p><?php echo __('Sorry, no posts matched your criteria.', 'thstlang'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>