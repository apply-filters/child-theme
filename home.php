<?php
/**
 * Home template
 */
get_header(); ?>

	<div class="reg">
		<div class="static">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<div class="title">
								<h1>Blog</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="entries">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							get_template_part( 'post/format', get_post_format() );
						endwhile; endif; ?>
					</div><!--entries-->
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
					<div class="pagination clearfix">
						<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var( 'paged' ) ),
								'total' => $wp_query->max_num_pages,
							) );
						?> 
					</div><!--pagination-->
					<?php endif; ?>
				</div><!--col-lg-8-->
				<div class="col-lg-4 col-md-4">
					<?php get_template_part('sidebar'); ?>
				</div><!--col-lg-4-->
			</div><!--row-->
		</div><!--container-->
	</div><!--main-content-->
<?php get_footer(); ?>