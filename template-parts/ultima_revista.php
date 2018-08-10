<?php 
$args = array(
	'post_type' => 'product',
	'posts_per_page' => 1,
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => 'pagina-principal',
		),
	),
	'orderby' =>'date',
	'order' => 'DESC'
);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); global $product;
?>
<div class="knx_wrapper-revista">
	<div class="row">
		<div class="col-lg-3 image">
			<?php if ( has_post_thumbnail() ) : ?>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	        <?php the_post_thumbnail(); ?>
		    </a>
			<?php endif; ?>
		</div>
		<div class="col-lg-9 texto">
			<h2 class="titulo_ult-revista"><?php the_title(); ?></h2>
			<p class="texto_ult-revista"><?php //echo $loop->post->post_excerpt; ?></p>
			<p class="texto_ult-revista"><?php the_excerpt(); ?></p>
		</div>
	</div>
</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>