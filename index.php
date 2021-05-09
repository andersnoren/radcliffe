<?php get_header(); ?>

<main class="content" id="site-content">

	<?php 

	$archive_title 			= get_the_archive_title();
	$archive_description 	= get_the_archive_description();
	
	if ( $archive_title || $archive_description ) : ?>

		<header class="archive-header section light-padding">
	
			<div class="section-inner">

				<?php if ( $archive_title ) : ?>
					<h1 class="archive-title"><?php echo $archive_title; ?></h1>
				<?php endif; ?>
				
				<?php if ( $archive_description ) : ?>
					<div class="archive-description">
						<?php echo wpautop( $archive_description ); ?>
					</div><!-- .archive-description -->
				<?php endif; ?>
			
			</div><!-- .section-inner -->
			
		</header><!-- .archive-header -->
		
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
	
		<div class="posts">
	
			<?php 

			while ( have_posts() ) : 
				the_post(); 
				get_template_part( 'content', get_post_format() );
			endwhile;

			the_posts_navigation( array( 'class' => 'archive-nav' ) );

			?>

		</div><!-- .posts -->

	<?php elseif ( is_search() ) : ?>

		<section class="light-padding">

			<div class="no-search-results section-inner contain-margins">

				<?php get_search_form(); ?>

			</div><!-- .no-search-results -->

		</section>

	<?php endif; ?>
		
</main><!-- .content -->
	              	        
<?php get_footer(); ?>