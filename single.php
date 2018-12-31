<?php get_header(); ?>

<div class="content">
											        
	<?php if ( have_posts() ) : 
		
		while ( have_posts() ) : the_post(); ?>
		
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( has_post_thumbnail() ) : ?>
			
					<div class="featured-media" style="background-image: url( <?php the_post_thumbnail_url( $post->ID, 'post-image' ); ?> );">
			
						<?php 
						
						the_post_thumbnail( 'post-image' );
						
						$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
						
						if ( $image_caption ) : 
							?>
												
							<div class="media-caption-container">
								<p class="media-caption"><?php echo $image_caption; ?></p>
							</div>
							
						<?php endif; ?>
						
					</div><!-- .featured-media -->
						
				<?php endif; ?>
					
				<div class="post-header section">
			
					<div class="post-header-inner section-inner medium">
														
						<p class="post-meta-top">

							<a href="<?php the_permalink(); ?>" title="<?php the_time( get_option( 'time_format' ) ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

							<?php if ( comments_open() ) : ?>
								<span class="sep">/</span>
								<?php comments_popup_link( __( '0 comments', 'radcliffe' ), __( '1 comment', 'radcliffe' ), __( '% comments', 'radcliffe' ), 'post-comments' ); ?>
							<?php endif; ?>
							
							<?php edit_post_link( __( 'Edit', 'radcliffe' ), '<span class="sep">/</span> ' ); ?>

						</p>
												
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
					
					</div><!-- .post-header-inner section-inner -->
															
				</div><!-- .post-header section -->
					
				<div class="post-content section-inner thin">
				
					<?php the_content(); ?>

					<div class="clear"></div>
					
					<?php wp_link_pages('before=<p class="page-links">' . __( 'Pages:', 'radcliffe' ) . ' &after=</p>&separator=<span class="sep">/</span>'); ?>
				
				</div>
				
				<div class="post-meta section-inner thin">
				
					<div class="meta-block post-author">
					
						<h3 class="meta-title"><?php _e( 'About the author', 'radcliffe' ); ?></h3>
						
						<div class="post-author-container">
					
							<?php echo get_avatar( get_the_author_meta( 'email' ), '160' ); ?>
							
							<div class="post-author-inner">
						
								<h3><?php the_author_posts_link(); ?></h3>
								
								<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
								
								<div class="author-links">
									
									<a class="author-link-posts" title="<?php _e( 'Author archive', 'radcliffe' ); ?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php _e( 'Author archive', 'radcliffe' ); ?></a>
									
									<?php 
									$author_url = get_the_author_meta( 'user_url' ); 
									$author_url = preg_replace( '#^https?://#', '', rtrim( $author_url, '/' ) );
																	
									if ( ! empty( $author_url ) ) : ?>
									
										<a class="author-link-website" title="<?php _e( 'Author website', 'radcliffe' ); ?>" href="<?php the_author_meta( 'user_url' ); ?>"><?php _e( 'Author website', 'radcliffe' ); ?></a>
										
									<?php endif; ?>
									
								</div><!-- .author-links -->
							
							</div>
							
							<div class="clear"></div>
						
						</div>
					
					</div><!-- .post-author -->
					
					<div class="meta-block post-cat-tags">
					
						<h3 class="meta-title"><?php _e( 'About the post', 'radcliffe' ); ?></h3>
					
						<p class="post-categories">
													
							<?php the_category( ', ' ); ?>
						
						</p>
						
						<?php if ( has_tag() ) : ?>
							
							<p class="post-tags">
																				
								<?php the_tags( '', ', ' ); ?>
							
							</p>
						
						<?php endif; ?>
					
						<div class="post-nav">
			
							<?php
							$next_post = get_next_post();
							if ( ! empty( $next_post ) ) : ?>
							
								<p class="post-nav-next">
														
									<a title="<?php printf( __( 'Next post: %s', 'radcliffe' ), get_the_title( $next_post->ID ) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
								
								</p>
						
							<?php endif; 
							
							$prev_post = get_previous_post();
							if ( ! empty( $prev_post ) ) : ?>
							
								<p class="post-nav-prev">
						
								<a title="<?php printf( __( 'Previous post: %s', 'radcliffe' ), get_the_title( $prev_post->ID ) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo get_the_title( $prev_post->ID ); ?></a>
								
								</p>
						
							<?php endif; ?>
							
							<div class="clear"></div>
						
						</div><!-- .post-nav -->
					
					</div><!-- .post-cat-tags -->
					
					<div class="clear"></div>
									
				</div><!-- .post-meta -->
																													
			</div><!-- .post -->
							
			<?php

			comments_template( '', true ); 
			
		endwhile; 

	endif; ?>

	</div><!-- .post -->

</div><!-- .content -->
		
<?php get_footer(); ?>