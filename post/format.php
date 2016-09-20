<?php
/**
 * This file is used for your standard post format.
 * @package Podcaster
 * @since 1.0
 * @author Theme Station : http://www.themestation.net
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.net
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
$format = get_post_format();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<?php get_template_part('post/postheader'); ?>
		
			<?php if ( is_archive() || is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
				<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
				<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'thstlang' ) ); ?>
				</div><!-- .entry-content -->
			<?php endif; ?>
			
		<?php get_template_part('post/postfooter'); ?>
			
	</article><!-- #post -->