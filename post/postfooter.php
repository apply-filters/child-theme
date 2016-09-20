<?php 
/**
 * This file displays your post footer.
 * @package Podcaster
 * @since 1.0
 * @author Theme Station : http://www.themestation.net
 * @copyright Copyright (c) 2014, Theme Station
 * @link http://www.themestation.net
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * */
 
$options = get_option('podcaster-theme'); 
if( isset( $options['pod-comments-display'] ) ){
	$pod_comm_display = $options['pod-comments-display'];
}
if( isset( $options['pod-recordings-category'] ) ){
	$arch_category = $options['pod-recordings-category'];
}
if( isset( $options['pod-archive-hide-in-blog'] ) ) {
 	$podhide_posts = $options['pod-archive-hide-in-blog'];
}
if ( isset( $arch_category ) ) {
	$ex_cats = array( $arch_category );
}
$position = get_the_author_meta( 'user_position' );

?> <?php if ( !( is_archive() || is_search() ) ) : ?>
	<?php 
	wp_link_pages( array(
        'before' => '<div class="post_pagination clearfix">',
        'after' => '</div>',
        'next_or_number' => 'next_and_number',
        'nextpagelink' => __('Next'),
        'previouspagelink' => __('Previous'),
        'pagelink' => '%',
        'echo' => 1 )
    );
 	?>
	<?php endif; ?>

	
	<?php if ( ! is_single() ) { ?>
		<footer class="entry-meta clearfix">
			<div class="entry-taxonomy">	
				<?php if ( comments_open() && isset ( $pod_comm_display ) && $pod_comm_display == TRUE ) : ?>
					<span class="comment-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'thstlang' ) . '</span>', __( '1 Reply', 'thstlang' ), __( '% Replies', 'thstlang' ) ); ?></span>
				<?php else : ?>
					<span class="comment-link"><a href="<?php the_permalink(); ?>"><?php echo __('Read More', 'thstlang') ?></a></span>
				<?php endif; // comments_open() ?>	
			</div>

			<div class="footer-meta">
				<?php // echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">	
						<img title="User" rel="author" src="<?php echo get_avatar_url(get_avatar( get_the_author_meta( 'ID' ), 48 )); ?>" alt="author" class="authorimage" />
					</a>
					<span class="authorname"><?php printf( __( '%s', 'thstlang' ), get_the_author() ); ?></span>
			</div>
	<?php } ?>
			
	<?php if ( is_single() ) { ?>	
		<?php if( has_category() ) : ?>
			<ul class="entry-categories">
				<li><strong><?php echo __('Categories: ', 'thstlang'); ?></strong><?php the_category(', </li> <li> '); ?></li>
			</ul><!--tags-->
		<?php endif; ?>
		<footer class="entry-meta clearfix">
			<?php if ( isset( $ex_cats ) && ! in_category( $ex_cats ) ) { ?>
		<ul class="singlep_pagi clearfix">
			<?php if( isset( $podhide_posts ) && $podhide_posts == TRUE ) : ?>
				<li class="right">
					<p><?php echo __('Previous Post', 'thstlang'); ?></p>
					<?php previous_post_link('%link &rarr;', '%title', '', $ex_cats); ?>
				</li>
				<li class="left">
					<p><?php echo __('Next Post', 'thstlang'); ?></p>
					<?php next_post_link('&larr; %link', '%title', '', $ex_cats); ?>
				</li>
				<?php else : ?>
					<li class="right">
						<p><?php echo __('Previous Post', 'thstlang'); ?></p>
						<?php previous_post_link('%link &rarr;'); ?>
					</li>
					<li class="left">
						<p><?php echo __('Next Post', 'thstlang'); ?></p>
						<?php next_post_link('&larr; %link'); ?>
					</li>
				<?php endif ; ?>
			</ul>
			<?php } ?>
		<?php } ?>
		
		<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries. ?>
			<div class="author-info">
				<div class="author-avatar">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themestation_author_bio_avatar_size', 68 ) ); ?>
					</a>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<h4><?php printf( __( '%s', 'thstlang' ), get_the_author() ); ?></h4>
					<span><?php if ( $position !='' ) { echo $position ; } ?></span><br />
				</div><!-- .author-description -->
			</div><!-- .author-info -->
		<?php endif; ?>	
	</footer><!-- .entry-meta -->