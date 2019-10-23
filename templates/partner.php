<?php /* Template Name: Partner */ ?>
<?php get_header(); ?>
<div class="account__section customer__section accordion">
    <div class="account__section--tab accordion__list">
        <div class="container row justify-content-center">
            <div class="tab active">
                <p class="c-detail text-uppercase">Tạo tài khoản</p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase">Đăng Nhập</p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase">Quên mật khẩu</p>
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
                Đăng nhập (dành cho ĐỐI TÁC)
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
        <div class="content__tab forgot_pass">
            <p class="c-title">
                Quên mật khẩu
            </p>
            <div class="container row justify-content-center">
                <div class="content__tab--right col-6">
                    <form class="text-align-center" action="">
                        <label class="text-uppercase" for="">Địa chỉ email</label> <br>
                        <input class="w-100" type="text" placeholder="Email của bạn"> <br>
                        <p class="text-noti c-detail">
                            Nano-Care sẽ gửi mail chứa link reset mật khẩu về email của bạn, vui lòng kiểm tra hộp thư spam nếu không tìm thấy mail.
                        </p>
                        <button class="button__submit button__comment text-uppercase w-360 button">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>