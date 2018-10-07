<?php get_header(); ?>

	<div class="content">

		<?php if ( have_posts() ) : ?>
					
			<div class="posts">
			
				<div class="page-title section light-padding">
			
					<h4 class="section-inner">
				
						<?php 
						
						printf( __( 'Search results: "%s"', 'radcliffe' ), get_search_query() );
						
						$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
						
						if ( 1 < $wp_query->max_num_pages ) : ?>
						
							<span><?php printf( __( '(page %1$s of %2$s)', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></span>
						
						<?php endif; ?>
					
					</h4>
					
				</div>
				
				<div class="clear"></div>
	
				<?php while ( have_posts() ) : the_post(); ?>
		    	
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    	
			    		<?php get_template_part( 'content', get_post_format() ); ?>
			    				    		
		    		</div><!-- .post -->
		    			        		            
		        <?php endwhile; ?>
							
			</div><!-- .posts -->
			
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
				<div class="archive-nav">
				
					<?php echo get_next_posts_link( '&laquo; ' . __( 'Older posts', 'radcliffe' ) ); ?>
						
					<?php echo get_previous_posts_link( __( 'Newer posts', 'radcliffe' ) . ' &raquo;' ); ?>
					
					<div class="clear"></div>
					
				</div><!-- .post-nav archive-nav -->
								
			<?php endif; ?>
	
		<?php else : ?>
						
				<div class="page-title section small-padding">
			
					<h4>

						<?php
				
						printf( __( 'Search results: "%s"', 'radcliffe' ), get_search_query() );
						
						$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
						
						if ( 1 < $wp_query->max_num_pages ) : ?>
						
							<span><?php printf( __( '(page %1$s of %2$s)', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></span>
						
						<?php endif; ?>
						
					</h4>
					
				</div>
							
				<div class="post section medium-padding">
				
					<div class="post-content section-inner thin">
					
						<p><?php _e( 'No results. Try again, would you kindly?', 'radcliffe' ); ?></p>
					
					</div><!-- .post-content -->
					
					<div class="section-inner thin">
					
						<?php get_search_form(); ?>
					
					</div>
					
					<div class="clear"></div>
				
				</div><!-- .post -->
			
			</div><!-- .posts -->
		
		<?php endif; ?>
		
	</div><!-- .content section-inner -->
		
<?php get_footer(); ?>