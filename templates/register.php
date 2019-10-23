<?php /* Template Name: Account - Register */ ?>
<?php
if ( is_user_logged_in() ) {
	wp_redirect( '/' );
}
get_header(); ?>
<div class="account__section accordion row">
    <div class="account__section--tab accordion__list col-xs-12">
        <div class="container row justify-content-center">
            <div class="tab active">
                <p class="c-detail text-uppercase"><a href="<?php echo wp_registration_url() ?>">Tạo tài khoản</a>
                </p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase"><a href="<?php echo wp_login_url() ?>">Đăng nhập</a></p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase"><a href="<?php echo wp_lostpassword_url() ?>">Quên mật khẩu</a>
                </p>
            </div>
        </div>
    </div>
    <div class="account__section--content accordion__list--content col-xs-12">
        <div class="content__tab active">
            <p class="c-title">Tạo tài khoản mới</p>
            <div class="container row justify-content-center">
                <div class="content__tab--left col-xs-12 col-md-5">
	                <?php get_template_part('partials/social', 'login') ?>
                </div>
                <div class="content__tab--right col-xs-12 col-md-6">
                    <form id="frm-register" method="post" action="<?php echo admin_url( 'admin-ajax.php' ) ?>">
                        <input type="hidden" name="action" value="action_register">
                        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("nano_register"); ?>">
                        <div class="form-control">
                            <label class="text-uppercase" for="fullname">Tên của bạn</label>
                            <input class="w-360" type="text" name="fullname" id="fullname">
                        </div>
                        <div class="form-control">
                            <label class="text-uppercase" for="email">Địa chỉ email</label>
                            <input class="w-360" type="text" name="email" id="email" placeholder="Email của bạn">
                        </div>
                        <div class="form-control">
                            <label class="text-uppercase" for="pass">Tạo Mật khẩu</label>
                            <input class="w-360" type="password" name="pass" id="pass" placeholder="Mật khẩu ít nhất 6 kí tự ">
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="styled-checkbox" id="isargee" name="isargee" type="checkbox" value="1">
                            <label class="label-checkbox row align-items-center" for="isargee">
                                <span>Đồng ý về <a class="specical" href="">Quy định - Điều khoản</a> của Nano-Care</span>
                            </label>
                        </div>
                        <button type="submit" class="button__submit button__comment text-uppercase w-360 button">Tạo tài khoản mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>