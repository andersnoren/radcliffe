<?php if ( have_comments() ) : ?>

	<a name="comments"></a>

	<div class="comments section bg-grey">
		
		<div class="comments-inner section-inner thin">
		
			<div class="comments-title-container">
			
				<h2 class="comments-title">
					<?php 
					$comment_count = count( $wp_query->comments_by_type['comment'] );
					printf( _n( '%s Comment', '%s Comments', $comment_count, 'radcliffe' ), $comment_count ); 
					?>
				</h2>
				
				<h3 class="add-comment-title"><a href="#respond"><?php _e( 'Add yours', 'radcliffe' ); ?> &rarr;</a></h3>

			</div><!-- .comments-title-container -->
	
			<ol class="commentlist">
				<?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'radcliffe_comment' ) ); ?>
			</ol>
			
			<?php 
			if ( ! empty( $comments_by_type['pings'] ) ) : 
				?>
			
				<div class="pingbacks">
					<div class="pingbacks-inner">

						<h3 class="pingbacks-title">
							<?php 
							$pingback_count = count( $wp_query->comments_by_type['pings'] );
							printf( _n( '%s Pingback', '%s Pingbacks', $pingback_count, 'radcliffe' ), $pingback_count );
							?>
						</h3>
					
						<ol class="pingbacklist">
							<?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'radcliffe_comment' ) ); ?>
						</ol>
						
					</div><!-- .pingbacks-inner -->
				</div><!-- .pingbacks -->
			
				<?php 
			endif; 
			
			$previous_comments_link = get_previous_comments_link( '&laquo; ' . __( 'Older Comments', 'radcliffe' ) );
			$next_comments_link 	= get_next_comments_link( __( 'Newer Comments', 'radcliffe' ) . ' &raquo;' );
			
			if ( $previous_comments_link || $next_comments_link ) : ?>
			
				<div class="comments-nav-below">
					<?php echo $previous_comments_link . $next_comments_link; ?>
				</div><!-- .comment-nav-below -->
				
			<?php endif; ?>
		
		</div><!-- .comments-inner -->
		
	</div><!-- .comments -->
	
<?php endif; ?>

<div class="respond section bg-grey" name="respond">
	<div class="section-inner thin">
		<?php comment_form(); ?>
	</div><!-- .section-inner -->
</div><!-- .respond -->