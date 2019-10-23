<?php
$store_phone = get_option('woocommerce_store_phone');
$store_address = get_option('woocommerce_store_address');
?>
<div class="swiper-container img-bottom">
        <div class="swiper-wrapper">
            <img class="swiper-slide" src="/wp-content/themes/nanocare/assets/text-bottom.png" alt="">
            <img class="swiper-slide" src="/wp-content/themes/nanocare/assets/text-bottom.png" alt="">
        </div>
    </div>
    <footer class="c-footer">
        <div class="c-footer-top row justify-content-between">
            <div class="footer-number row">
                <?php if( $store_phone ){ ?>
                <img src="/wp-content/themes/nanocare/assets/phone.svg" alt="">
                <span><?php echo $store_phone ?></span>
                <?php } ?>
            </div>
            <?php if( $store_address ){ ?>
            <p class="text-address-mb">ĐỊA CHỈ: <?php echo $store_address ?></p>
            <?php } ?>
            <div class="footer-condition footer-condition-desktop">
	            <?php wp_nav_menu( array(
		            'menu' => 'footermenu',
		            'menu_class' => 'navigation__list row align-self-center',
		            'container' => 'ul'
	            ))
	            ?>
            </div>
            <div class="footer-social">
                <a href="mailto:nanocare.nanosilver@gmail.com">
                    <img src="/wp-content/themes/nanocare/assets/mail.png" alt="">
                </a>
                <a href="https://www.facebook.com/nanocarevnn/" target="_blank" rel="nofollow">
                    <img src="/wp-content/themes/nanocare/assets/fb1.png" alt="">
                </a>
                <a href="https://www.instagram.com/nanocarenanosilver/" target="_blank" rel="nofollow">
                    <img src="/wp-content/themes/nanocare/assets/Insta.png" alt="">
                </a>
            </div>
        </div>
        <div class="footer-condition footer-condition-mb row">
	        <?php wp_nav_menu( array(
		        'menu' => 'footermenu',
		        'menu_class' => 'navigation__list row align-self-center',
		        'container' => 'ul'
	        ))
	        ?>
        </div>
        <div class="c-footer-bottom row justify-content-between">
            <p>2018, all rights reserved Nano-Care</p>
	        <?php if( $store_address ){ ?>
            <p class="text-address-desktop">ĐỊA CHỈ: <?php echo $store_address ?></p>
	        <?php } ?>
            <a href="http://staylab.co/" target="_blank"><img src="<?php echo THEME_URL ?>/assets/stay.png" alt=""></a>
        </div>
    </footer>
    <div id="fb-root"></div>

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '117646518388349',
          cookie     : true,
          xfbml      : true,
          version    : 'v3.2'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));

      function onStart() {
        gapi.load('auth2', function() {
          auth2 = gapi.auth2.init({
            client_id: '492122854164-64t2eu0cqmm11fqj7h6u6aajle5o2jvv.apps.googleusercontent.com',
            scope: 'profile email'
          });
        });
      }
    </script>
    <script src="https://apis.google.com/js/platform.js?onload=onStart" async defer></script>
    <?php wp_footer(); ?>
<!--    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=2291803774425605&autoLogAppEvents=1"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo THEME_URL ?>/dist/vendors.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo THEME_URL ?>/dist/app.js?v=201904151210"></script>
</body>
</html>