<?php /* Template Name: Home Page  */ ?>
<?php
	$page = get_query_var('page')?get_query_var('page'):1;
	$listProducts = wc_get_products(array(
		'limit' => 12,
		'orderby' => 'date',
		'order' => 'DESC',
		'status' => 'publish',
		'page' =>  $page,
		'paginate' => true,
		'category' => 'show-index',
	));
	get_header();
?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="home">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	<div class="home__products">
		<div class="home__products--show">
			<?php if(have_posts()): the_post(); ?>
				<div class="c-cover list-product__cover">
					<h2 class="c-title-4 text-align-center text-center">Sản phẩm của NanoCare</h2>
				</div>
				<?php if($listProducts->total > 0){ ?>
					<div class="list-product__container w-1060 row justify-content-center">
						<?php foreach ($listProducts->products as $product){
							nano_render_partial('woocommerce/content-product', array('product' => $product));
						} ?>
					</div>
				<?php } ?>
				<?php get_template_part('partials/testimonial') ?>
			<?php endif; ?>
		</div>
	</div>
	<?php get_template_part('partials/testimonial') ?>
<?php get_footer(); ?>