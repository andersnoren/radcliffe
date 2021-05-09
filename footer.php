<?php if ( is_active_sidebar( 'footer-a' ) || is_active_sidebar( 'footer-b') || is_active_sidebar( 'footer-c' ) ) : ?>

	<footer class="footer section medium-padding bg-graphite" id="site-footer">
			
		<div class="section-inner row group">

			<?php 

			$widget_area_i = 0;
		
			foreach ( array( 'footer-a', 'footer-b', 'footer-c' ) as $widget_area ) : 
				if ( ! is_active_sidebar( $widget_area ) ) continue;
				$widget_area_i++;
				?>

				<div class="column column-<?php echo $widget_area_i; ?> one-third">
					<div class="widgets">
						<?php dynamic_sidebar( $widget_area ); ?>
					</div>
				</div><!-- .column -->

				<?php 
			endforeach;
			?>
		
		</div><!-- .footer-inner -->
	
	</footer><!-- #site-footer -->

<?php endif; ?>

<div class="credits section light-padding">

	<div class="credits-inner section-inner group">
	
		<p class="fleft">
			&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>
		</p>
		
		<p class="fright">
			<span><?php _e( 'Theme by', 'radcliffe' ); ?> <a href="https://andersnoren.se">Anders Nor&eacute;n</a> &mdash; </span><a href="#" class="tothetop"><?php _e( 'Up', 'radcliffe' ); ?> &uarr;</a>
		</p>
		
	</div><!-- .credits-inner -->

</div><!-- .credits -->

<?php wp_footer(); ?>

</body>
</html>