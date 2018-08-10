<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php //get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>
	    <div class="col-md-12 content-area" id="primary">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header pb-5">
						
							<h1 class="page-title text-center"><?php printf(
							/* translators:*/
							 esc_html__( 'Search Results for: %s', 'revistaplot' ),
								'<span>' . get_search_query() . '</span>' ); ?></h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?> 

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php //understrap_pagination(); ?>

		</div><!-- #primary -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
