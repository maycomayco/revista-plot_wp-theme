<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ($product->is_in_stock()) {
	$stock = 'Stock';
} else {
	$stock = 'N/A';
}

?>

<div class="product_meta pb-2">
	<span class="stock"><?php _e('Available:', 'revistaplot'); echo ' ' . $stock; ?></span>
</div>

<p class="price"><?php echo $product->get_price_html(); ?>	</p>
<div class="price-subtitleline"></div>