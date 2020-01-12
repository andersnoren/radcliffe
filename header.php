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
			
				<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" placeholder="<?php _e( 'Type and press enter', 'radcliffe' ); ?>" name="s" id="s" />
				</form>
			
			</div>
		
		</div>
	
		<div class="header section light-padding">
		
			<div class="header-inner section-inner">
			
				<?php if ( get_theme_mod( 'radcliffe_logo' ) ) : ?>
					
				        <a class="blog-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>' rel='home'>
				        	<img src='<?php echo esc_url( get_theme_mod( 'radcliffe_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>'>
				        </a>
			
				<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>
			
					<h1 class="blog-title">
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
					</h1>
					
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
		
				<ul class="main-menu fright">
					
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
					
					<li class="search-toggle-menu-item"><a href="#" class="search-toggle" title="<?php _e( 'Show the search field', 'radcliffe' ); ?>"></a></li>
						
				 </ul>
				
				<div class="clear"></div>
			
			</div><!-- .header -->
			
		</div><!-- .header.section -->
		
		<div class="mobile-menu-container hidden">
		
			<ul class="mobile-menu">
					
					<?php if ( has_nav_menu( 'primary' ) ) {
																		
						wp_nav_menu( $menu_args ); 
					
					} else {
					
						wp_list_pages( $list_pages_args );
						
					} ?>
					
			 </ul>
			 
			 <form method="get" class="mobile-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" placeholder="<?php _e( 'Search form', 'radcliffe' ); ?>" name="s" id="s" /> 
				<input type="submit" value="<?php _e( 'Search', 'radcliffe' ); ?>" class="search-button">
			</form>
			 
		</div><!-- .mobile-menu-container -->