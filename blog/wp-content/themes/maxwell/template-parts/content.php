<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package Maxwell
 */
?>
	
	<div class="post-column clearfix">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
			
			<header class="entry-header">

				<?php maxwell_entry_meta(); ?>
				
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			</header><!-- .entry-header -->

			<div class="entry-content entry-excerpt clearfix">
				<?php the_excerpt(); ?>
				<?php maxwell_more_link(); ?>
			</div><!-- .entry-content -->
		
		</article>
		
	</div>