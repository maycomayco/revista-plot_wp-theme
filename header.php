<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->

	<!-- respaldo, navbar original -->
	<!-- <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar"> -->
	<div class="wrapper-navbar" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>
		<!-- navbar basica bootstrap 4 -->
		<!-- <div class="container"> -->
			<nav class="navbar navbar-expand-md navbar-plot fixed-top">
				<div class="container">
				<!-- Your site title as branding in the menu -->
				<?php if ( ! has_custom_logo() ) : ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
					<?php else : ?>
						<?php the_custom_logo(); ?>
					<?php endif; ?>
					<!-- end custom logo -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<!-- <span class="navbar-toggler-icon"></span> -->
						<span class="fa fa-reorder"></span>
					</button>
			    <!-- The WordPress Menu goes here -->
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'walker'          => new WP_Bootstrap_Navwalker(),
								// 'walker'          => new understrap_WP_Bootstrap_Navwalker(),
							)
						);
					?>
					<!-- cminetti Search Header -->
					<div class="search float-right padding-lg-left">
							<button class="search-toggle" style="color: rgb(17, 17, 17); opacity: 1;"><i class="fa fa-search" aria-hidden="true" aria-label="Search"></i></button>
					</div><!-- End Search Header -->
				</div>
			</nav>
		<!-- end container -->
	  <!-- </div> -->
		<!-- cminetti Wrapper Search Header -->
		<div class="wrapper-search">
			<div class="container full-height">
					<div class="row full-height">
							<div class="col-xs-12 col-sm-12 full-height">
								<form method="get" id="searchform" class="search-bar full-height" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
									<label class="assistive-text" for="s"><?php esc_html_e( '', 'understrap' ); ?></label>
										<div class="input-group">
											<input class="field form-control search-input" id="s" name="s" type="text"
												placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>">
											<span class="input-group-btn">
											<button id="searchsubmit" class="" type="submit"><i class="fa fa-angle-right" aria-hidden="true"></i></button>	
											</span>
										</div>
								</form>
							</div>
					</div>
			</div>
		</div>
	</div><!-- .wrapper-navbar end -->