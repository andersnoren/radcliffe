<?php get_header(); ?>

<main class="content">
																	                    
	<?php if ( have_posts() ) : ?>

		<?php 

		$archive_title 			= get_the_archive_title();
		$archive_description 	= get_the_archive_description();
		$paged 					= get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		
		if ( ( is_search() || is_archive() ) && ( $archive_title || $archive_description ) ) : ?>

			<header class="archive-header section light-padding">
		
				<div class="section-inner">

					<?php if ( $archive_title ) : ?>

						<h1 class="archive-title">

							<?php echo $archive_title; ?>

							<?php if ( 1 < $wp_query->max_num_pages ) : ?>
								<span><?php printf( __( '(page %1$s of %2$s)', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></span>
							<?php endif; ?>
						</h1>

					<?php endif; ?>
					
					<?php if ( $archive_description ) : ?>
						<div class="archive-description">
							<?php echo wpautop( $archive_description ); ?>
						</div><!-- .archive-description -->
					<?php endif; ?>
				
				</div><!-- .section-inner -->
				
			</header><!-- .archive-header -->
			
		<?php endif; ?>
	
		<div class="posts">
	
			<?php 
			if ( ! is_search() && ! is_archive() && $paged > 1 && $wp_query->max_num_pages > 1 ) : 
				?>
			
				<header class="archive-header section small-padding">

					<div class="section-inner">
				
						<h1 class="archive-title"><?php printf( __( 'Page %1$s of %2$s', 'radcliffe' ), $paged, $wp_query->max_num_pages ); ?></h4>

					</div><!-- .section-inner -->
					
				</header>
							
				<?php 
			endif;
			
			while ( have_posts() ) : 
				the_post(); 
			
				get_template_part( 'content', get_post_format() );
				
			endwhile;

			$next_posts_link 		= get_next_posts_link( '&laquo; ' . __( 'Older posts', 'radcliffe' ) );
			$previous_posts_link 	= get_previous_posts_link( __( 'Newer posts', 'radcliffe') . ' &raquo;' );
			
			if ( $next_posts_link || $previous_posts_link ) : ?>
			
				<div class="archive-nav">
				
					<?php echo $next_posts_link; ?>
						
					<?php echo $previous_posts_link; ?>
					
					<div class="clear"></div>
					
				</div><!-- .archive-nav -->
								
			<?php endif; ?>

		</div><!-- .posts -->

	<?php endif; ?>
		
</main><!-- .content -->
	              	        
<?php get_footer(); ?>