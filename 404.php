<?php get_header(); ?>

<main class="content" id="site-content">

	<article class="section post">
		                
		<div class="post-header section">
		
			<div class="post-header-inner section-inner">
																								
				<h2 class="post-title"><?php _e( 'Error 404', 'radcliffe' ); ?></h2>
			
			</div><!-- .post-header-inner section-inner -->
													
		</div><!-- .post-header section -->
	                                                	            
        <div class="post-content entry-content section-inner thin">
        	            
            <p><?php _e( "It seems like you have tried to open a page that doesn't exist. It could have been deleted, moved, or it never existed at all. You are welcome to search for what you are looking for with the form below.", 'radcliffe' ); ?></p>

			<?php get_search_form(); ?>
            
        </div><!-- .post-content -->
        	            	                        	
	</article><!-- .post -->
	
</main><!-- .content -->

<?php get_footer(); ?>
