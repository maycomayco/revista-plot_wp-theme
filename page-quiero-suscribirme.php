<?php
/**
 * Template Name: Quiero suscribirme
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper quiero-suscribirme-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
					<!-- <div class="col-md-12 d-flex justify-content-center tareas-usuario"> -->
					<div class="row">
					<div class="mx-auto col-md-8 tareas-usuario">
					<!-- Show register form -->
					<?php
						// control de variables si venimos desde suscribirnos
						if ( is_user_logged_in() ) :
					    $user = wp_get_current_user();
					    // check user role
					    if ($user->roles[0] == 'suscriptor-plot') :
					    	$show_form = false;
					    	$msg = '<h2>' . $user->user_login . ', usted <strong>ya se encuentra</strong> suscripto.</h2>';
					    elseif ($user->roles[0] == 'administrator') :
					    	$show_form = false;
					    	$msg = '<h2>' . $user->user_login . ', usted es <strong>administrador</strong> del sitio.</h2>';
					    else :
					    	// se debe mostrar el form para actualizacion de datos
					    	$show_form = true;
					    	$user_new = false; //necesito actualizar usuario
						    $user = wp_get_current_user();
						    $email = $user->user_email;
						    $first_name = $user->first_name;
						    $last_name = $user->last_name;
					    endif;
						else :
							// obtengo todos los datos necesarios para el registro
				    	$show_form = true;
				    	$user_new = true; //necesito registrar usuario
         	  endif; 
         	  if ($show_form) :
         	  	if (isset($msg)) :
         	  		echo $msg;
         	  	endif;
         	  	if ($_REQUEST['error'] == 1) : ?>
								<h2 class="text-center"><?php echo $_REQUEST['error_msg']; ?></h2>
							<?php endif; ?>
							<?php if ( !$user_new ) : ?>
								<h2 class="text-center"><b><?php echo $email ?></b> por favor complete sus datos para la suscripción.</h2>
								<div class="line-sub"></div>
							<?php endif; ?>
							<?php if ($user_new) : ?>
						    <form id="subscribe-form" method="post" class="<?php if ($user_new ) : echo "alta-suscripcion"; endif; ?>" action="<?php echo get_stylesheet_directory_uri(); ?>/user_subscribe.php"> 
							<?php else : ?>
						    <form id="subscribe-form" method="post" class="" action="<?php echo get_stylesheet_directory_uri(); ?>/user_upgrade.php"> 
							<?php endif; ?>
	  	           	<div class="form-group"> <!-- email -->
		           	    <label for="email"><?php _e('E-mail', 'woocommerce'); ?></label>
		           	    <input type="email" name="email" class="form-control" id="email" value="<?php if (!$user_new ) : echo $email; endif; ?>">
		           	    <input type="text" name="init_page" class="form-control" id="init_page" value="<?php echo $_REQUEST['init_page']; ?>" hidden>
		           	    <div class="messages"></div>
		           	  </div>
		           	  <div class="form-group"> <!-- password -->
		           	    <label for="password" <?php if ( !$user_new ) : echo "hidden"; endif; ?>><?php _e('Password', 'woocommerce'); ?></label>
		           	    <input type="password" name="password" class="form-control" id="password" value="<?php if ( !$user_new ) : echo $password; endif; ?>" <?php if ( !$user_new ) : echo "hidden"; endif; ?>>
		           	    <div class="messages"></div>
		           	  </div> 
		           	  <div class="row"></div> <!-- hack para espacio -->
		           	  <hr>
  	           	  <div class="form-group">
  	           	    <label for="fullname"><?php _e('Name', 'woocommerce'); ?></label>
  	           	    <input type="text" name="fullname" class="form-control" id="fullname" value="<?php if ( !$user_new ) : echo $first_name . ' ' . $last_name; endif; ?>">
		           	    <div class="messages"></div> <!-- fullname -->
  	           	  </div>
		           	  <div class="form-group"> <!-- banco -->
		           	    <label for="banco"><?php _e('Bank name', 'woocommerce'); ?></label>
		           	    <input type="text" name="banco" class="form-control" id="banco" value="">
		           	    <div class="messages"></div>
		           	  </div>
		           	  <div class="row"> <!-- nro tarjeta y codigo -->
		           	  	<div class="col-md-5">
	    	           	  <div class="form-group">
	    	           	    <label for="nro_tarjeta"><?php _e('Credit card number', 'revistaplot'); ?></label>
	    	           	    <input type="text" name="nro_tarjeta" class="form-control" id="nro_tarjeta" value="">
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  	<div class="col-md-4">
	    	           	  <div class="form-group">
	    	           	    <label for="nro_venc"><?php _e('Expiration date', 'revistaplot'); ?></label>
	    	           	    <input type="text" name="nro_venc" class="form-control" id="nro_venc" value="" placeholder="MMAA">
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  	<div class="col-md-3">
	    	           	  <div class="form-group">
	    	           	    <label for="nro_cod"><?php _e('Security code', 'revistaplot'); ?></label>
	    	           	    <input type="text" name="nro_cod" class="form-control" id="nro_cod" value="">
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  </div>
		           	  <hr>
		           	  <div class="row"> <!-- direccion y localidad -->
		           	  	<div class="col-md-6">
	    	           	  <div class="form-group">
	    	           	    <label for="direccion"><?php _e('Street address', 'woocommerce'); ?></label>
	    	           	    <input type="text" name="direccion" class="form-control" id="direccion" value="">
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  	<div class="col-md-6">
	    	           	  <div class="form-group">
	    	           	    <label for="localidad"><?php _e('Town / City', 'woocommerce'); ?></label>
	    	           	    <input type="text" name="localidad" class="form-control" id="localidad" value="">
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  </div>
		           	  <div class="row"> <!-- cod postal y provincia -->
		           	  	<div class="col-md-6">
	    	           	  <div class="form-group">
	    	           	    <label for="cod_postal"><?php _e('ZIP', 'woocommerce'); ?></label>
	    	           	    <input type="text" name="cod_postal" class="form-control" id="cod_postal" value="">
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  	<div class="col-md-6">
	    	           	  <div class="form-group">
	    	           	    <label for="provincia"><?php _e('State / Zone', 'woocommerce'); ?></label>
	    	           	    <!-- <input type="text" name="provincia" class="form-control" id="provincia" value=""> -->
	    	           	    <select name="provincia" id="provincia" class="form-control">
													<option value="-1">-- Seleccionar --</option>
													<option value="Buenos Aires">Buenos Aires</option>
													<option value="Catamarca">Catamarca</option>
				   	    	        <option value="Chaco">Chaco</option>
				   	    	        <option value="Chubut">Chubut</option>
				   	    	        <option value="Cordoba">Cordoba</option>
				   	    	        <option value="Corrientes">Corrientes</option>
				   	    	        <option value="Entre Rios">Entre Rios</option>
				   	    	        <option value="Formosa">Formosa</option>
				   	    	        <option value="Jujuy">Jujuy</option>
				   	    	        <option value="La Pampa">La Pampa</option>
				   	    	        <option value="La Rioja">La Rioja</option>
				   	    	        <option value="Mendoza">Mendoza</option>
				   	    	        <option value="Misiones">Misiones</option>
				   	    	        <option value="Neuquen">Neuquen</option>
				   	    	        <option value="Rio Negro">Rio Negro</option>
				   	    	        <option value="Salta">Salta</option>
				   	    	        <option value="San Juan">San Juan</option>
				   	    	        <option value="San Luis">San Luis</option>
				   	    	        <option value="Santa Cruz">Santa Cruz</option>
				   	    	        <option value="Santa Fe">Santa Fe</option>
				   	    	        <option value="Sgo. del Estero">Sgo. del Estero</option>
				   	    	        <option value="Tierra del Fuego">Tierra del Fuego</option>
				   	    	        <option value="Tucuman">Tucuman</option>
	    	           	    </select>
				           	    <div class="messages"></div>
	    	           	  </div>
	  	           	  </div>
		           	  </div>
		           	  <div class="form-group"> <!-- banco -->
		           	    <label for="telefono"><?php _e('Phone Number', 'woocommerce'); ?></label>
		           	    <input type="text" name="telefono" class="form-control" id="telefono" value="">
		           	    <div class="messages"></div>
		           	  </div>
		           	  <div class="row"></div> <!-- hack para espacio -->
		           	  <hr>
		           	  <div class="col-md-2 text-center mx-auto">
		           	  <button type="submit" class="btn btn-outline-plot btn-suscribite" id=""><?php _e('Subscribe', 'revistaplot'); ?></button>
		           	  </div>
						    </form>
								<script>
									jQuery( document ).ready(function() {
										(function() {
											// de acuerdo al tipo de operacion se definen los validadores correspondientes
											if ( jQuery('#subscribe-form').hasClass('alta-suscripcion') ) {
						  					// declaramos validadores
						  		      var constraints = {
						  		        email: {
						  		          presence: {
						  		          	message: "^El email no puede ser vacío."
						  		          },
						  		          email: {
						  		          	message: "no posee un formato valido."
						  		          },
						  		        },
						  		        password: {
						  		        	presence: {
						  		        		message: "^Contraseña no puede ser vacía."
						  		        	}
						  		        },
						  		        fullname: {
						  		          presence: {
						  		          	message: "^Nombre no puede ser vacío."
						  		          }
						  		        },
						  		        // last_name: {
						  		        //   presence: {
						  		        //   	message: "^Apellido no puede ser vacío."
						  		        //   }
						  		        // },
						  		        banco: {
						  		          presence: {
						  		          	message: "^Banco no puede ser vacío."
						  		          }
						  		        },
						  		        nro_tarjeta: {
						  		          presence: {
						  		          	message: "^El nro. de la tarjeta de credito no puede ser vacío."
						  		          },
						                format: {
						                  pattern: /^(34|37|4|5[1-5]).*$/,
						                  message: function(value, attribute, validatorOptions, attributes, globalOptions) {
						                    return validate.format("^No es un nro. de tarjeta valido, verifique.", {
						                      num: value
						                    });
						                  }
						                },
						                length: function(value, attributes, attributeName, options, constraints) {
						                  if (value) {
						                    // Amex
						                    if ((/^(34|37).*$/).test(value)) return {is: 15, wrongLength: "^Nro. incorrecto. (Se esperaban 15 nros)"};
						                    // Visa, Mastercard
						                    if ((/^(4|5[1-5]).*$/).test(value)) return {is: 16, wrongLength: "^Nro. incorrecto. (Se esperaban 16 nros)"};
						                  }
						                  // Unknown card, don't validate length
						                  return false;
						                },
						  		        },
						  		        nro_cod: {
						  		          presence: {
						  		          	message: "^El cod. no puede ser vacio."
						  		          },
						  		          length: {
						                  minimum: 3,
						                  tooShort: "^Al menos se necesitan 3 nros",
						  			        },
						  	          },
						  	          nro_venc: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la fecha de vencimiento."
						  		          }
						  	          },
						  	          direccion: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la dirección."
						  		          }
						  	          },
						  	          localidad: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la localidad."
						  		          }
						  	          },
						  	          cod_postal: {
						  	          	presence: {
						  		          	message: "^Debe ingresar el Código Postal."
						  		          }
						  	          },
						  	          // provincia: {
						  	          // 	presence: {
						  		         //  	message: "^Debe ingresar la provincia."
						  		         //  }
						  	          // },
						  	          provincia: {
		  	                    // You also need to input where you live
		  	                    presence: true,
		  	                    // And we restrict the countries supported to Sweden
		  	                    exclusion: {
												      within: ["-1"],
												      message: "^Debe seleccionar una provincia."
												    }
		  	                  },
						  	          telefono: {
						  	          	presence: {
						  		          	message: "^Debe ingresar un número de teléfono."
						  		          }
						  	          }
						  		      };
											} else {
												// declaramos validadores
									      var constraints = {
									        email: {
									          presence: {
									          	message: "no puede ser vacío."
									          },
									          email: {
									          	message: "no posee un formato valido."
									          },
									        },
									        fullname: {
									          presence: {
									          	message: "^Nombre no puede ser vacío."
									          }
									        },
									        // last_name: {
									        //   presence: {
									        //   	message: "^Apellido no puede ser vacío."
									        //   }
									        // },
									        banco: {
									          presence: {
									          	message: "^Banco no puede ser vacío."
									          }
									        },
									        nro_tarjeta: {
									          presence: {
									          	message: "^El nro. de la tarjeta de credito no puede ser vacío."
									          },
							              format: {
							                pattern: /^(34|37|4|5[1-5]).*$/,
							                message: function(value, attribute, validatorOptions, attributes, globalOptions) {
							                  return validate.format("^No es un nro. de tarjeta valido, verifique.", {
							                    num: value
							                  });
							                }
							              },
							              length: function(value, attributes, attributeName, options, constraints) {
							                if (value) {
							                  // Amex
							                  if ((/^(34|37).*$/).test(value)) return {is: 15, wrongLength: "^Nro. incorrecto. (Se esperaban 15 nros)"};
							                  // Visa, Mastercard
							                  if ((/^(4|5[1-5]).*$/).test(value)) return {is: 16, wrongLength: "^Nro. incorrecto. (Se esperaban 16 nros)"};
							                }
							                // Unknown card, don't validate length
							                return false;
							              },
									        },
									        nro_cod: {
									          presence: {
									          	message: "^El cod. no puede ser vacio."
									          },
									          length: {
							                minimum: 3,
							                tooShort: "^Al menos se necesitan 3 nros",
										        },
								          },
								          nro_venc: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la fecha de vencimiento."
						  		          }
						  	          },
						  	          direccion: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la dirección."
						  		          }
						  	          },
						  	          localidad: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la localidad."
						  		          }
						  	          },
						  	          cod_postal: {
						  	          	presence: {
						  		          	message: "^Debe ingresar el Código Postal."
						  		          }
						  	          },
						  	          provincia: {
						  	          	presence: {
						  		          	message: "^Debe ingresar la provincia."
						  		          }
						  	          },
						  	          telefono: {
						  	          	presence: {
						  		          	message: "^Debe ingresar un número de teléfono."
						  		          }
						  	          }
									      };
											};
								      
								      // Hook up the form so we can prevent it from being posted
								      var form = document.querySelector('#subscribe-form');
								      form.addEventListener("submit", function(ev) {
								        ev.preventDefault();
								          console.log('OK');
								        handleFormSubmit(form);
								      });
								      // Hook up the inputs to validate on the fly
								      var inputs = document.querySelectorAll("input, textarea, select")
								      for (var i = 0; i < inputs.length; ++i) {
								        inputs.item(i).addEventListener("change", function(ev) {
								          var errors = validate(form, constraints) || {};
								          showErrorsForInput(this, errors[this.name])
								        });
								      }
								      function handleFormSubmit(form, input) {
								        // validate the form aainst the constraints
								        var errors = validate(form, constraints);
								        // then we update the form to reflect the results
								        showErrors(form, errors || {});
								        console.log(errors);
								        if (!errors) {
								          showSuccess(form);
								        }
								      }
								      // Updates the inputs with the validation errors
								      function showErrors(form, errors) {
								        // We loop through all the inputs and show the errors for that input
								        _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
								          // Since the errors can be null if no errors were found we need to handle
								          // that
								          showErrorsForInput(input, errors && errors[input.name]);
								        });
								      }
								      // Shows the errors for a specific input
								      function showErrorsForInput(input, errors) {
								        // This is the root of the input
								        var formGroup = closestParent(input.parentNode, "form-group")
								          // Find where the error messages will be insert into
								          , messages = formGroup.querySelector(".messages");
								        // First we remove any old messages and resets the classes
								        resetFormGroup(formGroup);
								        // If we have errors
								        if (errors) {
								          // we first mark the group has having errors
								          formGroup.classList.add("has-error");
								          // then we append all the errors
								          _.each(errors, function(error) {
								            addError(messages, error);
								          });
								        } else {
								          // otherwise we simply mark it as success
								          formGroup.classList.add("has-success");
								        }
								      }
								      // Recusively finds the closest parent that has the specified class
								      function closestParent(child, className) {
								        if (!child || child == document) {
								          return null;
								        }
								        if (child.classList.contains(className)) {
								          return child;
								        } else {
								          return closestParent(child.parentNode, className);
								        }
								      }
								      function resetFormGroup(formGroup) {
								        // Remove the success and error classes
								        formGroup.classList.remove("has-error");
								        formGroup.classList.remove("has-success");
								        // and remove any old messages
								        _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
								          el.parentNode.removeChild(el);
								        });
								      }
								      // Adds the specified error with the form-controllowing markup
								      // <p class="help-block error">[message]</p>
								      function addError(messages, error) {
								        var block = document.createElement("p");
								        block.classList.add("help-block");
								        block.classList.add("error");
								        block.innerText = error;
								        messages.appendChild(block);
								      }
								      function showSuccess(form) {
								        // We made it \:D/
								        jQuery(form).submit();
								      }
								    })();
								  });
								</script>
         	  <?php else :
         	  	echo $msg;
         	  endif;
       	  ?>
					</div>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row end -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->
<?php get_footer(); ?>