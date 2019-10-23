<?php /* Template Name: Home Page 2  */ ?>
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
                <h2 class="c-title-4 text-align-center">Sản phẩm của NanoCare</h2>
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
<div class="customer-preview">
    <h2 class="c-title">Phản hồi của khách hàng</h2>
    <div class="customer-preview--container">
        <div class="customer-preview--list row justify-content-between">
            <div class="customer-preview--item col-6">
                <img class="img-comma" src="/wp-content/themes/nanocare/assets/group9.svg" alt="">
                <p class="comment">Due to a deep concern for our endangered environment and the many animals at risk, Chantecaille has always reached out to its customers through its products and coverage in the press on these universally relevant issues. A key impetus for creating the company was a strong desire to establish a platform with the power to draw attention to important issues of global sustainability, and to fund a foundation that could support related initiatives.</p>
                <div class="p-customer row justify-content-start">
                    <div class="customer-avatar">
                        <img class="avatar" src="/wp-content/themes/nanocare/assets/group10.png" alt="">
                    </div>
                    <div class="p-preview">
                        <h4 class="name-customer">An Nguyen</h4>
                        <p>hiệu quả sau khi dùng 6 tháng</p>
                    </div>
                </div>
            </div>
            <div class="customer-preview--item col-6">
                <img class="img-comma" src="/wp-content/themes/nanocare/assets/group9.svg" alt="">
                <p class="comment">Due to a deep concern for our endangered environment and the many animals at risk, Chantecaille has always reached out to its customers through its products and coverage in the press on these universally relevant issues. A key impetus for creating the company was a strong desire to establish a platform with the power to draw attention to important issues of global sustainability, and to fund a foundation that could support related initiatives.</p>
                <div class="p-customer row justify-content-start">
                    <div class="customer-avatar">
                        <img class="avatar" src="/wp-content/themes/nanocare/assets/group10.png" alt="">
                    </div>
                    <div class="p-preview">
                        <h4 class="name-customer">An Nguyen</h4>
                        <p>hiệu quả sau khi dùng 6 tháng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>