<?php


/* ---------------------------------------------------------------------------------------------
   THEME SETUP
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_setup' ) ) {

	function radcliffe_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-image', 1440, 9999 );
		
		// Add nav menu
		register_nav_menu( 'primary', __( 'Primary Menu', 'radcliffe' ) );
		
		// Add title tag support
		add_theme_support( 'title-tag' );
		
		// Make the theme translation ready
		load_theme_textdomain( 'radcliffe', get_template_directory() . '/languages' );

		// Set content width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 740;
		
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}
		
	}
	add_action( 'after_setup_theme', 'radcliffe_setup' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE SCRIPTS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_load_javascript_files' ) ) {

	function radcliffe_load_javascript_files() {

		if ( ! is_admin() ) {
			wp_enqueue_script( 'radcliffe_backstretch', get_template_directory_uri() . '/js/jquery.backstretch.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'radcliffe_global', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), '', true );
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
		}
		
	}
	add_action( 'wp_enqueue_scripts', 'radcliffe_load_javascript_files' );

}


/* ---------------------------------------------------------------------------------------------
   ENQUEUE STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_load_style' ) ) {

	function radcliffe_load_style() {

		if ( ! is_admin() ) {
			wp_enqueue_style( 'radcliffe_googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic,800|Crimson+Text:400,400italic,700,700italic|Abril+Fatface:400' );
			wp_enqueue_style( 'radcliffe_style', get_template_directory_uri() . '/style.css' );
		}
		
	}
	add_action( 'wp_print_styles', 'radcliffe_load_style' );

}


/* ---------------------------------------------------------------------------------------------
   ADD EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_add_editor_styles' ) ) {

	function radcliffe_add_editor_styles() {
		add_editor_style( 'radcliffe-editor-style.css' );
		$font_url = '//fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700,700italic,800|Crimson+Text:400,400italic,700,700italic';
		add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
	add_action( 'init', 'radcliffe_add_editor_styles' );

}


/* ---------------------------------------------------------------------------------------------
   ADD FOOTER WIDGET AREAS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_widget_areas_registration' ) ) {

	function radcliffe_widget_areas_registration() {

		register_sidebar( array(
			'name' 			=> __( 'Footer A', 'radcliffe' ),
			'id' 			=> 'footer-a',
			'description' 	=> __( 'Widgets in this area will be shown in the left column in the footer.', 'radcliffe' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
			'name' 			=> __( 'Footer B', 'radcliffe' ),
			'id' 			=> 'footer-b',
			'description' 	=> __( 'Widgets in this area will be shown in the middle column in the footer.', 'radcliffe' ),
			'before_title' 	=> '<h3 class="widget-title">',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
			'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

		register_sidebar( array(
		'name' 			=> __( 'Footer C', 'radcliffe' ),
		'id' 			=> 'footer-c',
		'description' 	=> __( 'Widgets in this area will be shown in the right column in the footer.', 'radcliffe' ),
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget' 	=> '</div><div class="clear"></div></div>'
		) );

	}
	add_action( 'widgets_init', 'radcliffe_widget_areas_registration' ); 

}


/* ---------------------------------------------------------------------------------------------
   ADD PAGINATION CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_posts_link_attributes_1' ) ) {

	function radcliffe_posts_link_attributes_1() {
		return 'class="post-nav-older"';
	}
	add_filter('next_posts_link_attributes', 'radcliffe_posts_link_attributes_1');

}

if ( ! function_exists( 'radcliffe_posts_link_attributes_2' ) ) {

	function radcliffe_posts_link_attributes_2() {
		return 'class="post-nav-newer"';
	}
	add_filter('previous_posts_link_attributes', 'radcliffe_posts_link_attributes_2');

}


/* ---------------------------------------------------------------------------------------------
   CUSTOM MORE LINK TEXT
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_custom_more_link' ) ) {

	function radcliffe_custom_more_link( $more_link, $more_link_text ) {
		return str_replace( $more_link_text, __( 'Continue reading', 'radcliffe' ), $more_link );
	}
	add_filter( 'the_content_more_link', 'radcliffe_custom_more_link', 10, 2 );

}


/* ---------------------------------------------------------------------------------------------
   BODY & POST CLASSES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_body_post_classes' ) ) {

	function radcliffe_body_post_classes( $classes ) {

		// If has post thumbnail
		$classes[] = has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image';

		return $classes;
	}
	add_filter( 'post_class', 'radcliffe_body_post_classes' );
	add_filter( 'body_class', 'radcliffe_body_post_classes' );

}


/* ---------------------------------------------------------------------------------------------
   ADMIN CSS
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_admin_css' ) ) {

	function radcliffe_admin_css() {  ?>
			<style type="text/css">
				#postimagediv #set-post-thumbnail img {
					max-width: 100%;
					height: auto;
				}
			</style>
		<?php
	}
	add_action( 'admin_head', 'radcliffe_admin_css' );

}


/* ---------------------------------------------------------------------------------------------
   RADCLIFFE COMMENT FUNCTION
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'radcliffe_comment' ) ) {

	function radcliffe_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
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
					echo '<a href="' . esc_url( get_comment_link( $comment->comment_ID ) ) . '" title="' . __( 'Comment by post author','radcliffe' ) . '" class="by-post-author"> ' . __( '(Post author)', 'radcliffe' ) . '</a>';
				} 
				
				?>
				
				<div class="comment-inner">
				
					<div class="comment-header">
												
						<cite><?php echo get_comment_author_link(); ?></cite>
						
						<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date() . ' &mdash; ' . get_comment_time(); ?></a></span>
					
					</div>
		
					<div class="comment-content">
					
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

}


/* ---------------------------------------------------------------------------------------------
   RADCLIFFE THEME OPTIONS
   --------------------------------------------------------------------------------------------- */


class radcliffe_customize {

   public static function radcliffe_register( $wp_customize ) {
   
      //1. Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_section( 'radcliffe_options', 
         array(
            'title' 			=> __( 'Radcliffe Options', 'radcliffe' ), //Visible title of section
            'priority' 			=> 35, //Determines what order this appears in
            'capability' 		=> 'edit_theme_options', //Capability needed to tweak
            'description' 		=> __( 'Allows you to customize theme settings for Radcliffe.', 'radcliffe'), //Descriptive tooltip
         ) 
      );
      
      $wp_customize->add_section( 'radcliffe_logo_section' , array(
		    'title'       => __( 'Logo', 'radcliffe' ),
		    'priority'    => 40,
		    'description' => __('Upload a logo to replace the default site name and description in the header','radcliffe'),
		) );
      
      //2. Register new settings to the WP database...
      $wp_customize->add_setting( 'accent_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' 			=> '#ca2017', //Default setting/value to save
            'type' 				=> 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' 		=> 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport' 		=> 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback' => 'sanitize_hex_color'
         ) 
      );
      
      $wp_customize->add_setting( 'radcliffe_logo', 
      	array( 
      		'sanitize_callback' => 'esc_url_raw'
      	) 
      );
                  
      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'radcliffe_accent_color', //Set a unique ID for the control
         array(
            'label' 		=> __( 'Accent Color', 'radcliffe' ), //Admin-visible name of the control
            'section' 		=> 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' 		=> 'accent_color', //Which setting to load and manipulate (serialized is okay)
            'priority' 		=> 10, //Determines the order this control appears in for the specified section
         ) 
      ) );
      
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'radcliffe_logo', array(
		    'label'    => __( 'Logo', 'radcliffe' ),
		    'section'  => 'radcliffe_logo_section',
		    'settings' => 'radcliffe_logo',
		) ) );
      
      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
   }

   public static function radcliffe_header_output() {
      ?>
      
	      <!-- Customizer CSS --> 
	      
	      <style type="text/css">
	           <?php self::radcliffe_generate_css('body a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('body a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.blog-title a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.main-menu > li:hover > a', 'background', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.main-menu ul a:hover', 'background', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('a.post-header:hover .post-title', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.single .post-meta-top a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-content a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-content a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-content fieldset legend', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-content input[type="submit"]:hover', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-content input[type="reset"]:hover', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-content input[type="button"]:hover', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-meta a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.post-author-inner h3 a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.author-links a:hover', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.add-comment-title a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.add-comment-title a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.by-post-author', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-actions a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-actions a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-header cite a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-header span a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-content a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-content a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-actions a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('#cancel-comment-reply-link', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('#cancel-comment-reply-link:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.comment-nav-below a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.logged-in-as a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.logged-in-as a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.content #respond input[type="submit"]:hover', 'background-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.archive-container a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.archive-nav a:hover', 'background', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('#wp-calendar tfoot a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.tagcloud a:hover', 'background', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.tagcloud a:hover:before', 'border-right-color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.credits a:hover', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.nav-toggle.active', 'background', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('.mobile-menu a:hover', 'background', 'accent_color'); ?>
	           
	           <?php self::radcliffe_generate_css('body#tinymce.wp-editor a', 'color', 'accent_color'); ?>
	           <?php self::radcliffe_generate_css('body#tinymce.wp-editor a:hover', 'color', 'accent_color'); ?>
	      </style> 
	      
	      <!--/Customizer CSS-->
	      
      <?php
   }
   
   public static function radcliffe_live_preview() {
      wp_enqueue_script( 
           'radcliffe-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
           array( 'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }

   public static function radcliffe_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'radcliffe_customize' , 'radcliffe_register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'radcliffe_customize' , 'radcliffe_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'radcliffe_customize' , 'radcliffe_live_preview' ) );

?>