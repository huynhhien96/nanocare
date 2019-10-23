<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$accLink = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
$user = wp_get_current_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if( $_POST['action'] === 'update_user_info' ){

		wp_redirect( $accLink );
//		exit;
    }
    else if( $_POST['action'] === 'change_pass' ){

    }
}

$billing_phone = get_user_meta($user->ID, 'billing_phone', true);
$billing_address = get_user_meta($user->ID, 'billing_address_1', true);
$billing_city = get_user_meta($user->ID, 'billing_city', true);
?>
<div class="account__section customer__section row">
    <div class="account__section--tab col-xs-12">
        <div class="container row justify-content-center nav nav-tabs" id="myTab">
            <div class="tab active">
                <p class="c-detail text-uppercase"><a href="<?php echo $accLink ?>">Thông tin tài khoản</a></p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase"><a href="<?php echo $accLink . 'orders/' ?>">Lịch sử đơn hàng</a></p>
            </div>
        </div>
    </div>
    <div class="account__section--content customer__section--content tab-content col-xs-12">
        <div class="content__tab tab-pane fade active" id="home">
            <div class="container row justify-content-center">
                <div class="content__tab--left col-xs-12 col-md-6">
                    <p class="c-title">Đổi mật khẩu</p>
                    <form class="form__custom row justify-content-end" action="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>" method="post" id="frm-change-pass">
                        <label class="text-uppercase" for="">
                            <p>Mật khẩu cũ</p>
                            <input type="password" name="old_pass" id="old_pass" value=""/>
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Mật khẩu mới</p>
                            <input class="w-360 input-control" name="new_pass" id="new_pass" type="password" value="">
                        </label><br>
                        <div class="col text-center">
                            <input type="hidden" name="email" value="<?php echo $user->user_email ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user->ID ?>">
                            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("nano_change_pass"); ?>">
                            <input type="hidden" name="action" value="change_pass">
                            <button type="submit" class="button__submit button__comment text-uppercase button">Lưu</button>
                        </div>
                    </form>
                </div>
                <div class="content__tab--right col-xs-12 col-md-6">
                    <p class="c-title">Thông tin tài khoản</p>
                    <form class="form__custom" action="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>" method="post" name="userinfo" id="frm-update-user-info">
                        <label class="text-uppercase" for="">
                            <p>Tên của bạn</p>
                            <input class="w-360 input-control" type="text" name="fullname" id="fullname" value="<?php echo $user->display_name ?>">
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Điện thoại</p>
                            <input class="w-360 input-control" type="text" value="<?php echo $billing_phone ?>" name="phone" id="phone" >
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Địa chỉ</p>
                            <input class="w-360 input-control" type="text" name="address" id="address" placeholder="Địa chỉ của bạn" value="<?php echo $billing_address ?>">
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Tỉnh/thành</p>
                            <input class="w-360 input-control" type="text" name="city" id="city" value="<?php echo $billing_city ?>">
                        </label>

                        <div class="col text-center">
                            <input type="hidden" name="email" value="<?php echo $user->user_email ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user->ID ?>">
                            <input type="hidden" name="action" value="update_user_info">
                            <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("nano_update_user_info"); ?>">
                            <button type="submit" class="button__submit button__comment text-uppercase button">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
