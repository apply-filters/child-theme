<?php
/**
 * This file is used for your footer.
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.co
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
$options = get_option('podcaster-theme');  
if(isset($options['pod-footer-text'])){
	$pod_footer_text = $options['pod-footer-text'];
}


if( isset( $options['pod-facebook'] ) ){
	$pod_facebook = $options['pod-facebook'];
}
if( isset( $options['pod-twitter'] ) ){
	$pod_twitter = $options['pod-twitter'];
}
if( isset( $options['pod-google'] ) ){
	$pod_google = $options['pod-google'];
}
if( isset( $options['pod-instagram'] ) ){
	$pod_instagram = $options['pod-instagram'];
}
if( isset( $options['pod-tumblr'] ) ){
	$pod_tumblr = $options['pod-tumblr'];
}
if( isset( $options['pod-pinterest'] ) ){
	$pod_pinterest = $options['pod-pinterest'];
}
if( isset( $options['pod-flickr'] ) ){
	$pod_flickr = $options['pod-flickr'];
}
if( isset( $options['pod-youtube'] ) ){
	$pod_youtube = $options['pod-youtube'];
}
if( isset( $options['pod-vimeo'] ) ){
	$pod_vimeo = $options['pod-vimeo'];
}
if( isset( $options['pod-skype'] ) ){
	$pod_skype = $options['pod-skype'];
}
if( isset( $options['pod-dribbble'] ) ){
	$pod_dribbble = $options['pod-dribbble'];
}
if( isset( $options['pod-weibo'] ) ){
	$pod_weibo = $options['pod-weibo'];
}
if( isset( $options['pod-foursquare'] ) ){
	$pod_foursquare = $options['pod-foursquare'];
}
if( isset( $options['pod-github'] ) ){
	$pod_github = $options['pod-github'];
}
if( isset( $options['pod-xing'] ) ){
	$pod_xing = $options['pod-xing'];
}
?>

<div class="postfooter">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<span><?php echo get_bloginfo( 'name' ); ?></span> &copy; <?php echo date("Y") ?>
					</div><!-- .col -->
					<div class="col-lg-8 col-md-8">
						<nav class="menu-main-nav-container">
							<?php echo Apply_Filters_Theme::menu(); ?>
						</nav><!--navigation-->
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .col -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .post-footer -->

</div><!--end .supercontainer-->
<?php wp_footer(); /* Footer hook, do not delete, ever */ ?>

</body>
</html>