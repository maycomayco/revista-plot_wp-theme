<?php
/**
 * Template que muestra los posts relacionados en 4 columnas
 *
 * @param id post visualizado
 * @return lista de posts
 * @author mayco
 */

// var_dump($id);

$terms = get_the_terms( $id, 'category');
if ( $terms ):
	foreach ($terms as $term):
		$categ[] = $term->term_id;
	endforeach;
endif;

$query_rp	= new WP_QUERY(array(
				'category__in'		=> $categ[0],
				'posts_per_page'	=> 4,
				'post__not_in'		=>array($id),
				'orderby'			=>'rand'
				));

?>
<!-- <div class="container"> -->
	<div class="py-3" id="posts-relacionados">
		<h4 class="title-section py-2">Posts Relacionados</h4>
		<div class="row">
		<?php	if ( $query_rp->have_posts() ) { ?>
			<?php	while ( $query_rp->have_posts() ){ ?>
				<div class="col-lg-3 col-md-6">
					<?php $query_rp->the_post(); ?>
					<a href="<?php echo esc_url(get_permalink()); ?>" class="link-img-rp">
					<?php echo the_post_thumbnail( 'large', array('class'=>'img-rp')); ?>
					</a>
					<h6 class="py-2"><a href="#"><?php echo get_the_title(); ?></a></h6>
				</div>
			<?php	}; ?>
				<?php wp_reset_postdata(); ?>
		<?php }; ?>
		</div>
	</div>
<!-- </div> -->