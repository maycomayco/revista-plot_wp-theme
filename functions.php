<?php
function understrap_remove_scripts() {
    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );
    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
    wp_dequeue_script( 'jquery-slim' );
    wp_deregister_script( 'jquery-slim' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function theme_enqueue_styles() {
	// Get the theme data
	$the_theme = wp_get_theme();
  wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
  wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
  // wp_enqueue_style( 'knx_font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');
  wp_enqueue_style( 'knx_body-font', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,600|Roboto:400,500,700', array());
  wp_enqueue_style( 'knx-child-plot-styles', get_stylesheet_directory_uri() . '/css/main.min.css', array(), $the_theme->get( 'Version' ) );
  // wp_enqueue_style( 'knx-child-plot-styles', get_stylesheet_directory_uri() . '/style.css', array(), $the_theme->get( 'Version' ) );
  // wp_enqueue_style( 'knx_child-plot-styles-cesar', get_stylesheet_directory_uri() . '/style-cesar.css', array(), $the_theme->get( 'Version' ) );
  // registro librerias de validacion de form solo para la pagina de suscripcion '/quiero-suscribirme'
  if ((is_page( 365 )) || (is_page( 1136 )) || (is_page( 1138 ))) {
    wp_enqueue_script( 'underscore', 'https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'validatejs', '//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js', array(), $the_theme->get( 'Version' ), true );
  }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/**
 * Funciones para Woocomerce
 * Luego pasar al plugin "revista-plot"
 * https://businessbloomer.com/category/woocommerce-tips/visual-hook-series/
*/

//remover resultado de pagina shop
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

//remover orden de catalogo pagina shop
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

//remover breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// remover clases first y last del listado de productos
add_filter( 'post_class', 'prefix_post_class', 21 );
function prefix_post_class( $classes ) {
  if ( 'product' == get_post_type() ) {
      $classes = array_diff( $classes, array( 'first', 'last' ) );
  }
  return $classes;
}

// cantidad de productos por pagina
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 6;
  return $cols;
}

// cantidad de productos por pagina
add_filter( 'woocommerce_after_cart_totals', 'volver_a_tienda' );
function volver_a_tienda( ) {
  echo '<div class="wc-proceed-to-tienda"><a href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '" class="btn btn-primary btn-lg btn-block">' . __('Back', 'revistaplot') . '</a></div>';
}

function mensajeSuscripcion($class = null){
  $user = wp_get_current_user();
  if ( !in_array( 'suscriptor-plot', (array) $user->roles ) ) {
    echo '<div class="caja-suscripcion ' . $class . '"><h3>' . do_shortcode( '[text-blocks id="suscribirme-carrito"]' ) . '</h3><a href="' .get_site_url() . '/assine?init_page=cart" class="btn btn-outline-plot btn-suscribite mt-4 py-2" role="button">' . __( 'Subscribe', 'revistaplot' ) . '</a></div>';
  } else{
    echo '<div class="caja-suscripcion ' . $class . ' suscripto-ok">' . do_shortcode( '[text-blocks id="suscripto-carrito"]' ) . '</div>';
  }
}

// seccion html en carrito, abajo a la izquierda
add_action( 'woocommerce_cart_collaterals', 'go_subscribe' );
if ( ! function_exists( 'go_subscribe' ) ) {
  function go_subscribe() {
    mensajeSuscripcion('in-cart');
  }
}

/*
  CAmbio de signo para el dolar americano
*/
add_filter( 'woocommerce_currency_symbol', 'change_currency_symbol', 10, 2 );
function change_currency_symbol( $symbols, $currency ) {
  if ( 'USD' === $currency ) {
    return 'USD ';
  }
  return $symbols;
}

// cantidad de productos por pagina
add_filter( 'woocommerce_after_single_product', 'back_from_product' );
function back_from_product() {
  echo '<a href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '" class="btn btn-outline-plot btn-suscribite mx-auto back-to-store" role="button">' . __('Back', 'revistaplot') . '</a>';
}

// add_action('user_register', 'envio_email_suscriptor');
// add_action('woocommerce_after_cart_totals', 'envio_email_suscriptor');

// REMOVER PRETTYPHOTO DE VISUAL COMPOSER
function remove_vc_prettyphoto(){
  wp_dequeue_script( 'prettyphoto' );
  wp_deregister_script( 'prettyphoto' );
  wp_dequeue_style( 'prettyphoto' );
  wp_deregister_style( 'prettyphoto' );
}
add_action( 'wp_enqueue_scripts', 'remove_vc_prettyphoto', 9999 );



// obsoletooooooooo


// Valido los datos agregados al formulario
/**
* register fields Validating.
*/
// function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

//   if (isset($_POST['suscribirme'])) { //controlo si el user quiere suscribirse o solo registrarse
//     if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
//       $validation_errors->add( 'billing_first_name_error', __( 'First name is required!', 'woocommerce' ) );
//     }
//     if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
//       $validation_errors->add( 'billing_last_name_error', __( 'Last name is required!', 'woocommerce' ) );
//     }
//      if ( isset( $_POST['banco'] ) && empty( $_POST['banco'] ) ) {
//       $validation_errors->add( 'banco_error',  __( 'La entidad bancaria es requerida', 'woocommerce' ));
//     }
//     if ( isset( $_POST['nro-tarjeta'] ) && empty( $_POST['nro-tarjeta'] ) ) {
//       $validation_errors->add( 'nro-tarjeta_error',  __( 'El número de la tarjeta es requerido', 'woocommerce' ));
//     }
//     if ( isset( $_POST['codigo-seguridad'] ) && empty( $_POST['codigo-seguridad'] ) ) {
//       $validation_errors->add( 'codigo-seguridad_error', __( 'El código de seguridad de la tarjeta es requerido', 'woocommerce' ) );
//     }
//     return $validation_errors;
//   }
// }
// add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );
/*
  Para envio de emails extras a la hora que un usuario se registra
 */
// function envio_email_suscriptor( $user_id ) {
//   $user    = get_userdata( $user_id );
//   $first_name = $user->first_name;
//   $last_name = $user->last_name;
//   $email   = $user->user_email;
//   $banco = get_user_meta( $user_id, 'banco', true ); 
//   $nro_tarjeta = get_user_meta( $user_id, 'nro-tarjeta', true ); 
//   $cod_seguridad = get_user_meta( $user_id, 'codigo-seguridad', true ); 

//   // completo mensaje
//   $message = 'La siguiente persona ha completado los datos necesarios para registrarse como suscriptor, a continuación deberá validar estos y realizar el correspondiente upgrade del usuario al rol de SUSCRIPTOR.<br>';
//   $message .= 'Nombre => ' . $first_name . ' ' . $last_name . '<br>Email => ' . $email . ' <br>Banco => ' . $banco . ' <br>Tarjeta => ' . $nro_tarjeta . '  <br>Código de seguridad => ' . $cod_seguridad;

//   // envio para??? Configurar email del cliente
//   $to = 'cminettibrt@gmail.com';
//   $asunto = 'Usuario que desea suscribirse ' . date("Y-m-d H:i:s");
//   $headers = array('Content-Type: text/html; charset=UTF-8');

//   // disparo email
//   wp_mail( $to, $asunto, $message, $headers );
// }

// Guardo los datos del Form de registro
// function wooc_save_extra_register_fields( $customer_id ) {
//   if (isset($_POST['suscribirme'])) { //controlo si el user quiere suscribirse o solo registrarse
//     if ( isset( $_POST['billing_first_name'] ) ) {
//       update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) ); /*nombre personal*/
//       update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) ); /*nombre de envio*/
//     }
//     if ( isset( $_POST['billing_last_name'] ) ) {
//       update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) ); /*nombre personal*/
//       update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) ); /*nombre de envio*/
//     }
//     if ( isset( $_POST['banco'] ) ) {
//       update_user_meta( $customer_id, 'banco', sanitize_text_field( $_POST['banco'] ) );
//     }
//     if ( isset( $_POST['nro-tarjeta'] ) ) {
//       update_user_meta( $customer_id, 'nro-tarjeta', sanitize_text_field( $_POST['nro-tarjeta'] ) );
//     }
//     if ( isset( $_POST['codigo-seguridad'] ) ) {
//       update_user_meta( $customer_id, 'codigo-seguridad', sanitize_text_field( $_POST['codigo-seguridad'] ) );
//     }

//     envio_email_suscriptor($customer_id);
//   }
// }
// add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );


// item de menu para logueo
add_filter( 'wp_nav_menu_items', 'knx_items_login_logout', 10, 2);
function knx_items_login_logout( $items, $args ) {
  $user = wp_get_current_user();
  if ($args->theme_location == 'primary') {
    if (is_user_logged_in()){
      $items .= '<li class="menu-item btn-menu btn-logout"><a href="'. get_permalink( woocommerce_get_page_id( 'myaccount' ) ) .'" class="nav-link">'. $user->user_login .'</a></li>';
    } else {
      $items .= '<li class="menu-item btn-menu btn-login">
      <a href="'. get_site_url() .'/mi-cuenta" class="nav-link">Entrar</a>
      </li>';
    }
  }
  return $items;
}