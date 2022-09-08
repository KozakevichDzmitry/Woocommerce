<?php
/**
 * The main template file
 */
require_once(__DIR__ . '/component/slider.php');

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>

<main id="primary" class="site-main">
    <section class="top-slider">
        <?php render_top_slider(); ?>
    </section>
    <section class="top-sellers">
        <div class="container">
            <div id="top" class="featured-name">Top Sellers</div>
            <?php
            $post_count = 12;
            $my_posts = get_posts(array(
                'post_type' => 'product',
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'posts_per_page' =>  $post_count,
            ));

            if (count($my_posts) > 0) {
                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');
                $price_count = 0;
                woocommerce_product_loop_start();
                foreach ($my_posts as $post) {
                    $product = wc_get_product( $post->ID );
                    $price_count += $product->get_price();
                    wc_get_template_part('content', 'product');
                 }
                wp_reset_postdata();
                /**
                 * Hook: woocommerce_shop_loop.
                 */
                do_action('woocommerce_shop_loop');

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action('woocommerce_no_products_found');
            }
            ?>
            <div class="show-more"><a href="<?php echo get_permalink( 6 );?>">Show more</a></div>
            <div>
                <span>IP:
                    <?php
                    $client  = @$_SERVER['HTTP_CLIENT_IP'];
                    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                    $remote  = @$_SERVER['REMOTE_ADDR'];

                    if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
                    elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
                    else $ip = $remote;
                    echo $ip;
                    ?>
                </span>
                <span>Средняя стоимость: <?php echo intval($price_count/$post_count);?></span>

            </div>
        </div>
    </section>
</main>
<div class="mini__cart">
    <button class="mini__cart-btn-close" id="miniCartBtnClose">×</button>
    <?php woocommerce_mini_cart([ 'list_class' => 'mini__cart-list' ] );?>
</div>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

get_footer();
?>
</body>