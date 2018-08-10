<!-- <div class="container"> -->
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-lg-6">
					<!-- arquitecto principal -->
					<?php $value = get_field('arquitecto_principal'); ?>
					<?php if ($value) : ?>
						<p><span class="footer-sub"><?php _e('Architect', 'revistaplot' );?> </span> <a href="<?php echo $value->guid; ?>"><?php echo $value->post_title; ?></a></p>
					<?php endif; ?>
					<!-- arquitectos asociados -->
					<?php $value = get_field('arquitectos_asociados'); ?>
					<?php if ($value) : ?>
						<p><span class="footer-sub"><?php _e('Associated architect', 'revistaplot' );?></span> 
							<?php $last = end($value); ?>
							<?php foreach ($value as $v) : ?>
								<?php if($v == $last) : //Si es ultimo elemento ?>
									<a href="<?php echo $v->guid; ?>"><?php echo $v->post_title; ?></a>.
								<?php else : ?>
									<a href="<?php echo $v->guid; ?>"><?php echo $v->post_title; ?></a>,
								<?php endif; ?>
							<?php endforeach; ?>
						</p>
					<?php endif; ?>
					<!-- texto debajo de arquitectos -->
					<?php the_field('columna_izquierda'); ?>
				</div>
				<div class="col-lg-6">
					<!-- columna central de texto -->
					<?php the_field('columna_central'); ?>
				</div>
			</div>
		</div>
		<!-- metadatos articulo -->
		<div class="col-md-3 text-md-right col-meta">
			<div class="categoria py-2">
				<?php global $post; ?>
				<?php $categories = get_the_category($post->ID); ?>
				<p><a href="<?php echo esc_url(get_category_link( $categories[0]->cat_ID)); ?>" class="nombre"><?php echo $categories[0]->name; ?></a></p>
			</div>
			<div class="clearfix"></div>
				<?php $posttags = get_the_tags();?>
				<?php if ($posttags) : ?>
					<div class="etiquetas py-2">
					<?php $last = end($posttags); ?>
					<p class="title-etiquetas"><strong>Etiquetas</strong></br>
				  <?php foreach($posttags as $v) : ?>
						<?php  if($v == $last) : //Si es ultimo elemento ?>
					  	<a href="<?php echo get_tag_link($v->term_id); ?>"><?php echo $v->name;  ?></a>
						<?php else : ?>
					  	<a href="<?php echo get_tag_link($v->term_id); ?>"><?php echo $v->name;  ?></a>,
						<?php endif; ?>
				  <?php endforeach; ?>
					</p>
				</div>
			<?php else : ?>
				<!-- <div class="no-etiquetas py-2"></div> -->
			<?php endif; ?>
			<div class="clearfix"></div>
			<div class="redes-articulo py-2">
				<p class="title-compartir"><strong>Compartilhar</strong></p>
				<div class="w-100"></div>
					<div class="iconos-footer" style="margin: 3px auto 0 auto; display: inline-block;">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post->guid; ?>" class="link-footer col-md-3 nopaddingright right" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="32" viewBox="-1 -1 52 52" enable-background="new 0 0 52 52" xml:space="preserve">
							<path id="facebook" fill="#000000" d="M44.2,49.5H5.81A5.31,5.31,0,0,1,.5,44.19V5.81A5.31,5.31,0,0,1,5.81.5H44.2a5.31,5.31,0,0,1,5.3,5.31V44.19A5.31,5.31,0,0,1,44.2,49.5ZM5.81,1.5A4.31,4.31,0,0,0,1.5,5.81V44.19A4.31,4.31,0,0,0,5.81,48.5H44.2a4.31,4.31,0,0,0,4.3-4.31V5.81A4.31,4.31,0,0,0,44.2,1.5H5.81ZM35.1,44.69H26.9V27.9H22.1V19.69h4.8v-5.5a9,9,0,0,1,8.9-8.89h6.5v8.2H37a1.77,1.77,0,0,0-1.9,1.9v4.29h7.21V27.9H35.1V44.69Zm-7.19-1H34.1V26.9h7.21V20.69H34.1V15.4A2.78,2.78,0,0,1,37,12.5h4.31V6.31h-5.5a8,8,0,0,0-7.9,7.89v6.5H23.1V26.9h4.8V43.69Z" transform="translate(-0.5 -0.5)"/></svg>
						</a>
						<a href="https://twitter.com/home?status=<?php echo esc_url( home_url( '/'  ) ) . $post->post_name; ?>" class="link-footer col-md-3 nopaddingright right" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 52 52" enable-background="new 0 0 50 52" xml:space="preserve">
							<path id="twitter" fill="#000000" d="M34.6,5.65a9.62,9.62,0,0,1,6.8,2.9l0.4,0.4,0.5-.1a27.69,27.69,0,0,0,4.1-1.2,11.56,11.56,0,0,1-2.8,2.6l-4,2.4,4.6-.6a27.41,27.41,0,0,0,2.8-.5,16.13,16.13,0,0,1-2.8,2.4l-0.4.3v1.8c0,13.9-10.5,28.2-28.2,28.2A29.15,29.15,0,0,1,4,41.75a21.67,21.67,0,0,0,11.7-4.5l2.2-1.7H15.1a9.33,9.33,0,0,1-8-5H7.4a10.32,10.32,0,0,0,3-.4l4-1.1-4.1-.8A9.26,9.26,0,0,1,3,20.65a13.59,13.59,0,0,0,3.5.7l3.5,0.1-2.9-1.9A9.28,9.28,0,0,1,3.6,8.45a30.44,30.44,0,0,0,20.9,9.9l1.3,0.1-0.3-1.3A9.19,9.19,0,0,1,32.4,6h0.1a5.22,5.22,0,0,1,2.1-.4m0-1a10.29,10.29,0,0,0-10.3,10.3h0a9.08,9.08,0,0,0,.3,2.3A29.07,29.07,0,0,1,3.5,6.55a10.31,10.31,0,0,0,3.2,13.7A11,11,0,0,1,2,18.95v0.1a10.28,10.28,0,0,0,8.2,10.1,12.59,12.59,0,0,1-2.7.4,12.25,12.25,0,0,1-1.9-.2,10.21,10.21,0,0,0,9.6,7.1,20.21,20.21,0,0,1-12.7,4.4,20.9,20.9,0,0,1-2.5-.1,29.07,29.07,0,0,0,15.7,4.6c18.9,0,29.2-15.6,29.2-29.2v-1.3A23.29,23.29,0,0,0,50,9.55a20.69,20.69,0,0,1-5.9,1.6,10.65,10.65,0,0,0,4.5-5.7,21.39,21.39,0,0,1-6.5,2.5,10.06,10.06,0,0,0-7.5-3.3h0Z" transform="translate(0 -0.65)"/>
						</svg>
						</a>
				</div>
			</div>
		</div>
	</div>
<!-- </div> -->