<div class="button__blog row justify-content-center align-items-center">
	<a href="<?php echo $permalink ?>" title="<?php echo esc_attr($title) ?>" class="button__blog--item text-uppercase">Đọc tiếp</a>
	<div class="button__blog--item button__blog--social row">
		<a class="mail-icon flex-center" href="mailto:?Subject=<?php echo $title ?>&body=<?php echo esc_url($permalink) ?>" target="_blank">
			<img src="/wp-content/themes/nanocare/assets/mail2.png" alt="">
		</a>
		<a class="facebook-icon flex-center" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($permalink) ?>" target="_blank">
			<img src="/wp-content/themes/nanocare/assets/fb2.png" alt="">
		</a>
	</div>
</div>