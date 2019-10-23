<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL ?>/dist/vendor.css?v=201904082310">
    <link rel="stylesheet" type="text/css" href="<?php echo THEME_URL ?>/dist/theme.css?v=201904162017">
</head>
<body <?php body_class(); ?>>
    <header class="c-header row align-items-center justify-content-between">
        <div class="logo-page">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo THEME_URL ?>/assets/logo.png" alt=""></a>
        </div>
        <div class="navigation row">
            <div class="hamburger-button">
                <div class="line line-1"></div>
                <div class="line line-2"></div>
                <div class="line line-3"></div>
            </div>
            <div class="nav-content">
                <div class="nav-login-mb row">
                    <img src="<?php echo THEME_URL ?>/assets/personal.svg" alt="">
                    <?php if( is_user_logged_in() ){ $user = wp_get_current_user(); ?>
                        <div class="login-success active row">
                            <a class="name-user" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo $user->display_name ?></a>
                        </div>
                    <?php }else{ ?>
                        <div class="nav-login-mb--text login-success active row">
                            <a class="item--text" href="<?php echo wp_login_url() ?>">Đăng nhập</a>
                            <a href="<?php echo wp_registration_url() ?>">Tạo tài khoản</a>
                        </div>
                    <?php } ?>
                </div>
                <?php wp_nav_menu( array(
                    'menu' => 'mainmenu',
                    'menu_class' => 'navigation__list row align-self-center',
                    'container' => 'ul'
                    ))
                ?>
            </div>
        </div>
        <div class="cart row align-items-center">
            <?php if( is_user_logged_in() ){ $user = wp_get_current_user();?>
            <div class="login-success active row">
                <img src="<?php echo THEME_URL ?>/assets/personal-2.svg" alt="">
                <a class="name-user"><?php echo $user->display_name ?></a>
                <div class="sub-menu">
                    <a class="row align-items-center" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Thông tin tài khoản</a>
                    <a class="logout-user row align-items-center" href="<?php echo wp_logout_url( home_url() ); ?>">Đăng xuất</a>
                </div>
            </div>
            <?php }else{ ?>
            <span class="login text-uppercase"><a href="<?php echo wp_login_url() ?>">Đăng Nhập</a></span>
            <?php } ?>
            <a href="<?php echo wc_get_cart_url(); ?>" class="cart-list row align-items-center text-uppercase">
                <img src="<?php echo THEME_URL ?>/assets/cart.svg" alt="Cart">
                <span class="cart-text">Giỏ Hàng</span>
                <span class="cart-number"><span><?php echo WC()->cart->get_cart_contents_count() ?></span></span>
            </a>
            <div class="add-to-cart-success">
                <span class="close-success">
                    <i class="fas fa-times"></i>
                </span>
                <p class="text">
                    <i class="fas fa-check-circle"></i> Thêm vào giỏ hàng thành công
                </p>
                <a href="<?php echo wc_get_cart_url(); ?>" class="btn-view-cart">Xem giỏ hàng và thanh toán</a>
            </div>
        </div>
    </header>