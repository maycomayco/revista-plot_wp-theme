<?php
/**
 * Footer del theme revista plot
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>
<?php global $woocommerce; ?>
<div class="wrapper" id="wrapper-footer">
	<div class="container">
		<!-- <div class="row"> -->
			<footer class="site-footer" id="colophon">
				<!-- footer-top -->
				<div class="row normal-footer align-items-center">
					<!-- 1er columna -->
					<div class="col-lg-4">
							<div class="row h100">
								<div class="col-3 col-sm-6 col-lg-3 logo-footer"> 
									<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/08/logo.jpg" alt="logo-footer">
								</div>
								<div class="col-9 col-md-6 col-lg-9 logo-footer-info"> 
									<p>© REVISTA PLOT <?php echo date("Y"); ?><br>
									Todos os direitos reservados. <br>
									<a href="<?php echo get_site_url(); ?>" class="link-footer">www.revistaplot.com.br</a></p>
									Desenvolvido pelo <a href="http://grupokinexo.com/" target="_blank">Grupo Kinexo.</a>
								</div>
							</div>
					</div>
					<!-- 2da columna -->
					<div class="col-lg-5 no-pl">
						<!-- <div class="container"> -->
							<div class="row">
								<div class="col-md-6 col-lg-5 btn-first-col">
									<div class="container">
										<div class="row">
											<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn btn-outline-plot btn-block" role="button">Loja </a>
										</div>
										<div class="row mt-3">
											<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" class="btn btn-outline-plot btn-block" role="button">Ver carrinho </a>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-5 btn-second-col">
									<div class="container">
										<div class="row">
											<a href="<?php echo get_permalink( wc_get_page_id( 'terms' ) ); ?>" class="btn btn-outline-plot btn-block" role="button">Termos e condições </a>
										</div>
										<div class="row mt-3">
											<a href="<?php echo get_site_url(); ?>/contacto" class="btn btn-outline-plot btn-block" role="button">Contato</a>
										</div>
									</div>
								</div>
							</div>
						<!-- </div> -->
					</div>
					<!-- 3er columna -->
					<div class="col-lg-3 no-pl">
						<div class="col-meta no-pl">
							  <div class="row justify-content-center section-iconos-footer">
							    <div class="col-xs-3 icono">
							      <a href="https://www.facebook.com/revistaplot/" class="link-footer" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
											<path id="facebook" fill="#000000" d="M44.2,49.5H5.81A5.31,5.31,0,0,1,.5,44.19V5.81A5.31,5.31,0,0,1,5.81.5H44.2a5.31,5.31,0,0,1,5.3,5.31V44.19A5.31,5.31,0,0,1,44.2,49.5ZM5.81,1.5A4.31,4.31,0,0,0,1.5,5.81V44.19A4.31,4.31,0,0,0,5.81,48.5H44.2a4.31,4.31,0,0,0,4.3-4.31V5.81A4.31,4.31,0,0,0,44.2,1.5H5.81ZM35.1,44.69H26.9V27.9H22.1V19.69h4.8v-5.5a9,9,0,0,1,8.9-8.89h6.5v8.2H37a1.77,1.77,0,0,0-1.9,1.9v4.29h7.21V27.9H35.1V44.69Zm-7.19-1H34.1V26.9h7.21V20.69H34.1V15.4A2.78,2.78,0,0,1,37,12.5h4.31V6.31h-5.5a8,8,0,0,0-7.9,7.89v6.5H23.1V26.9h4.8V43.69Z" transform="translate(-0.5 -0.5)"/></svg>
										</a>
							    </div>
							    <div class="col-xs-3 icono">
							      <a href="https://twitter.com/RevistaPLOT" class="link-footer" target="_blank">
											<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 52 52" enable-background="new 0 0 50 52" xml:space="preserve">
												<path id="twitter" fill="#000000" d="M34.6,5.65a9.62,9.62,0,0,1,6.8,2.9l0.4,0.4,0.5-.1a27.69,27.69,0,0,0,4.1-1.2,11.56,11.56,0,0,1-2.8,2.6l-4,2.4,4.6-.6a27.41,27.41,0,0,0,2.8-.5,16.13,16.13,0,0,1-2.8,2.4l-0.4.3v1.8c0,13.9-10.5,28.2-28.2,28.2A29.15,29.15,0,0,1,4,41.75a21.67,21.67,0,0,0,11.7-4.5l2.2-1.7H15.1a9.33,9.33,0,0,1-8-5H7.4a10.32,10.32,0,0,0,3-.4l4-1.1-4.1-.8A9.26,9.26,0,0,1,3,20.65a13.59,13.59,0,0,0,3.5.7l3.5,0.1-2.9-1.9A9.28,9.28,0,0,1,3.6,8.45a30.44,30.44,0,0,0,20.9,9.9l1.3,0.1-0.3-1.3A9.19,9.19,0,0,1,32.4,6h0.1a5.22,5.22,0,0,1,2.1-.4m0-1a10.29,10.29,0,0,0-10.3,10.3h0a9.08,9.08,0,0,0,.3,2.3A29.07,29.07,0,0,1,3.5,6.55a10.31,10.31,0,0,0,3.2,13.7A11,11,0,0,1,2,18.95v0.1a10.28,10.28,0,0,0,8.2,10.1,12.59,12.59,0,0,1-2.7.4,12.25,12.25,0,0,1-1.9-.2,10.21,10.21,0,0,0,9.6,7.1,20.21,20.21,0,0,1-12.7,4.4,20.9,20.9,0,0,1-2.5-.1,29.07,29.07,0,0,0,15.7,4.6c18.9,0,29.2-15.6,29.2-29.2v-1.3A23.29,23.29,0,0,0,50,9.55a20.69,20.69,0,0,1-5.9,1.6,10.65,10.65,0,0,0,4.5-5.7,21.39,21.39,0,0,1-6.5,2.5,10.06,10.06,0,0,0-7.5-3.3h0Z" transform="translate(0 -0.65)"/>
											</svg>
										</a>
							    </div>
							    <div class="col-xs-3 icono">
							      <a href="https://www.instagram.com/revistaplot/" class="link-footer" target="_blank">
							      	<svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="0 0 52 52" enable-background="new 0 0 50 50" xml:space="preserve">
							      	<path id="instagram" fill="#000000" d="M43.58,1A5.42,5.42,0,0,1,49,6.42V43.58A5.42,5.42,0,0,1,43.58,49H6.42A5.42,5.42,0,0,1,1,43.58V6.42A5.42,5.42,0,0,1,6.42,1H43.58M36.42,16.44h5.65a3.25,3.25,0,0,0,3.25-3.25V7.81a3.25,3.25,0,0,0-3.25-3.25H36.42a3.25,3.25,0,0,0-3.25,3.25V13.2a3.25,3.25,0,0,0,3.25,3.25h0M25,35.62A10.9,10.9,0,0,0,36,24.89a11,11,0,0,0-22,0A10.9,10.9,0,0,0,25,35.62m0,3.87a14.32,14.32,0,0,1-14.49-14,13.61,13.61,0,0,1,.6-4l0.4-1.29h-7V42.27a3,3,0,0,0,3,3H42.36a3,3,0,0,0,3-3V20.14H38.6l0.4,1.3a13.67,13.67,0,0,1,.6,4A14.32,14.32,0,0,1,25,39.49h0M43.58,0H6.42A6.44,6.44,0,0,0,0,6.42V43.58A6.44,6.44,0,0,0,6.42,50H43.58A6.44,6.44,0,0,0,50,43.58V6.42A6.44,6.44,0,0,0,43.58,0h0ZM36.42,15.44a2.26,2.26,0,0,1-2.25-2.25V7.81a2.26,2.26,0,0,1,2.25-2.25h5.65a2.26,2.26,0,0,1,2.25,2.25V13.2a2.26,2.26,0,0,1-2.25,2.25H36.42ZM25,34.62a9.89,9.89,0,0,1-10-9.73,10,10,0,0,1,20,0,9.89,9.89,0,0,1-10,9.73h0Zm0,5.87a15.31,15.31,0,0,0,15.59-15v0A14.66,14.66,0,0,0,40,21.15h4.4V42.27a2,2,0,0,1-2,2H7.54a2,2,0,0,1-2-2V21.14h4.59a14.6,14.6,0,0,0-.64,4.29A15.31,15.31,0,0,0,25,40.49h0Z"/></svg>
							      </a>
							    </div>
							  </div>
								<div class="col-md-6 social-footer">
									<div class="row btn-suscribite-footer">
										<a href="<?php echo get_site_url(); ?>/assine" class="btn btn-outline-plot btn-block btn-suscribite" role="button">Assine</a>
									</div>
								</div>
						</div>
					</div>
				</div>
			</footer><!-- #colophon -->
	</div><!-- container end -->
</div><!-- wrapper end -->
</div><!-- #page -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<?php wp_footer(); ?>
</body>
</html>