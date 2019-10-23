<form class="frm_add_cart" method="post" action="<?php echo admin_url( 'admin-ajax.php' ) ?>">
	<?php if(isset($isShowQuantity)&&$isShowQuantity){ ?>
		<div class="button__quanity row">
			<input type="hidden" name="action" value="woocommerce_add_to_cart" />
			<input type="hidden" name="product_id" value="<?php echo !empty($product_id)?$product_id:0 ?>" />
			<input type="button" class="quanity" value="-" id="minus">
			<input type="text" class="quanity__text" size="25" value="1" name="quantity" id="count" min="1" max="100">
			<input type="button" class="quanity" value="+" id="plus">
		</div>
	<?php }else{ ?>
		<input type="hidden" name="action" value="woocommerce_add_to_cart" />
		<input type="hidden" name="product_id" value="<?php echo !empty($product_id)?$product_id:0 ?>" />
		<input type="hidden" class="quanity__text" size="25" value="1" name="quantity" id="count" min="1" max="100">
	<?php } ?>

	<button type="submit" class="button__comment button btn-black">Thêm vào giỏ hàng</button>
</form>