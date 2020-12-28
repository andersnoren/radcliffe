<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		?>
	
		<div class="header-search-block section light-padding hidden">
			<div class="section-inner">
				<?php get_search_form(); ?>
			</div>
		</div>
	
		<div class="header section light-padding">
		
			<div class="header-inner section-inner">
			
				<?php 

				$custom_logo_id 	= get_theme_mod( 'custom_logo' );
				$legacy_logo_url 	= get_theme_mod( 'radcliffe_logo' );
				$title_element 		= is_front_page() && is_home() ? 'h1' : 'div';
				
				if ( $custom_logo_id  || $legacy_logo_url ) : 

					$custom_logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : $legacy_logo_url; ?>
					
					<<?php echo $title_element; ?> class="blog-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="screen-reader-text"><?php echo get_bloginfo( 'title' ); ?></span>
							<img src="<?php echo esc_url( $custom_logo_url ); ?>">
						</a>
					</<?php echo $title_element; ?>>
			
				<?php elseif ( get_bloginfo( 'title' ) ) : ?>
			
					<<?php echo $title_element; ?> class="blog-title">
						<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo get_bloginfo( 'title' ); ?></a>
					</<?php echo $title_element; ?>>
					
				<?php endif; ?>
				
				<div class="nav-toggle">
				
					<p><?php _e( 'Menu', 'radcliffe' ); ?></p>
				
					<div class="bars">
					
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						
						<div class="clear"></div>
					
					</div>
				
				</div>
		
				<ul class="main-menu">
					
					<?php if ( has_nav_menu( 'primary' ) ) {

						$menu_args = array( 
							'container' 		=> '', 
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary'
						);

						wp_nav_menu( $menu_args ); 
					
					} else {

						$list_pages_args = array(
							'container' => '',
							'title_li' 	=> ''
						);
					
						wp_list_pages( $list_pages_args );
						
					} ?>
					
					<li class="search-toggle-menu-item">
						<a href="#" class="search-toggle">
							<span class="screen-reader-text"><?php _e( 'Show the search field', 'radcliffe' ); ?></span>
						</a>
					</li>
						
				</ul>
			
			</div><!-- .header -->
			
		</div><!-- .header.section -->
		
		<div class="mobile-menu-container hidden">
		
			<ul class="mobile-menu">
					
				<?php 
				
				if ( has_nav_menu( 'primary' ) ) {
																	
					wp_nav_menu( $menu_args ); 
				
				} else {
				
					wp_list_pages( $list_pages_args );
					
				} 
				
				?>
					
			 </ul><!-- .mobile-menu -->
			 
			 <?php get_search_form(); ?>
			 
		</div><!-- .mobile-menu-container -->