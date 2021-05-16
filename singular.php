<?php get_header(); ?>

<main class="content" id="site-content">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'section post' ); ?>>

				<?php if ( has_post_thumbnail() ) : ?>

					<figure class="featured-media" style="background-image: url( <?php the_post_thumbnail_url(); ?> );">

						<?php

						the_post_thumbnail();

						$image_caption = get_the_post_thumbnail_caption();

						if ( $image_caption ) :
							?>

							<figcaption class="media-caption-container">
								<p class="media-caption"><?php echo $image_caption; ?></p>
							</figcaption>

						<?php endif; ?>

					</figure><!-- .featured-media -->

				<?php endif; ?>

				<div class="post-header section">

					<div class="post-header-inner section-inner medium">

						<?php if ( is_single() || is_attachment() ) : ?>

							<div class="post-meta-top">

								<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

								<?php if ( comments_open() ) : ?>
									<span class="sep">/</span>
									<?php comments_popup_link( __( '0 comments', 'radcliffe' ), __( '1 comment', 'radcliffe' ), __( '% comments', 'radcliffe' ), 'post-comments' ); ?>
								<?php endif; ?>

								<?php if ( is_attachment() ) :
									$image_array = wp_get_attachment_image_src( $post->ID, 'full', false );
									if ( $image_array ) :
										?>

										<span class="sep">/</span>
										<?php echo $image_array['1'] . '<span style="text-transform: lowercase;">x</span>' . $image_array['2'] . ' px'; ?>

									<?php endif; ?>
								<?php endif; ?>

								<?php edit_post_link( __( 'Edit', 'radcliffe' ), '<span class="sep">/</span> ' ); ?>

							</div>

						<?php endif; ?>

						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

					</div><!-- .post-header-inner section-inner -->

				</div><!-- .post-header section -->

				<div class="post-content entry-content section-inner thin">

					<?php
					the_content();
					wp_link_pages( 'before=<p class="page-links">' . __( 'Pages:', 'radcliffe' ) . ' &after=</p>&separator=<span class="sep">/</span>' );
					?>

				</div><!-- .post-content -->

				<?php do_action( 'radcliffe_singular_after_entry_content' ); ?>

				<?php if ( is_single() ) : ?>

					<div class="post-meta section-inner thin">

						<div class="meta-block post-author">

							<h2 class="meta-title"><?php _e( 'About the author', 'radcliffe' ); ?></h2>

							<div class="post-author-container group">

								<?php echo get_avatar( get_the_author_meta( 'email' ), '160' ); ?>

								<div class="post-author-inner">

									<h3><?php the_author_posts_link(); ?></h3>

									<?php

									$author_description = get_the_author_meta( 'description' );
									$author_url			= get_the_author_meta( 'user_url' );

									if ( $author_description ) : ?>

										<div class="author-description"><?php echo wpautop( $author_description ); ?></div>

									<?php endif; ?>

									<div class="author-links">

										<a class="author-link-posts" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php _e( 'Author archive', 'radcliffe' ); ?></a>

										<?php if ( $author_url ) : ?>
											<a class="author-link-website" href="<?php echo esc_url( $author_url ); ?>"><?php _e( 'Author website', 'radcliffe' ); ?></a>
										<?php endif; ?>

									</div><!-- .author-links -->

								</div>

							</div>

						</div><!-- .post-author -->

						<div class="meta-block post-cat-tags">

							<h2 class="meta-title"><?php _e( 'About the post', 'radcliffe' ); ?></h2>

							<p class="post-categories"><?php the_category( ', ' ); ?></p>

							<?php
							if ( has_tag() ) :
								?>
								<p class="post-tags"><?php the_tags( '', ', ' ); ?></p>
								<?php
							endif;

							the_post_navigation( array( 'class' => 'post-nav' ) );

							?>

						</div><!-- .post-cat-tags -->

					</div><!-- .post-meta -->

				<?php endif; ?>

			</article><!-- .post -->

			<?php

			// Output comments if comments are open or if there are comments, and check for password
			if ( ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
				comments_template( '', true );
			}

		endwhile;
	endif;
	?>

</main><!-- .content -->

<?php get_footer(); ?>