<?php
/**
 * Template utilizado para mostrar en el single.php
 *
 * @package understrap
 */
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="nota">
		<div class="caption">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
				<p class="entry-excerpt">
					<?php the_field('bajada_opcional'); ?>
					<?php //the_author(); ?><br />
				</p>
				<!-- .entry-meta -->
			</header><!-- .entry-header -->
			<!-- <div class="image-post"> -->
				<?php //echo get_the_post_thumbnail( $post->ID ); ?>
			<!-- </div> -->
		</div><!-- .caption -->
		<!-- <?php echo get_the_post_thumbnail( $post->ID ); ?> -->
		<div class="entry-content">
			<?php the_content(); ?>
			<!--
			Share button, pasar a template part si se utiliza
			 -->
			<!-- <div class="share-buttons">
				<h3 class="share-single-post"><?php //_e( 'Share post', 'understrap' ) ?></h3>
				<div class="row">
					<div class="col">
						<button type="button" class="btn btn-primary btn-block">
							<a href="http://www.facebook.com/sharer.php?u=<?php //echo esc_url( get_permalink()); ?>" target="_blank" title="Compartir en Facebook"><i class="fa fa-facebook"></i>BUtton</a>
						</button>
					</div>
					<div class="col">
						<button type="button" class="btn btn-primary btn-block">
							<a href="http://www.facebook.com/sharer.php?u=<?php //echo esc_url( get_permalink()); ?>" target="_blank" title="Compartir en Facebook"><i class="fa fa-twitter"></i>BUtton</a>
						</button>
					</div>
					<div class="col">
						<button type="button" class="btn btn-primary btn-block">
							<a href="http://www.facebook.com/sharer.php?u=<?php //echo esc_url( get_permalink()); ?>" target="_blank" title="Compartir en Facebook"><i class="fa fa-envelope"></i>BUtton</a>
						</button>
					</div>
				</div>
			</div> -->
			<?php
			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			// 	'after'  => '</div>',
			// ) );
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer knx_article-footer py-4">
			<?php footer_article($post->ID); //footer especifico de articulo ?>
		</footer><!-- .entry-footer -->
		<?php posts_relacionados($post->ID); ?>
	</div> <!-- .nota -->
</article><!-- #post-## -->