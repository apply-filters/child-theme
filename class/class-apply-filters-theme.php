<?php

class Apply_Filters_Theme {

	function __construct( $dir_path ) {
		// path & url class properties
		$this->dir_path = trailingslashit( $dir_path );
		$this->url = trailingslashit( dirname( get_stylesheet_uri() ) );
		$this->css_url = $this->url . 'asset/css/';
		$this->js_url = $this->url . 'asset/js/';
		$this->img_url = $this->url . 'asset/img/';
		$this->slug = basename( $this->dir_path );
		$this->css_js_suffix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

		// child theme version
		$this->version = '1.0.1';

		// actions
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) ); // enqueue our child theme assets
		add_action( 'pre_get_posts', array( $this, 'exclude_podcasts_on_blog_archive' ) ); // exclude podcast posts on the blog archive

		// filters
		add_filter( 'body_class', array( $this, 'page_specific_body_class' ) ); // makes it easier to style specific pages

		// custom podcast archive thumbnail image size
		add_image_size( 'apply-filters-podcast-front-page-hard', 1040, 520, true );

		/*
		 * we probably only need 1 site-wide sidebar
		 * remove all sidebars and instead hardcode the sidebar content into the sidebar.php template
		 */
		unregister_sidebar( 'sidebar_blog' );
		unregister_sidebar( 'sidebar_single' );
		unregister_sidebar( 'sidebar_page' );
	}

	function exclude_podcasts_on_blog_archive( $query ) {
		if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
			$query->set( 'post_type', 'post' );
		}
	}

	function enqueue_assets() {
		// try to avoid fetching cached assets when developing with SCRIPT_DEBUG turned on
		$version = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? time() : $this->version;

		wp_dequeue_script( 'thst-resmen' );

		// css
		wp_enqueue_style( 'apply-filters', $this->css_url . 'style.css', NULL, $version );
		wp_enqueue_style( 'genericons' );

		// js
		wp_enqueue_script( 'apply-filters', $this->js_url . 'apply-filters' . $this->css_js_suffix . '.js', array( 'jquery' ), $version  );
	}

	function page_specific_body_class( $classes ) {
		global $wp;
		if ( ! is_front_page() ) {
			$classes[] = str_replace( '/', '-', $wp->request );
		}
		return $classes;
	}

	public static function menu() {

		$page_menu_items = array(
			'podcast' 			=> 'Episodes',
			'about'				=> 'About',
			'sponsorship'		=> 'Sponsorship',
			'submit-topic-idea'	=> 'Submit Topic Idea',
			'blog'				=> 'Blog',
		);

		ob_start(); ?>
		<ul class="thst-menu" id="menu-main-nav">
			<?php foreach ( $page_menu_items as $slug => $title ) : ?>
			<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-<?php echo $slug; ?>"><a href="<?php echo trailingslashit( home_url( $slug ) ); ?>"><?php echo $title; ?></a></li>
			<?php endforeach; ?>
			<li class="menu-item nav-social"><a title="Like us on Facebook" rel="nofollow" onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://www.facebook.com']);" href="https://www.facebook.com/applyfilters">Facebook</a></li>
			<li class="menu-item nav-social"><a title="Follow us on Google+" rel="nofollow" onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://plus.google.com']);" href="https://plus.google.com/+ApplyfiltersFm">Google+</a></li>
			<li class="menu-item nav-social"><a title="Follow us on Twitter" rel="nofollow" onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://twitter.com']);" href="https://twitter.com/applyfilters">Twitter</a></li>
			<li class="menu-item nav-social"><a title="Subscribe to our RSS feed" rel="nofollow" href="<?php echo home_url( '?feed=podcast' ); ?>">RSS</a></li>
		</ul> <?php
		return ob_get_clean();
	}

}