<?php
// habilito WP Core
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

// obtengo parametros del form
$email       = trim($_POST['email']);
$password    = trim($_POST['password']);
// datos de tarjeta
// $first_name  = trim($_POST['first_name']); // deprecated
// $last_name   = trim($_POST['last_name']);  // deprecated
$fullname    = trim($_POST['fullname']);
$banco       = trim($_POST['banco']);
$nro_tarjeta = trim($_POST['nro_tarjeta']);
$nro_cod     = trim($_POST['nro_cod']);
$nro_venc    = trim($_POST['nro_venc']);
$init_page   = trim($_POST['init_page']);
// datos para el envio
$direccion   = trim($_POST['direccion']);
$localidad   = trim($_POST['localidad']);
$cod_postal  = trim($_POST['cod_postal']);
$provincia   = trim($_POST['provincia']);
$telefono    = trim($_POST['telefono']);

$user = wp_create_user( $email, $password, $email);
if( !is_wp_error($user) ) {
  $user = wp_update_user( array( 'ID' => $user, 'first_name' => $fullname, 'role' => 'suscriptor-plot' ) );
  if ( is_wp_error( $user ) ) {
    // echo "error en la creacion";
    $msg = 'Um erro ocorreu. Entre em contato com o administrador. [COD 02]';
    Header("Location:" . home_url() . "/assine?error=1&error_msg=" . $msg);
  } else {
    // Success!
    // envio de email al usuario que se registro como suscriptor
    $to = $email;
    $subject = 'Nova conta de assinante em Revista Plot';
    $body = 'Parabéns! Você se registrou como assinante.<br><br>Seus dados de acesso são:<br>' . $email . '<br>' . $password;
    $headers = array('Content-Type: text/html; charset=UTF-8;');
    wp_mail( $to, $subject, $body, $headers );

    // envio de email al administrador con los datos sobre la suscripcion
    // $to = $email;
    // $to = 'mbarale@kinexo.com'; //revisar porque no envia email a @kinexo.com
    $to = 'comercial@ppyt.net'; //revisar porque no envia email a @kinexo.com
    // $subject = '[' . $first_name . ' ' . $last_name . '] Nuevo usuario suscriptor en Revista Plot';  // deprecated
    $subject = '[' . $fullname . '] Nuevo usuario suscriptor en Revista Plot';
    $body = 'Un nuevo usuario se ha registrado como suscriptor en el sitio.<br>';
    $body .= '<br>Sus datos son:<br>';
    $body .= '<b>Nombre:</b> ' . $fullname . '<br>';
    $body .= '<b>Email:</b> ' . $email . '<br>';
    $body .= '<b>Entidad bancaria:</b> ' . $banco . '<br>';
    $body .= '<b>N° de Tarjeta:</b> ' . $nro_tarjeta . '<br>';
    $body .= '<b>Código de seguridad:</b> ' . $nro_cod . '<br>';
    $body .= '<b>Vencimiento:</b> ' . $nro_venc . '<br>';
    $body .= '<b>-------------------</b><br>';
    $body .= '<b>DATOS PARA EL ENVIO</b><br>';
    $body .= '<b>-------------------</b><br>';
    $body .= '<b>Dirección:</b> ' . $direccion . '<br>';
    $body .= '<b>Localidad:</b> ' . $localidad . '<br>';
    $body .= '<b>Código Postal:</b> ' . $cod_postal . '<br>';
    $body .= '<b>Provincia:</b> ' . $provincia . '<br>';
    $body .= '<b>Teléfono:</b> ' . $telefono . '<br>';
    // echo $body;
    // die();
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );    

    // loguear usuario manualmente
    $creds = array(
      'user_login'    => $email,
      'user_password' => $password,
      'remember'      => false
    );
     
    $user = wp_signon( $creds, false );
     
    if ( !is_wp_error( $user ) ) {
      // echo $user->get_error_message();
      // volver al lugar que corresponda
      if ($init_page == 'cart') {
        $to = '/carrito';
      } else { //cualquier otro caso se vuelve a la tienda
        $to = '/loja';
      }
      Header("Location:" . home_url() . $to . '?user_role=suscriptor-plot');
    }
  } 
} else {
  // mensaje de error que correo existe
  $msg = 'O email já está registrado. [COD 01]';
  Header("Location:" . home_url() . "/assine?error=1&error_msg=" . $msg);
}
