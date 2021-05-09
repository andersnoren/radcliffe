<?php

/* ---------------------------------------------------------------------------------------------
   CUSTOMIZER SETTINGS
   --------------------------------------------------------------------------------------------- */

if ( ! class_exists( 'Radcliffe_Customize' ) ) : 
	class Radcliffe_Customize {

		public static function register( $wp_customize ) {

			/* 	-----------------------------------------------------------------------------------
				Custom Logo Setting
			------------------------------------------------------------------------------------ */

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

			/*	-----------------------------------------------------------------------------------
				Accent Color Setting
			------------------------------------------------------------------------------------ */

			$wp_customize->add_setting( 'accent_color', array(
				'default' 			=> '#ca2017', 
				'type' 				=> 'theme_mod', 
				'capability' 		=> 'edit_theme_options', 
				'sanitize_callback' => 'sanitize_hex_color'
			) );	
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'radcliffe_accent_color', array(
				'label' 			=> __( 'Accent Color', 'radcliffe' ),
				'section' 			=> 'colors',
				'settings' 			=> 'accent_color',
				'priority' 			=> 10,
			) ) );

		}

		// Function handling our header output of styles
		public static function header_output() {

			$default_color = '#ca2017';
			$accent = get_theme_mod( 'accent_color', $default_color );

			if ( $accent == $default_color || ! $accent ) return;

			// An array storing all of the elements with custom accent color, sorted by the CSS property to modify.
			$properties = apply_filters( 'radcliffe_accent_color_elements', array(
				'background-color' 		=> array(  'fieldset legend', ':root .has-accent-background-color', '.author-links a:hover', '.by-post-author', '.archive-nav a:hover', '.tagcloud a:hover', '.nav-toggle.active', '.mobile-menu a:hover', 'button:hover', '.button:hover', '.faux-button:hover', '.wp-block-button__link:hover', ':root .wp-block-file__button:hover', 'input[type="button"]:hover', 'input[type="reset"]:hover', 'input[type="submit"]:hover', '.main-menu li:hover > a', '.main-menu a:not(.search-toggle):focus', '.main-menu .focus > a', '.bypostauthor .by-post-author' ),
				'border-right-color'	=> array( '.tagcloud a:hover:before' ),
				'color' 				=> array( 'a', '.blog-title a:hover', 'a.post-header:hover .post-title', '.single .post-meta-top a:hover', ':root .has-accent-color', '.post-meta a:hover', '.post-author-inner h3 a:hover', '.comment-actions a', '.comment-actions a:hover', '.comment-header cite a:hover', '.comment-header span a:hover', '.comment-actions a:hover', '.comment-nav-below a:hover', '.archive-container a:hover', '#wp-calendar tfoot a:hover', '.credits a:hover', '.comments-nav-below a:hover' ),
			) );

			$css = '<!-- Customizer CSS --><style type="text/css">';
			foreach ( $properties as $property => $selectors ) {
				foreach ( $selectors as $selector ) {
					$css .= sprintf( '%s { %s: %s; }', $selector, $property, $accent );
				}
			}
			$css .= '</style><!-- /Customizer CSS -->';

			echo $css;

		}

	}

	// Setup the Theme Customizer settings and controls...
	add_action( 'customize_register', array( 'Radcliffe_Customize', 'register' ) );

	// Output custom CSS to live site
	add_action( 'wp_head', array( 'Radcliffe_Customize', 'header_output' ) );

endif;
