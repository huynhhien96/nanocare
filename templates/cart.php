<?php /* Template Name: Cart */ ?>
<?php get_header(); ?>
<div class="cart__container">
    <div class="modal modal__cart modal__cart--empty">
        <div class="modal__container row justify-content-start">
            <img src="/wp-content/themes/nanocare/assets/bag.svg" alt="">
            <div class="cart--empty-text">
                <h2>Giỏ hàng trống</h2>
                <button class="button__see-more text-uppercase">
                    <a href="">đến trang mua hàng</a>
                </button>
            </div>
        </div>
        <button class="button__close"></button>
    </div>
    <div class="modal modal__cart modal__cart--product">
        <div class="modal__container">
            <div class="modal__cart--section">
                <p class="c-title-4">
                    Giỏ hàng
                </p>
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
                    <p class="c-title-2">Tạm tính</p>
                    <p class="c-title-4 cart-amount">1.760.000 đ</p>
                </div>
                <div class="cart__footer--row cart__footer--row-checkout row align-items-center">
                    <button class="button__checkout text-uppercase">
                        Thanh toán
                    </button>
                </div>
            </div>
        </div>
        <button class="button__close"></button>
    </div>
</div>
<?php get_footer(); ?>