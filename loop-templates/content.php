<?php
/**
 * Template usado en el archivo frontpage.php
 *
 * @package understrap
 */
?>
<div class="knx_wrapper-article">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php echo get_permalink( get_the_ID() ); ?>">
			<div class="nota">
				<?php echo get_the_post_thumbnail( $post->ID ); ?>
				<footer class="entry-footer">
					<?php //understrap_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</a> <!-- .nota -->
		<div class="caption">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>' ); ?>
				<?php //if ( 'post' == get_post_type() ) : ?>
				<!-- <div class="entry-meta"> -->
					<?php //understrap_posted_on(); ?>
					<!-- </div> -->
					<!-- .entry-meta -->
					<?php //endif; ?>
			</header><!-- .entry-header -->
			<div class="entry-content plot_entry-content">
				<p><?php	the_excerpt();?></p>
			</div><!-- .entry-content -->
			<div class="entry-categories">
				<?php	the_category();?>
			</div><!-- .category-name -->
		</div><!-- .caption -->
	</article>
</div><!-- #post-## -->