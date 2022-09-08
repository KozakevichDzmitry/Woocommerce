<?php
/**
 * The header for theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="header">
    <div class="container">
        <div class="header_wrapper">
            <div class="header-logo_wrapper"><a href="/" class="header-logo_link">
                    <?php the_custom_logo(); ?>
            </div>
            <button class="menu-toggle" id="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="42" height="42" fill="white"/>
                    <rect x="11" y="14" width="19" height="2" rx="1" fill="#083B66"/>
                    <rect x="9" y="20" width="23" height="2" rx="1" fill="#083B66"/>
                    <rect x="11" y="26" width="19" height="2" rx="1" fill="#083B66"/>
                </svg>
            </button>
            <div class="header-menu_wrapper">
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'container' => '',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'header-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->
            </div>
            <div class="cart__btn">
                <div class="cart_wrapper">
                    <div class="cart_totals2">
                        <span class="amount">
                            <span class="woocommerce-Price-amount amount">
                                <?php
                                if (function_exists('wc_cart_totals_order_total_html')) {
                                    wc_cart_totals_order_total_html();
                                } ?>
                            </span>
                        </span>
                        <span class="count__wrapper">
                            <svg width="33" height="35" viewBox="0 0 40 19" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.2124 2.69589C5.3625 1.72022 6.202 1 7.18914 1H32.8109C33.798 1 34.6375 1.72022 34.7876 2.69589L38.4799 26.6959C38.6663 27.9074 37.7289 29 36.5032 29H3.49683C2.27106 29 1.3337 27.9074 1.52009 26.6959L5.2124 2.69589Z"
                                      fill="none" stroke="#083B66" stroke-width="2"/>
                                <path d="m14,6.83336l0,-11c0,-3.31371 2.68629,-6 6,-6l0,0c3.3137,0 6,2.68629 6,6l0,11"
                                      stroke="#083B66"
                                      stroke-width="2"/>
                            </svg>
                            <span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</header>