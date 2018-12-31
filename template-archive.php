<?php
/*
Template Name: Archive Template
*/
?>

<?php get_header(); ?>

<div class="content">						

	<div <?php post_class( 'post single' ); ?>>
	
		<?php if ( have_posts() ) : 
			
			while ( have_posts() ) : the_post(); ?>
	
				<div class="post-header section">
		
					<div class="post-header-inner section-inner">
							
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
					
					</div><!-- .post-header-inner section-inner -->
															
				</div><!-- .post-header section -->

				<div class="post-content section-inner thin">
																					
					<?php the_content(); ?>
					
					<div class="clear"></div>
										
				</div>
										
				<div class="archive-container section-inner thin">
													
					<ul>
						<?php 
						
						$posts_archive = get_posts( array(
							'post_status'		=> 'publish',
							'posts_per_page'	=> -1,
						) );

						foreach ( $posts_archive as $archive_post ) : ?>
							<li>
								<a href="<?php echo get_the_permalink( $archive_post->ID ); ?>" title="<?php the_title_attribute( array( 'post' => $archive_post->ID ) ); ?>">
									<?php echo get_the_title( $archive_post->ID );?> 
									<span><?php echo get_the_time( get_option( 'date_format' ), $archive_post->ID ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
			
				</div><!-- .archive-container -->
													
				<?php comments_template( '', true );
			
			endwhile; 
	
		endif; ?>

	</div><!-- .post -->

	<div class="clear"></div>
	
</div><!-- .content -->
								
<?php get_footer(); ?>