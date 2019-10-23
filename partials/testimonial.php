<?php
$listTestimonial = get_posts(array(
    'post_type' => 'testimonial',
));
if( !empty($listTestimonial) ){
?>
<div class="customer-preview">
	<h2 class="c-title">Phản hồi của khách hàng</h2>
	<div class="customer-preview--list row justify-content-between">
        <?php foreach ($listTestimonial as $testimonial){
            $thumbnail_id = get_post_thumbnail_id($testimonial);
	        $url = wp_get_attachment_image($thumbnail_id,'thumbnail');
        ?>
		<div class="customer-preview--item col-6">
            <img class="img-comma" src="/wp-content/themes/nanocare/assets/group9.svg" alt="">
			<div class="comment"><?php echo apply_filters('the_content', $testimonial->post_excerpt) ?></div>
			<div class="p-customer row justify-content-start">
                <div class="customer-avatar">
				<?php echo wp_get_attachment_image($thumbnail_id,'thumbnail', array('class'=> 'avatar'));?>
                </div>
				<div class="p-preview">
					<h4 class="name-customer"><?php echo get_field('testimonial_fullname', $testimonial->ID) ?></h4>
					<p><?php echo $testimonial->post_title ?></p>
				</div>
			</div>
		</div>
        <?php } ?>
	</div>
</div>
<?php } ?>