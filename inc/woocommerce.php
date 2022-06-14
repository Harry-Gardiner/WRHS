<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package WRHS
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function wrhs_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'wrhs_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function wrhs_woocommerce_scripts()
{
	wp_enqueue_style('wrhs-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('wrhs-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'wrhs_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function wrhs_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'wrhs_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function wrhs_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'wrhs_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('wrhs_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function wrhs_woocommerce_wrapper_before()
	{
?>
		<main id="primary" class="site-main">
		<?php
	}
}
add_action('woocommerce_before_main_content', 'wrhs_woocommerce_wrapper_before');

if (!function_exists('wrhs_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function wrhs_woocommerce_wrapper_after()
	{
		?>
		</main><!-- #main -->
	<?php
	}
}
add_action('woocommerce_after_main_content', 'wrhs_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'wrhs_woocommerce_header_cart' ) ) {
			wrhs_woocommerce_header_cart();
		}
	?>
 */

if (!function_exists('wrhs_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function wrhs_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		wrhs_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'wrhs_woocommerce_cart_link_fragment');

if (!function_exists('wrhs_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function wrhs_woocommerce_cart_link()
	{
	?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'wrhs'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'wrhs'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
		</a>
	<?php
	}
}

if (!function_exists('wrhs_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function wrhs_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php wrhs_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
	<?php
	}
}


// Remove sale tag 
add_filter('woocommerce_sale_flash', 'wr_hide_sale_flash');
function wr_hide_sale_flash()
{
	return false;
}

// Remove add to basket functionality
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20);

// Remove breadcrumbs

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Products page - Make product titles h3
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'wr_change_products_title', 10);
function wr_change_products_title()
{
	echo '<h3 class="woocommerce-loop-product_title">' . get_the_title() . '</h3>';
}

// Add products short description to archive list
// add_action('woocommerce_after_shop_loop_item_title', 'wr_excerpt_in_product_archives', 40);
// function wr_excerpt_in_product_archives()
// {

// 	the_excerpt();
// }

// Add read me button after product
add_action('woocommerce_after_shop_loop_item_title', 'wr_read_more');
function wr_read_more()
{
	global $product;
	if ($product) {
		$url = esc_url($product->get_permalink());
		echo '<a rel="nofollow" href="' . $url . '" class="read_more">Read More</a>';
	}
}

// Woo Price 
add_filter('woocommerce_get_price_html',  'wr_change_product_price_html', 10, 2);

function wr_change_product_price_html($price_html, $product)
{
	global $post;
	$id = !empty($product->get_id()) ? $product->get_id() : $post->ID;

	$regular_price = get_post_meta($id, '_regular_price', true);
	$sale_price = get_post_meta($id, '_sale_price', true);

	if (!empty($regular_price) && !empty($sale_price)) {
		$price_html = 'RRP: £' . $regular_price . ' ' . '<br><strong>Our Price: £' . $sale_price . '</strong>';
	}

	if (empty($regular_price) && !empty($sale_price)) {
		$price_html = '<strong>Our Price: £' . $sale_price . '</strong>';
	}

	if (!empty($regular_price) && empty($sale_price)) {
		$price_html = '<strong>Our Price: £' . $regular_price . '</strong>';
	}

	$price_output = ($price_html == null) ? '<i>Price tbc</i>' : $price_html;

	return $price_output;
}

// Category title - remove original h4 and replace with p tags
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10, 2);
function woocommerce_template_loop_category_title_override($category)
{ ?>
	<p class="woocommerce-loop-category__title">
		<?php
		echo esc_html($category->name); //Update your title which you want to update here
		if ($category->count > 0) {
			echo apply_filters('woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html($category->count) . ')</mark>', $category);
		} ?>
	</p><?php
	}
	add_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title_override', 10);
