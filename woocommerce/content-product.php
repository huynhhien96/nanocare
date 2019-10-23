<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$productPermalink = get_permalink($product->id);
$productTitle = $product->name;
$post_thumbnail_id = $product->get_image_id();
?>
<div class="product__item">
    <a class="product__item--img" href="<?php echo $productPermalink ?>" title="<?php echo esc_attr($productTitle) ?>"><?php echo wp_get_attachment_image($post_thumbnail_id,'thumbnail', array('class'=> 'img-fluid')) ?></a>
    <div class="product__item--detail row justify-content-center">
        <a class="product__item--title" href="<?php echo $productPermalink ?>" title="<?php echo esc_attr($productTitle) ?>"><?php echo $productTitle ?></a>
		<?php if ( $price_html = $product->get_price_html() ){ ?>
            <span><?php echo $price_html ?></span>
		<?php } ?>
    </div>
    <?php nano_render_partial('partials/add_to_cart', array('product_id' => $product->id)) ?>
</div>
