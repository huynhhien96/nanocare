<?php if(!empty($blog)){
	$permalink = get_permalink($blog);
	$title = $blog->post_title;
?>
<div class="<?php echo (!empty($cls)?$cls:'') ?> blog__single--item">
	<a href="<?php echo $permalink ?>" title="<?php echo esc_attr($title) ?>">
		<div class="img-bg" style="">
			<?php echo get_the_post_thumbnail($blog,'thumbnail', array('class' => 'img-fluid')) ?>
		</div>
	</a>
	<div class="blog__single--item-inside">
		<div class="blog__single--item-title row align-items-center">
			<a class="blog-title" href="<?php echo $permalink ?>" title="<?php echo esc_attr($title) ?>"><?php echo $title ?></a>
		</div>
		<div class="blog__single--item-detail"><?php echo apply_filters('the_content', $blog->post_excerpt) ?></div>
		<?php nano_render_partial('partials/nav-seemore', array('permalink' => $permalink, 'title' => $title)) ?>
	</div>
</div>
<?php } ?>