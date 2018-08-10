<?php
// habilito WP Core
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// obtengo parametros del form
$email = trim($_POST['email']);
// $password = trim($_POST['password']);
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$banco = trim($_POST['banco']);
$nro_tarjeta = trim($_POST['nro_tarjeta']);
$nro_cod = trim($_POST['nro_cod']);
$init_page = trim($_POST['init_page']);

// $user = wp_create_user( $email, $password, $email);
//obtengo el objeto user con el que debo interactuar
$user = get_user_by( 'email', $email );

if( !is_wp_error($user) ) :
  $user = wp_update_user( array( 'ID' => $user->ID, 'first_name' => $first_name, 'last_name' => $last_name, 'role' => 'suscriptor-plot' ) );

  if ( is_wp_error( $user ) ) :
    // existio un error en la actualizacion del rol de usuario;
    $msg = 'Um erro ocorreu. Entre em contato com o administrador. [COD 02]';
    Header("Location:" . home_url() . "/assine?error=1&error_msg=" . $msg);
  else :
    // Success!
    // envio de email al usuario que se registro como suscriptor
    $to = $email;
    $subject = 'Conta atualizada, você é agora um assinante em Revista Plot';
    $body = '<br>Parabéns! Sua conta <b>foi atualizado como assinante</b> propriamente.';
    $headers = array('Content-Type: text/html; charset=UTF-8;');
    wp_mail( $to, $subject, $body, $headers );

    // envio de email al administrador con los datos sobre la suscripcion
    // $to = 'maycobarale@gmail.com'; //revisar porque no envia email a @kinexo.com
    $to = 'comercial@ppyt.net'; //revisar porque no envia email a @kinexo.com
    $subject = '[' . $email . '] Actualización de usuario a suscriptor en Revista Plot';
    $body = 'Un usuario existente a solicitado la suscripción en el sitio.<br>';
    $body .= '<br>Sus datos son:<br>';
    $body .= '<b>Nombre:</b> ' . $first_name . ' ' . $last_name . '<br>';
    $body .= '<b>Email:</b> ' . $email . '<br>';
    $body .= '<b>Entidad bancaria:</b> ' . $banco . '<br>';
    $body .= '<b>N° de Tarjeta:</b> ' . $nro_tarjeta . '<br>';
    $body .= '<b>Código de seguridad:</b> ' . $nro_cod . '<br>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );    

    // Success, redirigir al usuario donde corresponda
    if ($init_page == 'cart') {
      $to = '/carrito';
    } else { //cualquier otro caso se vuelve a la tienda
      $to = '/loja';
    }
    Header("Location:" . home_url() . $to . '?user_role=suscriptor-plot'); 
  endif; 
else :
  // Ocurrio un error en la obtencion del usuario por get_user_by( 'email', $email )
  $msg = 'O email já está registrado. [COD 01]';
  Header("Location:" . home_url() . "/assine?error=1&error_msg=" . $msg);
endif;
