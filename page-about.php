<?php
/**
 * About Page
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
									<p>Apply Filters is a podcast dedicated to WordPress development and brought to you by <a href="http://bradt.ca/">Brad Touesnard</a> and <a href="http://pippinsplugins.com/">Pippin Williamson</a>.</p>

									<p>We love talking about code and and not worrying about annoying the non-developer listeners in the audience.</p>

									<p>Our discussions will include everything from development in WordPress core, plugins, and themes. We will be sharing much of our own experiences in the development world, as well as bringing on guest developers to share their stories.</p>

									<section class="host-profiles">
										<article>
											<img src="//gravatar.com/avatar/e538ca4cb34839d4e5e3ccf20c37c67b?size=200" alt="" />
											<div class="desc">
												<h3>Brad Touesnard</h3>
												<p>Brad is founder of <a href="//deliciousbrains.com/">Delicious Brains</a>, a company building super awesome products for WordPress including the critically acclaimed <a href="http://deliciousbrains.com/wp-migrate-db-pro/">WP Migrate DB Pro</a>, a plugin allowing developers to easily migrate their WordPress databases.</p>
											</div>
										</article>

										<article>
											<img src="//gravatar.com/avatar/f55b8496017b65a9b3458e344a8116fd?size=200" alt="" />
											<div class="desc">
												<h3>Pippin Williamson</h3>
												<p>Pippin is a full time WordPress plugin developer and the creator of popular plugins such as Easy Digital Downloads and Restrict Content Pro. Along with his own plugin business, Pippin reviews plugins for the WordPress.org plugin repository, and contributes to WordPress core and bbPress, an official sister project of WordPress.</p>
											</div>
										</article>
									</section>
								</div><!--post_body-->
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