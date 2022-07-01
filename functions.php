<?php


/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_setup' ) ) :
	function radcliffe_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );

		// Custom logo
		add_theme_support( 'custom-logo' );
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1440, 9999 );

		// HTML5 semantic markup for search forms.
		add_theme_support( 'html5', array( 'search-form' ) );
		
		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'radcliffe' ) );
		
		// Add title tag support
		add_theme_support( 'title-tag' );
		
		// Make the theme translation ready
		load_theme_textdomain( 'radcliffe', get_template_directory() . '/languages' );

		// Set content width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 740;
		
	}
	add_action( 'after_setup_theme', 'radcliffe_setup' );
endif;


/*	-----------------------------------------------------------------------------------------------
	REQUIRED FILES
	Include required files.
--------------------------------------------------------------------------------------------------- */

// Handle Customizer settings.
require get_template_directory() . '/inc/classes/class-radcliffe-customize.php';


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_load_javascript_files' ) ) :
	function radcliffe_load_javascript_files() {

		wp_enqueue_script( 'radcliffe_global', get_template_directory_uri() . '/assets/js/global.js', array( 'jquery' ), '', true );
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		
	}
	add_action( 'wp_enqueue_scripts', 'radcliffe_load_javascript_files' );
endif;


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_load_style' ) ) :
	function radcliffe_load_style() {

		if ( ! is_admin() ) {

			$dependencies = array();
			$theme_version = wp_get_theme( 'radcliffe' )->get( 'Version' );

			wp_register_style( 'radcliffe_googlefonts', get_theme_file_uri( '/assets/css/fonts.css' ) );
			$dependencies[] = 'radcliffe_googlefonts';

			wp_enqueue_style( 'radcliffe_style', get_template_directory_uri() . '/style.css', $dependencies, $theme_version );

		}
		
	}
	add_action( 'wp_print_styles', 'radcliffe_load_style' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_add_editor_styles' ) ) :
	function radcliffe_add_editor_styles() {
		
		add_editor_style( array( 'assets/css/classic-editor-styles.css', 'assets/css/fonts.css' ) );

	}
	add_action( 'init', 'radcliffe_add_editor_styles' );
endif;


/* ---------------------------------------------------------------------------------------------
   ADD FOOTER WIDGET AREAS
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_widget_areas_registration' ) ) :
	function radcliffe_widget_areas_registration() {

		$shared_args = array(
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div></div>'
		);

		register_sidebar( array_merge( $shared_args, array(
			'name' 			=> __( 'Footer A', 'radcliffe' ),
			'id' 			=> 'footer-a',
			'description' 	=> __( 'Widgets in this area will be shown in the left column in the footer.', 'radcliffe' ),
		) ) );

		register_sidebar( array_merge( $shared_args, array(
			'name' 			=> __( 'Footer B', 'radcliffe' ),
			'id' 			=> 'footer-b',
			'description' 	=> __( 'Widgets in this area will be shown in the middle column in the footer.', 'radcliffe' ),
		) ) );

		register_sidebar( array_merge( $shared_args, array(
			'name' 			=> __( 'Footer C', 'radcliffe' ),
			'id' 			=> 'footer-c',
			'description' 	=> __( 'Widgets in this area will be shown in the right column in the footer.', 'radcliffe' ),
		) ) );

	}
	add_action( 'widgets_init', 'radcliffe_widget_areas_registration' ); 
endif;


/* ---------------------------------------------------------------------------------------------
   ADD PAGINATION CLASSES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_posts_link_attributes_1' ) ) :
	function radcliffe_posts_link_attributes_1() {

		return 'class="post-nav-older"';

	}
	add_filter('next_posts_link_attributes', 'radcliffe_posts_link_attributes_1');
endif;

if ( ! function_exists( 'radcliffe_posts_link_attributes_2' ) ) :
	function radcliffe_posts_link_attributes_2() {

		return 'class="post-nav-newer"';

	}
	add_filter('previous_posts_link_attributes', 'radcliffe_posts_link_attributes_2');
endif;


/* ---------------------------------------------------------------------------------------------
   OUTPUT TEMPLATE ARCHIVE MARKUP
   On the archive template, output the archive template markup.
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_archive_template_markup' ) ) :
	function radcliffe_archive_template_markup() {

		if ( ! is_page_template( 'template-archive.php' ) ) return;

		$posts_archive = get_posts( array(
			'post_status'		=> 'publish',
			'posts_per_page'	=> -1,
		) );

		if ( ! $posts_archive ) return;

		?>

		<div class="archive-container section-inner thin">
													
			<ul>
				<?php foreach ( $posts_archive as $archive_post ) : ?>
					<li>
						<a href="<?php echo get_the_permalink( $archive_post->ID ); ?>">
							<span class="archive-post-title"><?php echo get_the_title( $archive_post->ID );?></span>
							<time class="archive-post-date"><?php echo get_the_time( get_option( 'date_format' ), $archive_post->ID ); ?></time>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
	
		</div><!-- .archive-container -->

		<?php

	}
	add_action( 'radcliffe_singular_after_entry_content', 'radcliffe_archive_template_markup' );
endif;


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE TITLE

	@param	$title string		The initial title
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_filter_archive_title' ) ) :
	function radcliffe_filter_archive_title( $title ) {

		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; 

		// On home, show no title
		if ( is_home() ) {
			if ( $paged == 1 ) {
				$title = '';
			} else {
				global $wp_query;
				$title = sprintf( __( 'Page %1$s of %2$s', 'radcliffe' ), $paged, $wp_query->max_num_pages );
			}
		}

		// On search, show the search query.
		elseif ( is_search() ) {
			if ( have_posts() ) {
				$title = sprintf( _x( 'Search: %s', '%s = The search query', 'radcliffe' ), '&ldquo;' . get_search_query() . '&rdquo;' );
			} else {
				$title = __( 'No results', 'radcliffe' );
			}
		}

		return $title;

	}
	add_filter( 'get_the_archive_title', 'radcliffe_filter_archive_title' );
endif;


/*	-----------------------------------------------------------------------------------------------
	FILTER ARCHIVE DESCRIPTION

	@param	$description string		The initial description
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_filter_archive_description' ) ) :
	function radcliffe_filter_archive_description( $description ) {

		// On the blog page, use the manual excerpt of the page for posts page.
		$blog_page_id = get_option( 'page_for_posts' );
		if ( is_home() && $blog_page_id && has_excerpt( $blog_page_id ) ) {
			$description = get_the_excerpt( $blog_page_id );
		}
		
		// On search, show a string describing the results of the search.
		elseif ( is_search() ) {
			global $wp_query;
			if ( $wp_query->found_posts ) {
				/* Translators: %s = Number of results */
				$description = sprintf( _nx( 'We found %s result for your search.', 'We found %s results for your search.',  $wp_query->found_posts, '%s = Number of results', 'radcliffe' ), $wp_query->found_posts );
			} else {
				$description = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'radcliffe' );
			}
		}

		return $description;

	}
	add_filter( 'get_the_archive_description', 'radcliffe_filter_archive_description' );
endif;


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_custom_more_link' ) ) :
	function radcliffe_custom_more_link( $more_link, $more_link_text ) {

		return str_replace( $more_link_text, __( 'Continue reading', 'radcliffe' ), $more_link );

	}
	add_filter( 'the_content_more_link', 'radcliffe_custom_more_link', 10, 2 );
endif;


/* ---------------------------------------------------------------------------------------------
   RADCLIFFE COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_comment' ) ) :
	function radcliffe_comment( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		
			<?php __( 'Pingback:', 'radcliffe' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'radcliffe' ), '<span class="edit-link">', '</span>' ); ?>
			
		</li>
		<?php
				break;
			default :
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		
			<div id="comment-<?php comment_ID(); ?>" class="comment">
			
				<?php 
				echo get_avatar( $comment, 150 );
				
				if ( $comment->user_id === $post->post_author ) { 
					echo '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" class="by-post-author"> ' . __( '(Post author)', 'radcliffe' ) . '</a>';
				} 
				
				?>
				
				<div class="comment-inner">
				
					<div class="comment-header">
												
						<cite><?php echo get_comment_author_link(); ?></cite>
						
						<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date() . ' &mdash; ' . get_comment_time(); ?></a></span>
					
					</div>
		
					<div class="comment-content post-content">
					
						<?php if ( '0' == $comment->comment_approved ) : ?>
						
							<p class="comment-awaiting-moderation"><?php __( 'Your comment is awaiting moderation.', 'radcliffe' ); ?></p>
							
						<?php endif; ?>
					
						<?php comment_text(); ?>
						
					</div><!-- .comment-content -->
					
					<div class="comment-actions">
					
						<?php edit_comment_link( __( 'Edit', 'radcliffe' ), '', '' ); ?>
						
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'radcliffe' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
										
					</div><!-- .comment-actions -->
				
				</div><!-- .comment-inner -->
				
			</div><!-- .comment-## -->
					
		<?php
			break;
		endswitch;
	}
endif;


/* ---------------------------------------------------------------------------------------------
   SPECIFY BLOCK EDITOR SUPPORT
------------------------------------------------------------------------------------------------ */

if ( ! function_exists( 'radcliffe_block_editor_features' ) ) :
	function radcliffe_block_editor_features() {

		/* Block Editor Feature Opt-Ins ------ */

		add_theme_support( 'align-wide' );

		/* Block Editor Palette -------------- */

		$accent_color = get_theme_mod( 'accent_color' ) ? get_theme_mod( 'accent_color' ) : '#ca2017';

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Accent', 'Name of the accent color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'accent',
				'color' => $accent_color,
			),
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'black',
				'color' => '#222',
			),
			array(
				'name' 	=> _x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'dark-gray',
				'color' => '#444',
			),
			array(
				'name' 	=> _x( 'Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'medium-gray',
				'color' => '#666',
			),
			array(
				'name' 	=> _x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'light-gray',
				'color' => '#888',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'radcliffe' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

		/* Block Editor Font Sizes ----------- */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 16,
				'slug' 		=> 'small',
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 18,
				'slug' 		=> 'regular',
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 24,
				'slug' 		=> 'large',
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'radcliffe' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'radcliffe' ),
				'size' 		=> 32,
				'slug' 		=> 'larger',
			),
		) );

	}
	add_action( 'after_setup_theme', 'radcliffe_block_editor_features' );
endif;


/* ---------------------------------------------------------------------------------------------
   BLOCK EDITOR STYLES
   --------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'radcliffe_block_editor_styles' ) ) :
	function radcliffe_block_editor_styles() {

		$theme_version = wp_get_theme( 'radcliffe' )->get( 'Version' );

		wp_register_style( 'radcliffe-block-editor-styles-font', get_theme_file_uri( '/assets/css/fonts.css' ) );
		wp_enqueue_style( 'radcliffe-block-editor-styles', get_theme_file_uri( '/assets/css/block-editor-styles.css' ), array( 'radcliffe-block-editor-styles-font' ), $theme_version, 'all' );

	}
	add_action( 'enqueue_block_editor_assets', 'radcliffe_block_editor_styles', 1 );
endif;
