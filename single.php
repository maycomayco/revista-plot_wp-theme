<?php
/**
 * El cliente indico que no se utilizara una sidebar, y si utilizara post relacionados debajo de la publicacion
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>
<div class="wrapper" id="single-wrapper">
	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<!-- Do the left sidebar check -->
			<?php //get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>
			<!-- se hizo esto para que el front-page.php quede igual maquetado al single.php -->
	    <div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php //if (esRevista($post->ID) || esPractica($post->ID)) : ?>
							<?php get_template_part( 'loop-templates/content', 'single' ); ?>
						<?php //else: ?>
							<?php //if (esTeoria($post->ID)) : ?>
								<?php //get_template_part( 'loop-templates/content', 'single-teoria' ); ?>
							<?php //endif; ?>
						<?php //endif; ?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
		<!-- Do the right sidebar check -->
		<?php //if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>
			<?php //get_sidebar( 'right' ); ?>
		<?php //endif; ?>
	</div><!-- .row -->
</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>