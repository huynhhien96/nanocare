<?php /* Template Name: Checkout */ ?>
<?php get_header(); ?>
<div class="checkout__wrapper row justify-content-between w-1440">
    <div class="checkout__wrapper-left">
        <div class="container">
            <div class="checkout-header row justify-content-start align-items-center">
                <h2 class="c-title-4">Thông tin giao hàng</h2>
                <p>Bạn đã có tài khoản? <a href="">Vui lòng Đăng nhập</a></p>
            </div>
            <form class="checkout-container row justify-content-between">
                <label class="input-text text-name text-uppercase" for="name">
                    <p>Tên của bạn</p>
                    <input type="text" name="" id="name">
                </label>
                <label class="input-text phone-number text-uppercase" for="number">
                    <p>Điện thoại</p>
                    <input type="number" name="" id="number" placeholder="Số điện thoại di dộng">
                </label>
                <label class="input-text address-text text-uppercase" for="">
                    <p>Địa chỉ giao hàng</p>
                    <input type="text" placeholder="Số nhà, (tòa nhà), tên đường, phường">
                </label>
                <label class="input-text select-box select-city text-uppercase" for="">
                    <p>Tỉnh/thành</p>
                    <select name="" id="">
                        <option value="" hidden disabled selected style="font-size: 12px;">Chọn tỉnh /thành</option>
                        <option value="">TPHCM</option>
                        <option value="">Ha Noi</option>
                    </select>
                </label>
                <label class="input-text select-box select-district text-uppercase" for="">
                    <p>quận/huyện</p>
                    <select name="" id="" placeholder="Chọn quận/huyện">
                        <option value="" hidden disabled selected style="font-size: 12px;">Chọn quận/huyện</option>
                        <option value="">Phu Nhuan</option>
                        <option value="">Tan Binh</option>
                    </select>
                </label>
                <label class="input-text select-box select-ward text-uppercase" for="">
                    <p>Phường/xã</p>
                    <select name="" id="" placeholder="Chọn phường/xã">
                        <option value="" hidden disabled selected style="font-size: 12px;">Chọn phường/xã</option>
                        <option value="">1</option>
                        <option value="">2</option>
                    </select>
                </label>
                <div class="form__payment">
                    <p class="title-form text-uppercase">Hình thức thanh toán</p>
                    <div class="form__payment--type">
                        <div class="radio-box row justify-content-start align-items-start" for="">
                            <div class="radio">
                                <input id="radio-1" name="radio" type="radio" checked>
                                <label for="radio-1" class="radio-label"></label>
                            </div>
                            <label class="form__payment--type-text" for="transfer">
                                <h3>Chuyển khoản qua ngân hàng </h3>
                                Ngân Hàng Vietcombank - Chi nhánh <br>
                                Tên Tài Khoản: <br>
                                Số Tài Khoản: <br>
                                Quý khách khi chuyển khoản vui lòng gửi lời nhắn (note) với nội dung: “Tên người gửi + Số điện thoại" <br>
                                Hoặc liên hệ chúng tôi qua hotline: 070 666 9239 <br>
                                Cảm ơn quý khách.
                            </label>
                        </div>
                        <div class="radio-box row justify-content-start align-items-start" for="">
                            <div class="radio">
                                <input id="radio-2" name="radio" type="radio">
                                <label for="radio-2" class="radio-label"></label>
                            </div>
                            <label class="form__payment--type-text" for="cash">
                                <h3>Thanh toán khi nhận hàng (COD)</h3>
                                Hình thức thanh toán khi giao hàng (COD) trong vòng 1 - 2 ngày đối với các đơn hàng trong khu vực thành phố Hồ Chí Minh. Đối với các khu vực hình thức thanh toán khi giao hàng (COD) sẽ được thực hiện qua bưu điện tùy theo từng khu vực.
                            </label>
                        </div>
                    </div>
                </div>
                <button class="button__checkout">
                    Hoàn tất đơn hàng
                </button>
            </form>
        </div>
        <div class="logo-page__checkout">
            <a href="">
                <img src="/wp-content/themes/nanocare/assets/logo.png" alt="">
            </a>
        </div>
    </div>
    <div class="checkout__wrapper-right">
        <div class="modal modal__cart">
            <div class="modal__container">
                <div class="modal__cart--section">
                    <div class="modal__cart--product-selection">
                        <div class="cart-item row justify-content-start">
                            <div class="cart-item__img">
                                <img src="/wp-content/themes/nanocare/assets/group.png" alt="">
                            </div>
                            <div class="cart-item__summary">
                                <h2 class="c-title-5">
                                    Nano-Care Nano Silver 50ml
                                </h2>
                                <p>760.000 đ</p>
                                <div class="button__quanity row">
                                    <input type="button" value="-" class="quanity button-minus" data-field="quantity">
                                    <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field quanity__text">
                                    <input type="button" value="+" class="quanity button-plus" data-field="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="cart-item row justify-content-start">
                            <div class="cart-item__img">
                                <img src="/wp-content/themes/nanocare/assets/group.png" alt="">
                            </div>
                            <div class="cart-item__summary">
                                <h2 class="c-title-5">
                                    Nano-Care Nano Silver 50ml
                                </h2>
                                <p>760.000 đ</p>
                                <div class="button__quanity row">
                                    <input type="button" value="-" class="quanity button-minus" data-field="quantity">
                                    <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field quanity__text">
                                    <input type="button" value="+" class="quanity button-plus" data-field="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart__footer">
                    <div class="cart__footer--row cart__footer--row-amount row align-items-center justify-content-between">
                        <label class="text-uppercase number__voucher" for="voucher">
                            <span>Mã giảm giá </span> <br>
                            <input type="text" placeholder="Điền mã giảm giá">
                        </label>
                        <button class="button__submit text-uppercase">
                            Sử dụng
                        </button>
                    </div>
                    <div class="cart__footer--row cart__footer--row-amount row align-items-center justify-content-between">
                        <p class="row justify-content-between w-100">
                            <span class="price-text">Tạm tính</span>
                            <span class="price-number">1.760.000 đ</span>
                        </p>
                        <p class="row justify-content-between w-100">
                            <span class="price-text">Phí vận chuyển</span>
                            <span class="price-number">20.000 đ</span>
                        </p>
                    </div>
                    <div class="cart__footer--row cart__footer--row-amount row align-items-center justify-content-between">
                        <p class="c-title-2">Tổng cộng</p>
                        <p class="c-title-4 cart-amount">1.760.000 đ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>