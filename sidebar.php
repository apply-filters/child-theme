<?php
/**
 * This file is used for your your sidebar.
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.co
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 ?>
 
<div class="sidebar">

	<div class="widget learn-more-widget">
		<p>A podcast from <a href="//twitter.com/bradt" rel="nofollow">@bradt</a> and <a href="//twitter.com/pippinsplugins" rel="nofollow">@pippinsplugins</a> all about WordPress development.</p>
		<p><a href="/about/">Learn more</a></p>
	</div>

	<div class="widget subscribe-with-itunes-widget">
		<a href="https://itunes.apple.com/ca/podcast/apply-filters/id689285167?mt=2" class="ir subscribe-with-itunes" rel="nofollow">Subscribe with iTunes</a>
		<a href="https://itunes.apple.com/ca/podcast/apply-filters/id689285167?mt=2" class="subscribe-with-itunes-button" rel="nofollow">Subscribe with iTunes</a>
		<p>or <a href="<?php echo home_url( '?feed=podcast' ); ?>">subscribe with RSS</a></p>
	</div>

	<?php if( function_exists( 'ninja_forms_display_form' ) ) :?>
	<div class="widget subscribe-via-email">
		<h3>Subscribe via Email</h3>
		<?php ninja_forms_display_form( 1 ); ?>
	</div>
	<?php endif; ?>

</div>