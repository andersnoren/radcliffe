<?php get_header(); ?>

<div class="content">
											        
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="section">
		
				<?php 
				
				$image_array = wp_get_attachment_image_src( $post->ID, 'full', false ); 
				$url = $image_array['0']; 
				
				?>
			
				<div class="section-inner thin">
	
					<?php echo wp_get_attachment_image( $post->ID, 'post-image' ); ?>
					
				</div>
				
				<div class="post-header section">
				
					<div class="post-meta-top">
					
						<?php echo get_the_time( get_option( 'date_format' ) ) . ' <span class="sep">/</span> ' . $image_array['1'] . '<span style="text-transform: lowercase;">x</span>' . $image_array['2'] . ' px'; ?>
					
					</div>
				
					<h2 class="post-title"><?php echo basename( get_attached_file( $post->ID ) ); ?></h2>
				
				</div><!-- .post-header -->
				
				<?php if ( ! empty( get_post( get_post_thumbnail_id() )->post_excerpt ) ) : ?>
													
					<div class="post-content section-inner thin">
					
						<p class="p"><?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?></p>
						
					</div>
					
				<?php endif; ?>
			
			</div>
			
			<?php comments_template( '', true );
														                        
		endwhile;

		else : ?>
	
				<p><?php _e( "We couldn't find any posts that matched your query. Please try again.", "radcliffe" ); ?></p>
		
		<?php endif; ?>    
			
	</div><!-- .post -->

</div><!-- .content -->
		
<?php get_footer(); ?>