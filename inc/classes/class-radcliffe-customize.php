<?php

/* ---------------------------------------------------------------------------------------------
   CUSTOMIZER SETTINGS
   --------------------------------------------------------------------------------------------- */

class Radcliffe_Customize {

	public static function radcliffe_register( $wp_customize ) {

		/* -------------------------------------------------------------------------------------
		   Custom Logo Setting
		   ------------------------------------------------------------------------------------- */

		// Only display the Customizer section for the radcliffe_logo setting if it already has a value.
		// This means that site owners with existing logos can remove them, but new site owners can't add them.
		// Since v2, the core custom_logo setting (in the Site Identity Customizer panel) should be used instead.
		if ( get_theme_mod( 'radcliffe_logo' ) ) {

			$wp_customize->add_section( 'radcliffe_logo_section' , array(
				'title'       		=> __( 'Logo', 'radcliffe' ),
				'priority'    		=> 40,
				'description' 		=> __( 'Upload a logo to replace the default site name and description in the header','radcliffe' ),
			) );

			$wp_customize->add_setting( 'radcliffe_logo', array( 
				'sanitize_callback' => 'esc_url_raw'
			) );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'radcliffe_logo', array(
				'label'    			=> __( 'Logo', 'radcliffe' ),
				'section'  			=> 'radcliffe_logo_section',
				'settings' 			=> 'radcliffe_logo',
			) ) );

		}

		/* -------------------------------------------------------------------------------------
		   Accent Color Setting
		   ------------------------------------------------------------------------------------- */

		$wp_customize->add_setting( 'accent_color', array(
			'default' 			=> '#ca2017', 
			'type' 				=> 'theme_mod', 
			'capability' 		=> 'edit_theme_options', 
			'transport' 		=> 'postMessage', 
			'sanitize_callback' => 'sanitize_hex_color'
		) );	
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'radcliffe_accent_color', array(
			'label' 			=> __( 'Accent Color', 'radcliffe' ),
			'section' 			=> 'colors',
			'settings' 			=> 'accent_color',
			'priority' 			=> 10,
		) ) );

	}

	public static function radcliffe_header_output() {

		$default_color 	= '#ca2017';
		$accent_color 	= get_theme_mod( 'radcliffe_accent_color', $default_color );

		// Only output if the value differs from the default.
		if ( $accent_color == $default_color ) return;
      
		echo '<!-- Customizer CSS --> ';
		echo '<style type="text/css">';
	
		self::radcliffe_generate_css( 'body a', 'color', $accent_color );
		self::radcliffe_generate_css( '.blog-title a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.main-menu > li:hover > a', 'background', $accent_color );
		self::radcliffe_generate_css( '.main-menu ul a:hover', 'background', $accent_color );
		self::radcliffe_generate_css( 'a.post-header:hover .post-title', 'color', $accent_color );
		self::radcliffe_generate_css( '.single .post-meta-top a:hover', 'color', $accent_color );

		self::radcliffe_generate_css( '.post-content a', 'color', $accent_color );
		self::radcliffe_generate_css( '.post-content a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.post-content fieldset legend', 'background-color', $accent_color );
		self::radcliffe_generate_css( '.post-content input[type="submit"]:hover', 'background-color', $accent_color );
		self::radcliffe_generate_css( '.post-content input[type="reset"]:hover', 'background-color', $accent_color );
		self::radcliffe_generate_css( '.post-content input[type="button"]:hover', 'background-color', $accent_color );

		self::radcliffe_generate_css( '.post-content .has-accent-color', 'color', $accent_color  );
		self::radcliffe_generate_css( '.post-content .has-accent-background-color', 'background-color', $accent_color  );
			
		self::radcliffe_generate_css( '.post-meta a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.post-author-inner h3 a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.author-links a:hover', 'background-color', $accent_color );
		self::radcliffe_generate_css( '.add-comment-title a', 'color', $accent_color );
		self::radcliffe_generate_css( '.add-comment-title a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.by-post-author', 'background-color', $accent_color );
		self::radcliffe_generate_css( '.comment-actions a', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-actions a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-header cite a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-header span a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-content a', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-content a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-actions a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '#cancel-comment-reply-link', 'color', $accent_color );
		self::radcliffe_generate_css( '#cancel-comment-reply-link:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.comment-nav-below a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.content #respond input[type="submit"]:hover', 'background-color', $accent_color );

		self::radcliffe_generate_css( '.archive-container a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.archive-nav a:hover', 'background', $accent_color );

		self::radcliffe_generate_css( '#wp-calendar tfoot a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.tagcloud a:hover', 'background', $accent_color );
		self::radcliffe_generate_css( '.tagcloud a:hover:before', 'border-right-color', $accent_color );

		self::radcliffe_generate_css( '.credits a:hover', 'color', $accent_color );
		self::radcliffe_generate_css( '.nav-toggle.active', 'background', $accent_color );
		self::radcliffe_generate_css( '.mobile-menu a:hover', 'background', $accent_color );

		self::radcliffe_generate_css( 'body#tinymce.wp-editor a', 'color', $accent_color );
		self::radcliffe_generate_css( 'body#tinymce.wp-editor a:hover', 'color', $accent_color );
			   
		echo '</style>';
		echo '<!--/Customizer CSS-->';

	}

	public static function radcliffe_live_preview() {
		wp_enqueue_script( 'radcliffe-themecustomizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '', true );
	}

	public static function radcliffe_generate_css( $selector, $style, $value, $prefix = '', $postfix = '', $echo = true ) {
		$return = sprintf( '%s { %s:%s; }', $selector, $style, $prefix . $value . $postfix );
		if ( $echo ) echo $return;
		return $return;
	}

}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Radcliffe_Customize', 'radcliffe_register' ) );

// Output custom CSS to live site
add_action( 'wp_head', array( 'Radcliffe_Customize', 'radcliffe_header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', array( 'Radcliffe_Customize', 'radcliffe_live_preview' ) );