<?php

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>
<div class="wrapper" id="arquitecto-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
	    <div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content-arquitecto', 'single' ); ?>
					<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>