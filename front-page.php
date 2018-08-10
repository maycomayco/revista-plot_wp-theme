<?php
/**
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
<?php endif; ?>

<div class="wrapper" id="wrapper-index">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<!-- Do the left sidebar check and opens the primary div -->
			<?php //get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>
			<?php $i = 0; //declaro variable de control ?>
	    <div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main">
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
							<?php $i++;
							if ($i==2) {
								// trae la ultima edicion publicada
								ultima_revista();
							}
							if ($i==3) {
								echo do_shortcode( '[banner id="199"]' ); //banner ancho
							}
							if ($i==5) {
								echo do_shortcode( '[knx_cb_4-col]' ); //banners 4 columnas, cuadrados
							} ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
				</main><!-- #main -->
				<?php
				if (  $wp_query->max_num_pages > 1 ) : ?>
					<div class="misha_loadmore">Mostrar mais...</div>
				<?php endif; ?>
			</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>