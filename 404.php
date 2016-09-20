<?php
/**
 * This file is used to display your standard pages.
 *
 * @package Podcaster
 * @since 1.0
 * @author Theme Station : http://www.themestation.co
 * @copyright Copyright (c) 2013, Theme Station
 * @link http://www.themestation.co
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Prevent ninja forms from throwing a "Trying to get property of non-object" error
global $post;
$post = new stdClass;
$post->ID = -1;
get_header(); 
?>

	<div class="main-content page">
        <div class="container">
	        <div class="row">
				<div class="col-lg-12">
					<div class="page post">
						<div class="content">
							<div class="post_body clearfix">
								<h2><?php echo __('404 Error', 'thstlang'); ?></h2>

								<p><?php echo __('It looks like nothing was found at this location. Maybe try a search?', 'thstlang'); ?></p>
								<?php get_search_form(); ?>

								<h4><?php echo __('Or try one of the following', 'thstlang'); ?></h4>

								<ul>
									<li><a href="<?php echo home_url(); ?>">Home</a></li>
									<li><a href="<?php echo home_url( 'podcast' ); ?>">Episodes</a></li>
									<li><a href="<?php echo home_url( 'about' ); ?>">About</a></li>
									<li><a href="<?php echo home_url( 'sponsorship' ); ?>">Sponsorship</a></li>
									<li><a href="<?php echo home_url( 'submit-topic-idea' ); ?>">Submit Topic Idea</a></li>
									<li><a href="<?php echo home_url( 'blog' ); ?>">Blog</a></li>
								</ul>

							</div><!-- .post_body -->
						</div><!-- .content -->			
					</div><!-- .page.post-->
			    </div><!-- .col -->
	        </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .main-content -->
	
<?php get_footer(); ?>