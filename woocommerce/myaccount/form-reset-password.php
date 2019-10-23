<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>
    <div class="account__section accordion row">
        <div class="account__section--content account-reset-pass accordion__list--content col-xs-12">
            <div class="content__tab current__tab active forgot_pass">
                <p class="c-title">
                    Lấy lại mật khẩu
                </p>
                <div class="container row justify-content-center">
                    <div class="content__tab active">
                        <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                            <div class="w-360">
                                <label class="text-uppercase" for="password_1"><?php esc_html_e( 'New password', 'woocommerce' ); ?></label> <br>
                                <input type="password" class="w-100" name="password_1" id="password_1" autocomplete="new-password" />
                            </div><br/>
                            <div class="w-360">
                                <label class="text-uppercase" for="password_2"><?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?></label> <br>
                                <input type="password" class="w-100" name="password_2" id="password_2" autocomplete="new-password" />
                            </div><br/>
                            <div class="w-360">
                                <input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
                                <input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />
	                            <?php do_action( 'woocommerce_resetpassword_form' ); ?>
                                <input type="hidden" name="wc_reset_password" value="true" />
                                <button class="button__submit button__comment text-uppercase w-360 button"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>
	                            <?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
