<?php /* Template Name: Danh sach san pham */ ?>
<?php
$page = get_query_var('page')?get_query_var('page'):1;
$listProducts = wc_get_products(array(
	'limit' => 12,
	'orderby' => 'date',
	'order' => 'DESC',
	'status' => 'publish',
	'page' =>  $page,
	'paginate' => true,
));
get_header();
?>
<?php if(have_posts()): the_post(); ?>
    <div class="c-cover list-product__cover">
        <div class="list-product__cover-title text-align-center">
			<?php $content = apply_filters('the_content', $post->post_content); ?>
			<?php the_content() ?>
        </div>
    </div>
	<?php if($listProducts->total > 0){ ?>
        <div class="list-product__container w-1060 row justify-content-start">
			<?php foreach ($listProducts->products as $product){
				nano_render_partial('woocommerce/content-product', array('product' => $product));
			} ?>
        </div>
	<?php } ?>
	<?php get_template_part('partials/testimonial') ?>
<?php endif; ?>
<?php get_footer(); ?>