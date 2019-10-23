<?php /* Template Name: Partner Ads */ ?>
<?php get_header(); ?>
<div class="account__section accordion">
    <div class="account__section--tab accordion__list">
        <div class="container row justify-content-center">
            <div class="tab active">
                <p class="c-detail text-uppercase">Chiết khấu - khuyến mãi</p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase">Bảng giá sỉ</p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase">Bài viết quảng cáo</p>
            </div>
        </div>
    </div>
    <div class="account__section--content accordion__list--content">
        <div class="content__tab active">
            <p class="c-title">
                Tạo tài khoản mới
            </p>
            <div class="container row justify-content-center">
                <div class="content__tab--left col-5">
                    <button class="button__social text-uppercase btn-blue button-facebook">
                        <a class="row" href="">Đăng nhập bằng facebook</a>
                    </button>
                    <button class="button__social text-uppercase btn-orange button-google">
                        <a class="row" href="">Đăng nhập bằng Google</a>
                    </button>
                </div>
                <div class="content__tab--right col-6">
                    <form action="">
                        <label class="text-uppercase" for="">Tên của bạn</label> <br>
                        <input class="w-360" type="text"> <br>
                        <label class="text-uppercase" for="">Địa chỉ email</label> <br>
                        <input class="w-360" type="text" placeholder="Email của bạn"> <br>
                        <label class="text-uppercase" for="">tạo Mật khẩu</label> <br>
                        <input class="w-360" type="text" placeholder="Mật khẩu ít nhất 6 kí tự "> <br>
                        <div class="custom-control custom-checkbox">
                            <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                            <label class="label-checkbox row align-items-center" for="styled-checkbox-1">
                                <span>Đồng ý về <a class="specical" href="">Quy định - Điều khoản</a> của Nano-Care</span>
                            </label>
                        </div>
                        <button class="button__submit button__comment text-uppercase w-360 button">Tạo tài khoản mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content__tab">
            <p class="c-title">
                Đăng nhập bằng tài khoản đã tạo
            </p>
            <div class="container row justify-content-center">
                <div class="content__tab--left col-5">
                    <button class="button__social text-uppercase btn-blue button-facebook">
                        <a class="row" href="">Đăng nhập bằng facebook</a>
                    </button>
                    <button class="button__social text-uppercase btn-orange button-google">
                        <a class="row" href="">Đăng nhập bằng Google</a>
                    </button>
                </div>
                <div class="content__tab--right col-6">
                    <form action="">
                        <label class="text-uppercase" for="">Địa chỉ email</label> <br>
                        <input class="w-360" type="text" placeholder="Email của bạn"> <br>
                        <label class="text-uppercase" for="">Mật khẩu</label> <br>
                        <input class="w-360" type="text" placeholder="Mật khẩu ít nhất 6 kí tự "> <br>
                        <div class="custom-control custom-checkbox">
                            <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                            <label class="label-checkbox row align-items-center" for="styled-checkbox-1">
                                <span>Lưu mật khẩu</span>
                            </label>
                        </div>
                        <button class="button__submit button__comment text-uppercase w-360 button">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="content__tab">
            <div class="blog__single row justify-content-between">
                <?php
                while (have_posts()): the_post();
                    $permalink = get_the_permalink();
                    $title = get_the_title();
                ?>
                <div class="col-6 blog__single--item">
                    <a href="<?php echo $permalink ?>">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')) ?>
                    </a>
                    <div class="blog__single--item-inside">
                        <div class="blog__single--item-title">
                            <a href="<?php echo $permalink ?>" title="<?php echo esc_attr($title) ?>"><?php echo $title ?></a>
                        </div>
                        <div class="blog__single--item-detail"><?php the_excerpt() ?></div>
                        <?php nano_render_partial('partials/nav-seemore', array('permalink' => $permalink, 'title' => $title)) ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>