<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;
?>
    <div class="account__section accordion row">
        <div class="account__section--tab accordion__list col-xs-12">
            <div class="container row justify-content-center">
                <div class="tab">
                    <p class="c-detail text-uppercase"><a href="<?php echo wp_registration_url() ?>">Tạo tài khoản</a></p>
                </div>
                <div class="tab">
                    <p class="c-detail text-uppercase"><a href="<?php echo wp_login_url() ?>">Đăng nhập</a></p>
                </div>
                <div class="tab active">
                    <p class="c-detail text-uppercase"><a href="<?php echo wp_lostpassword_url() ?>">Quên mật khẩu</a></p>
                </div>
            </div>
        </div>
        <div class="account__section--content accordion__list--content col-xs-12">
            <div class="content__tab current__tab active forgot_pass">
                <p class="c-title">
                    Quên mật khẩu
                </p>
                <div class="container row justify-content-center">
                    <div class="content__tab active col-6">
                        <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                            <label class="text-uppercase" for="">Địa chỉ email</label> <br>
                            <input class="w-100" type="text" name="user_login" id="user_login" placeholder="Email của bạn" autocomplete="username" /><br>
                            <p class="text-noti c-detail">
                                Nano-Care sẽ gửi mail chứa link reset mật khẩu về email của bạn, vui lòng kiểm tra hộp thư spam nếu không tìm thấy mail.
                            </p>
	                        <?php do_action( 'woocommerce_lostpassword_form' ); ?>
                            <input type="hidden" name="wc_reset_password" value="true" />
                            <button class="button__submit button__comment text-uppercase w-360 button"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
	                        <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
