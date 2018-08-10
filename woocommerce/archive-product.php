<?php
/**
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

  <header class="woocommerce-products-header text-center w-100 pt-3 pb-1">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
		<div class="subtitleline"></div>
  </header>

  </div> <!-- cierro el row proveniente del header.php que envuelve a header del titulo WOO -->

  <div class="row opciones-shop">
			<div class="col-md-12 ml-auto">
	  		<div class="row">
		  		<div class="col-md-6">
			  		<form role="search" method="get" class="woocommerce-product-search form-inline form-tienda" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			  			<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
			  			<input type="search" class="search-field w-100" placeholder="<?php echo _e( 'Search for:', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
			  			<!-- <input type="submit" value="<?php //echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" /> -->
			  			<input type="hidden" name="post_type" value="product" />
			  		</form>
		  		</div>
					<div class="col-md-3">
						<a href="<?php echo get_site_url(); ?>/assine" class="btn btn-outline-plot btn-suscribite w-100 btn-tienda-suscribirme" role="button"><?php _e( 'Subscribe', 'revistaplot' ); ?></a>
					</div>
					<div class="col-md-3 btn-tienda-carrito">
						<a href="<?php get_home_url() ?>/carrito" class="btn btn-outline-plot btn-suscribite w-100" role="button"><?php _e( 'View cart', 'revistaplot' ); ?></a>
					</div>
				</div>
			</div>
  </div>

  <div class="row"> <!-- abro row que se va a cerrar mas debajo y envuelve la lista de productos -->

	<div class="lista-de-productos">
		<?php if ( have_posts() ) : ?>
			
			<?php
				$i = 1;
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>
					<?php if ($i == 1): ?>
						<?php mensajeSuscripcion(); ?>
					<?php endif; ?>

					<?php 
						wc_get_template_part( 'content', 'product' ); 
						$i++;
					?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>
		<?php endif; ?>
	</div>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
