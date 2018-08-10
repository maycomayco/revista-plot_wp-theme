<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
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
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

	<!-- <div class="row"> -->
	  <header class="woocommerce-products-header text-center w-100 pt-3 pb-1">
			<h1 class="woocommerce-products-header__title page-title">Tienda</h1>
			<div class="subtitleline"></div>
	  </header>
  <!-- </div> -->

  <div class="col-lg-12 pb-5 opciones-shop">
		<div class="col-md-7 ml-auto">
  		<div class="row">
	  		<div class="col-lg-7">
		  		<form role="search" method="get" class="woocommerce-product-search form-inline form-tienda" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
		  			<label class="screen-reader-text" for="s"><?php echo _e( 'Search for:', 'woocommerce' );?></label>
		  			<input type="search" class="search-field w-100" placeholder="<?php echo _e( 'Search for:', 'woocommerce' );?>" value="" name="s" title="<?php echo _e( 'Search for:', 'woocommerce' );?>">
		  			<!-- <input type="submit" value="" /> -->
		  			<input type="hidden" name="post_type" value="product">
		  		</form>
	  		</div>
				<div class="col-lg-5">
						<a href="<?php echo get_site_url(); ?>/assine" class="btn btn-outline-plot btn-suscribite w-100" role="button"><?php echo _e( 'Subscribe', 'revistaplot' );?></a>
				</div>
			</div>
		</div>
  </div>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

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

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
