<?php /* Template Name: Bi Quyet Lam Dep */ ?>
<?php
get_header(); ?>
<?php
$stickyPost = null;
$sticky = get_option( 'sticky_posts' );
if( !empty($sticky) ) {
	$stickyPosts = new WP_Query( 'p=' . $sticky[0] );
	$stickyPost = empty($stickyPosts->posts)?null: $stickyPosts->posts[0];
}
if($stickyPost):
	$stickyPost_permalink = get_permalink($stickyPost);
	$stickyPostRelated = get_field('blog_related_blogs', $stickyPost->ID);
?>
<div class="c-cover blog__cover">
    <img class="w-100" src="/wp-content/themes/nanocare/assets/cover-blog.png" alt="">
    <div class="blog__cover-content">
        <h2 class="blog__cover-content--title"><a href="<?php echo $stickyPost_permalink ?>" title="<?php echo esc_attr($stickyPost->post_title) ?>"><?php echo $stickyPost->post_title ?></a></h2>
        <p class="blog__cover-content--detail"><?php echo $stickyPost->post_excerpt ?></p>
        <div class="button__blog row justify-content-center align-items-center">
            <a href="<?php echo $stickyPost_permalink ?>" class="button__blog--item text-uppercase">Đọc tiếp</a>
            <div class="button__blog--item button__blog--social row">
                <a class="mail-icon flex-center" target="_blank" href="mailto:?Subject=<?php echo esc_attr($stickyPost->post_title) ?>&body=<?php echo esc_url($stickyPost_permalink) ?>">
                    <img src="/wp-content/themes/nanocare/assets/mail2.png" alt="">
                </a>
                <a class="facebook-icon flex-center" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($stickyPost_permalink) ?>">
                    <img src="/wp-content/themes/nanocare/assets/fb2.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <?php if( $stickyPostRelated){ ?>
        <div class="blog__cover-list">
            <?php foreach ($stickyPostRelated as $stickyRelated){ ?>
            <p><a href="<?php echo get_permalink($stickyRelated) ?>" title="<?php echo esc_attr($stickyRelated->post_title) ?>"><?php echo $stickyRelated->post_title ?></a></p>
            <?php } ?>
        </div>
    <?php } ?>
</div>
<?php endif; ?>
<?php if(have_posts()): ?>
<div class="blog__single row justify-content-between">
    <?php
    while (have_posts()): the_post();
	    $permalink = get_the_permalink();
	    $title = get_the_title();
	    nano_render_partial('partials/content-single', array('blog' => $post, 'cls' => 'col-md-6 col-xs-12'));
    endwhile; ?>
</div>
<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); ?>
<?php endif; ?>
<?php get_footer(); ?>
