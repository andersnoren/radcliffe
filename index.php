<?php get_header(); ?>

<div class="content">
																	                    
	<?php if ( have_posts() ) : ?>

		<?php if ( is_search() || is_archive() ) : ?>

			<div class="page-title section light-padding">
		
				<div class="section-inner">

					<h4>
						<?php 
						if ( is_search() ) {
							printf( __( 'Search results: "%s"', 'radcliffe' ), get_search_query() );
						} elseif ( is_day() ) {
							printf( __( 'Date: %s', 'radcliffe' ), '' . get_the_date() . '' );
						} elseif ( is_month() ) {
							printf( __( 'Month: %s', 'radcliffe' ), '' . get_the_date( _x( 'F Y', 'F = Month, Y = Year', 'radcliffe' ) ) );
						} elseif ( is_year() ) {
							printf( __( 'Year: %s', 'radcliffe' ), '' . get_the_date( _x( 'Y', 'Y = Year', 'radcliffe' ) ) );
						} elseif ( is_category() ) {
							printf( __( 'Category: %s', 'radcliffe' ), '' . single_cat_title( '', false ) . '' );
						} elseif ( is_tag() ) {
							printf( __( 'Tag: %s', 'radcliffe' ), '' . single_tag_title( '', false ) . '' );
						} elseif ( is_author() ) {
							$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
							printf( __( 'Author: %s', 'radcliffe' ), $curauth->display_name );
						} else {
							_e( 'Archive', 'radcliffe' );
						}
					
						$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
						
						if ( 1 < $wp_query->max_num_pages ) : 
							?>
						
							<span><?php printf( __( '(page %1$s of %2$s)', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></span>
						
						<?php endif; ?>
					</h4>
					
					<?php

					$tag_description = tag_description();

					if ( $tag_description ) {
						echo '<div class="tag-archive-meta">' . $tag_description . '</div>';
					}

					?>
				
				</div><!-- .section-inner -->
				
			</div><!-- .page-title -->
			
			<div class="clear"></div>

		<?php endif; ?>
	
		<div class="posts">
	
			<?php

			if ( ! is_search() && ! is_archive() ) :

				$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				
				if ( 1 < $paged ) : 
				
					?>
				
					<div class="page-title section small-padding">
					
						<h4 class="section-inner"><?php printf( __( 'Page %1$s of %2$s', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></h4>
						
					</div>
					
					<div class="clear"></div>
				
					<?php 
				endif;
			
			endif;
			
			while ( have_posts() ) : the_post(); 
			
				get_template_part( 'content', get_post_format() );
				
			endwhile;
			
			if ( $wp_query->max_num_pages > 1 ) : ?>
			
				<div class="archive-nav">
				
					<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'radcliffe' ) ); ?>
						
					<?php echo get_previous_posts_link( __( 'Newer posts', 'radcliffe') . ' &raquo;' ); ?>
					
					<div class="clear"></div>
					
				</div><!-- .post-nav archive-nav -->
								
			<?php endif; ?>
        	                    
		<?php endif; ?>
		
	</div><!-- .posts -->
		
</div><!-- .content section-inner -->
	              	        
<?php get_footer(); ?>