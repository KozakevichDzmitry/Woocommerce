<?php
/**
 * The template for displaying the footer
 */

?>
<footer class="footer">
    <div class="container">
        <div class="footer_wrapper">
            <div class="column1">
                <div class="footer-menu-title-wrapper">
                    <span class="footer-menu-title">CATEGORIES</span></div>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'category',
                        'container' => '',
                        'menu_class' => 'footer-menu-2',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>

                <div class="footer-menu-title-wrapper" style="margin-top: 20px;">
                    <span class="footer-menu-title">SECURE PAYMENTS</span>
                </div>
                <div class="footer_payments">
                    <img class=" lazyloaded" src="wp-content/uploads/2022/08/paypal.png"
                         data-src="/wp-content/themes/dogs/img/paypal.png">
                    <img class=" lazyloaded" src="wp-content/uploads/2022/08/visa.png"
                         data-src="/wp-content/themes/dogs/img/visa.png">
                    <img class=" lazyloaded" src="wp-content/uploads/2022/08/mastercard.png"
                         data-src="/wp-content/themes/dogs/img/mastercard.png">
                    <!--                    --><?php
                    //
                    //                    wp_nav_menu(
                    //                        array(
                    //                            'theme_location' => 'payment',
                    //                            'container' => '',
                    //                            'menu_class' => 'footer-menu-2',
                    //                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    //                        )
                    //                    );
                    //
                    //                    ?>
                </div>
            </div>
            <div class="column2">
                <div class="footer-menu-title-wrapper"><span class="footer-menu-title">INFORMATION</span></div>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'information',
                        'container' => '',
                        'menu_class' => 'footer-menu-2',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>
                <div class="footer-menu-title-wrapper" style="margin-top:20px">
                    <span class="footer-menu-title">FREE SHIPPING <br>ON ALL US ORDERS</span>
                </div>
            </div>
            <div class="column3">
                <div class="footer-menu-title-wrapper"><span class="footer-menu-title">CUSTOMER SERVICE</span></div>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'customer_service',
                        'container' => '',
                        'menu_class' => 'footer-menu-2',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    )
                );
                ?>
            </div>
            <div class="column4">
                    <div class="footer-menu-title-wrapper">
                        <span class="footer-menu-title">STORE</span>
                    </div>
                    <p class="footer-text"><?php echo get_theme_mod('store_text'); ?></p>
                    <div class="footer_phone_wrapper"></div>
                    <p class="footer-text">
                        <span >E-mail: </span>
                        <a class="footer-email" href="mailto:" .<?php echo get_theme_mod('primedog-email'); ?>><?php echo get_theme_mod('primedog-email'); ?></a>
                    </p>
                    <div class="footer-menu-title-wrapper" style="margin-top: 20px;">
                        <span class="footer-menu-title">Primdog in other countries</span>
                    </div>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-2',
                            'container' => '',
                            'menu_class' => 'footer-menu-2 footer-menu-inline',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        )
                    );
                    ?>
            </div>
        </div>
        <div class="footer_copyright">
            <?php
            $response_covid = get_theme_mod('response_covid');
            if (!empty($response_covid)){
            ?>
            <span>
                <strong>PrimDog's Response to COVID-19：</strong>
            <br>
           <?php echo $response_covid;
           } ?>
            </span>
        </div>
        <div class="footer_copyright2"><?php echo get_theme_mod('footer_copyright_text'); ?></div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
