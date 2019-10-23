<?php /* Template Name: Single Product */ ?>
<?php get_header(); ?>
<?php if(have_posts()): the_post();
	global $product;
	$title = get_the_title();
	$effective = get_field('product_effective');
	$purpose = get_field('product_purpose');
	$userOfProduct = get_field('product_use_of');
	$principles = get_field('product_principles');
	$usageDosage = get_field('product_usage_dosage');
	$specialAdvantages = get_field('product_special_advantages');
	$content = apply_filters('the_content', $product->post_content);
	$attachment_ids = $product->get_gallery_attachment_ids();

?>
<div class="product__summary w-1440 row justify-content-start">
	<div class="product__summary--img col-xs-12">
		<div class="swiper-container product__summary--img-list">
			<div class="swiper-wrapper">
                <?php
                foreach( $attachment_ids as $attachment_id ) {
	                echo '<img class="swiper-slide" src="'.wp_get_attachment_url( $attachment_id ).'" alt="'.$title.'"/>';
                }
                ?>
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
	<div class="product__summary--cart col-md-6 col-xs-12">
		<h1 class="c-title-3"><?php echo $title ?></h1>
		<p class="p-price line-title"><?php echo $product->get_price_html() ?></p>
		<div class="product__feature"><?php the_excerpt() ?></div>
		<div class="box__quanity">
			<?php nano_render_partial('partials/add_to_cart', array('product_id' => $product->id, 'isShowQuantity' => true)) ?>
		</div>
	</div>
</div>
<div class="product__description w-880">
    <?php if( !empty($effective) ){ ?>
	<div class="selector__toggle border-tp-gray active">
		<h2 class="title__toggle">Hiệu quả</h2>
        <div class="w-520"><?php echo apply_filters('the_content', $effective); ?></div>
	</div>
	<?php } ?>
    <?php if( !empty($purpose) ){ ?>
	<div class="selector__toggle border-tp-gray">
		<h2 class="title__toggle">Mục đích sử dụng</h2>
		<div class="w-520 hiding"><?php echo apply_filters('the_content', $purpose); ?></div>
	</div>
	<?php } ?>
    <?php if( !empty($userOfProduct) ){ ?>
	<div class="selector__toggle border-tp-gray">
		<h2 class="title__toggle">Công dụng của sản phẩm</h2>
        <div class="w-520 hiding"><?php echo apply_filters('the_content', $userOfProduct); ?></div>
	</div>
	<?php } ?>
    <?php if( !empty($principles) ){ ?>
	<div class="selector__toggle border-tp-gray">
		<h2 class="title__toggle">Nguyên lý</h2>
        <div class="w-520 hiding"><?php echo apply_filters('the_content', $principles); ?></div>
	</div>
	<?php } ?>
    <?php if( !empty($usageDosage) ){ ?>
	<div class="selector__toggle border-tp-gray">
		<h2 class="title__toggle">Cách dùng và liều lượng</h2>
        <div class="w-520 hiding"><?php echo apply_filters('the_content', $usageDosage); ?></div>
	</div>
	<?php } ?>
    <?php if( !empty($specialAdvantages) ){ ?>
	<div class="selector__toggle border-tp-gray border-bt-gray">
		<h2 class="title__toggle">Các ưu điểm đặc biệt của Nano-Care Nano Silver</h2>
        <div class="w-520 hiding"><?php echo apply_filters('the_content', $specialAdvantages); ?></div>
	</div>
	<?php } ?>
</div>
<div class="product___article">
	<div class="line-vertical">
        <img src="/wp-content/themes/nanocare/assets/line-2.png" alt="">
	</div>
    <?php woocommerce_upsell_display() ?>
	<?php get_template_part('partials/testimonial') ?>
</div>
<?php endif; ?>
<?php get_footer(); ?>

