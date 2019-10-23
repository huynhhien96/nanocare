<?php /* Template Name: Account - Login */ ?>
<?php
if( is_user_logged_in() ) wp_redirect('/');
get_header(); ?>
	<div class="account__section accordion row">
		<div class="account__section--tab accordion__list col-xs-12">
			<div class="container row justify-content-center">
				<div class="tab">
					<p class="c-detail text-uppercase"><a href="<?php echo wp_registration_url() ?>">Tạo tài khoản</a></p>
				</div>
				<div class="tab active">
					<p class="c-detail text-uppercase"><a href="<?php echo wp_login_url() ?>">Đăng nhập</a></p>
				</div>
				<div class="tab">
					<p class="c-detail text-uppercase"><a href="<?php echo wp_lostpassword_url() ?>">Quên mật khẩu</a></p>
				</div>
			</div>
		</div>
		<div class="account__section--content accordion__list--content col-xs-12">
			<div class="content__tab active">
				<p class="c-title">Đăng nhập bằng tài khoản đã tạo</p>
				<div class="container row justify-content-center">
					<div class="content__tab--left col-xs-12 col-md-5">
						<?php get_template_part('partials/social', 'login') ?>
					</div>
					<div class="content__tab--right col-xs-12 col-md-6">
						<form id="frm-login" method="post" action="<?php echo admin_url( 'admin-ajax.php' ) ?>">
                            <div class="form-control">
								<input type="hidden" name="action" value="action_login">
								<input type="hidden" name="nonce" value="<?php echo wp_create_nonce("nano_login"); ?>">
							</div>
							<div class="form-control">
								<label class="text-uppercase" for="">Địa chỉ email</label>
								<input class="w-360" name="email" id="email" type="text" placeholder="Email của bạn">
							</div>
							<div class="form-control">
								<label class="text-uppercase" for="">Mật khẩu</label> <br>
								<input class="w-360" type="password" id="pass" name="pass" placeholder="Mật khẩu ít nhất 6 kí tự ">
							</div>
							<div class="custom-control custom-checkbox">
								<input class="styled-checkbox" id="isremember" name="isremember" type="checkbox" value="1">
								<label class="label-checkbox row align-items-center" for="isremember">
									<span>Lưu mật khẩu</span>
								</label>
							</div>
							<button type="submit" class="button__submit button__comment text-uppercase w-360 button">Đăng nhập</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>