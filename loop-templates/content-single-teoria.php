<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div id="header-teoria">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			<!-- <div class="sep-title-teoria"></div> -->
			<p class="entry-excerpt text-center">
				<?php the_field('bajada_opcional'); ?> 
				<br>
				<?php if ( function_exists( 'coauthors_posts_links' ) ) : ?>
					<?php coauthors_posts_links(', ',' y ', 'Por: '); ?>
				<?php else : ?>
					<?php the_author_posts_link(); ?>
				<?php endif; ?>
				<br />
			</p>
		</header><!-- .entry-header -->
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php //understrap_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->