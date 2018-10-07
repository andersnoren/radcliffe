<?php get_header(); ?>

<div class="content">
																	                    
	<?php if ( have_posts() ) : ?>
	
		<div class="posts">
	
			<?php
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			
			if ( 1 < $paged ) : ?>
			
				<div class="page-title section small-padding">
				
					<h4 class="section-inner"><?php printf( __( 'Page %1$s of %2$s', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></h4>
					
				</div>
				
				<div class="clear"></div>
			
			<?php endif; ?>
				
		    	<?php while ( have_posts() ) : the_post(); ?>
		    	
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		    	
			    		<?php get_template_part( 'content', get_post_format() ); ?>
			    				    		
		    		</div><!-- .post -->
		    			        		            
		        <?php endwhile; ?>
	        	        		
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
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