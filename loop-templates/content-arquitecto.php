<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<?php $arquitecto = $post->ID; //guardamos arquitecto ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	<div class="entry-content">
		<div class="row">
			<div class="col-sm-8 ml-auto mr-auto text-center mb-3 redes-arquitecto">
				<?php if (!empty(get_field('facebook'))) : ?>
					<a href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook-official" aria-hidden="true" style="margin-left:10px;margin-right:10px;"></i></a>
				<?php endif; ?>
				<?php if (!empty(get_field('instagram'))) : ?>
					<a href="<?php the_field('instagram'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="margin-left:10px;margin-right:10px;"></i></a>
				<?php endif; ?>
				<?php if (!empty(get_field('twitter'))) : ?>
				<a href="<?php the_field('twitter'); ?>"><i class="fa fa-twitter" aria-hidden="true" style="margin-left:10px;margin-right:10px;"></i></a>
				<?php endif; ?>
			</div>
		</div>
		<?php the_content(); ?>
		<div id="arquitecto-principal" class=" mb-2">
			<div class="py-4 titulo-notas-arquitecto mb-3">
				<h5 class="text-uppercase text-center"><i class="fa fa-bookmark-o mr-2" aria-hidden="true"></i><?php _e( 'Notes as principal architect', 'revistaplot' ) ?></h5>
			</div>
			<?php
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'post' ),
					'post_status'            => array( 'publish' ),
					'nopaging'               => true,
					'posts_per_page'         => '6',
					'order'                  => 'DESC',
					'meta_query'             => array(
						array(
							'key'     => 'arquitecto_principal',
							'value'   => $arquitecto,
							'compare' => '=',
						),
					),
				);
				// The Query
				$principal = new WP_Query( $args );
			?>
			<div class="row">
				<?php	if ( $principal ->have_posts() ) : ?>
					<?php	while ( $principal ->have_posts() ){ ?>
							<div class="col-lg-3">
								<?php $principal ->the_post(); ?>
								<a href="<?php echo esc_url(get_permalink()); ?>" class="link-img-rp">
								<?php echo the_post_thumbnail( 'related-posts', array('class'=>'img-rp')); ?>
								</a>
								<?php  ?>
								<h6 class="py-2"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h6>
							</div>
					<?php	}; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<div class="col-lg-12 no-articles">
		        <?php _e( 'Architect does not have articles as an associate', 'revistaplot' ); ?>
					</div>
			  <?php endif; ?>
			</div>
		</div> <!-- fin arquitecto principal -->

		<div id="arquitecto-asociado">
			<div class="py-4 titulo-notas-arquitecto mb-3">
				<h5 class="text-uppercase text-center"><i class="fa fa-bookmark-o mr-2" aria-hidden="true"></i><?php _e( 'Notes as an associate architect', 'revistaplot' ) ?></h5>
			</div>

			<?php
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'post' ),
					'post_status'            => array( 'publish' ),
					'nopaging'               => true,
					'posts_per_page'         => '6',
					'order'                  => 'DESC',
					'meta_query'             => array(
								array(
									'key'     => 'arquitectos_asociados',
									'value'   => $arquitecto,
									'compare' => 'LIKE',
								),
						),
				);
				// The Query
				$asociado = new WP_Query( $args );
			?>

			<div class="row">
			<?php	if ( $asociado ->have_posts() ) : ?>
				<?php	while ( $asociado ->have_posts() ){ ?>
					<div class="col-lg-3">
						<?php $asociado ->the_post(); ?>
						<a href="<?php echo esc_url(get_permalink()); ?>" class="link-img-rp">
						<?php echo the_post_thumbnail( 'related-posts', array('class'=>'img-rp')); ?>
						</a>
						<h6 class="py-2"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h6>
					</div>
				<?php	}; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<div class="col-lg-12">
		        <?php _e( 'Architect does not have articles as an associate', 'revistaplot' ); ?>
					</div>
			  <?php endif;  ?>
			</div>
		</div> <!-- fin arquitecto asociado -->

	</div><!-- .entry-content -->


	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
