<?php
/**
 * This file is used to display the navigation.
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.co
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>

<div class="above">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-md-12">
				<header class="header" id="top" role="banner">
					<a href="#" id="open-off-can" class="open-menu batch"><i class="menu-icon"></i></a>
					<?php if ( is_front_page() ) { ?>
						<h1 class="logo-container main-title"><a href="<?php echo home_url( '/' ); ?>" class="logo ir" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } else { ?>
						<a href="<?php echo home_url( '/' ); ?>" class="main-title logo ir" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php } ?>
				</header><!--header-->

				<div class="social-media-icons">
					<a href="https://www.facebook.com/applyfilters" class="social-facebook" rel="nofollow" title="Like us on Facebook">Facebook</a>
					<a href="https://plus.google.com/+ApplyfiltersFm" class="social-google" rel="nofollow" title="Follow us on Google+">Google+</a>
					<a href="https://twitter.com/applyfilters" class="social-twitter" rel="nofollow" title="Follow us on Twitter">Twitter</a>
					<a href="<?php echo home_url( '?feed=podcast' ); ?>" class="social-rss" rel="nofollow" title="Subscribe to our RSS feed">RSS</a>
				</div>

				<nav id="nav" class="navigation" role="navigation">
					<?php echo Apply_Filters_Theme::menu(); ?>
				</nav><!--navigation-->
			</div><!--col-lg-12-->

		</div><!--row-->
	</div><!--container-->
</div>