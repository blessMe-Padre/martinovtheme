<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
$attributes = get_attributes(array(
	'attributes_include' => array('brend', 'obvem'),
	'attributes_orderby' => 'include'
));

$args = array(
	'post_type' => 'product',
	'numberposts' => -1,
);

$tax = array(
	array(
		'taxonomy' => 'product_cat',
		'field' => 'term_id',
		'terms' => get_queried_object_id(),
	),
);

if (isset($_GET['brend'])) {
	$colors = json_decode(stripslashes($_GET['brend']), true);

	if (!is_array($colors)) {
		$colors = array($colors);
	}

	$tax[] = array(
		'taxonomy' => 'pa_brend',
		'field' => 'id',
		'terms' => $colors,
		'operator' => 'IN'
	);
}

if (isset($_GET['obvem'])) {
	$country = json_decode(stripslashes($_GET['obvem']), true);

	if (!is_array($country)) {
		$country = array($country);
	}

	$tax[] = array(
		'taxonomy' => 'pa_obvem',
		'field' => 'id',
		'terms' => $country,
		'operator' => 'IN'
	);
}

$args['tax_query'] = $tax;

if (isset($_GET['nav_page'])) {
	$args['paged'] = $_GET['nav_page'];
}


$products = new WP_Query($args);

get_header('shop');
echo '<div class="container"';
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
// do_action('woocommerce_shop_loop_header');

$current_category = get_queried_object();
if (is_product_category() && $current_category) {
	$parent_id = $current_category->parent;
	$children = get_term_children($current_category->term_id, 'product_cat');
	if (!empty($children)) {
		$current_title = single_cat_title('', false);
		echo '<h1 class="category-new-main-title">' . $current_title . '</h1>';
	}
}

if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */

	if (is_product_category() && $current_category) {

		$parent_id = $current_category->parent;
		$has_no_children = empty(get_term_children($current_category->term_id, 'product_cat'));
		$current_title = single_cat_title('', false);
		$parent_category_title = get_term_by('id', $parent_id, 'product_cat');
		if ($parent_category_title) {
			$parent_category_title_name = $parent_category_title->name;
		} else {
			$parent_category_title_name = '';
		}


		if ($parent_id != 0 && $has_no_children) {
			echo '<div class="brands-header-section">';
			echo '<div class="brands-header-item brands-header-item-blur">';

			$thumbnail_id = get_term_meta($current_category->term_id, 'thumbnail_id', true);

			$image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/img/brand-placeholder.webp';
			echo '<img class="brands-header-item-img blur" src="' . esc_url($image_url) . '" width="300px" height="600" alt="' . esc_attr($current_category->name) . '">';

			if ($current_title) {
				echo '<div class="brand-description-title">' . $current_title . '</div>';
			}
			echo '<div class="border-left-block border-left-block-brand"></div>';

			$brand_description = get_field('brand__description', 'product_cat_' . $current_category->term_id);
			if (!empty($brand_description)) {
				echo '<div class="brand-description">' . $brand_description . '</div>';
			}
			echo '</div>';

			echo '<div class="brands-header-item brands-header-item-mobile">';
			$image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : get_template_directory_uri() . '/img/brand-placeholder.webp';
			echo '<img class="brands-header-item-img" src="' . esc_url($image_url) . '" width="300px" height="600" alt="' . esc_attr($current_category->name) . '">';
			echo '</div>';
			echo '</div>';
		}
	}



	echo '<h1 class="category-new-main-title">' . $parent_category_title_name . '</h1>';
	// меню	
	wp_nav_menu([
		'theme_location' => 'brands',
		'container' => 'ul',
		'menu_class' => 'brands-list',
		'menu_id' => ''
	]);
	?>

	<div class="products-filter-wrapper">
		<button class="product-filter-btn">
			<svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M19.2651 14.4095H11.5187C11.3138 13.7877 10.928 13.2481 10.415 12.8661C9.90213 12.484 9.28773 12.2785 8.65755 12.2783C7.32355 12.2783 6.21955 13.1711 5.80555 14.4095H4.44395C3.93795 14.4095 3.52395 14.8415 3.52395 15.3695C3.52395 15.8975 3.93795 16.3295 4.44395 16.3295H5.75955C6.12755 17.6543 7.27755 18.6239 8.66675 18.6239C10.0559 18.6239 11.1967 17.6543 11.5647 16.3295H19.2651C19.7711 16.3295 20.1851 15.8975 20.1851 15.3695C20.1851 14.8415 19.7711 14.4095 19.2651 14.4095ZM8.66675 16.7039C8.00435 16.7039 7.47075 16.1471 7.47075 15.4463C7.47075 14.7455 8.00435 14.1983 8.66675 14.1983C9.32915 14.1983 9.86275 14.7551 9.86275 15.4559C9.86275 16.1567 9.32915 16.7039 8.66675 16.7039ZM4.38875 8.65911H11.0219C11.4175 10.0511 12.6319 11.0687 14.0947 11.0687C15.5575 11.0687 16.7627 10.0511 17.1675 8.65911H19.2099C19.7159 8.65911 20.1299 8.22711 20.1299 7.69911C20.1299 7.17111 19.7159 6.73911 19.2099 6.73911H17.1675C16.7719 5.35671 15.5483 4.33911 14.0947 4.33911C12.6411 4.33911 11.4267 5.35671 11.0311 6.73911H4.38875C3.88275 6.73911 3.46875 7.17111 3.46875 7.69911C3.46875 8.22711 3.88275 8.65911 4.38875 8.65911ZM14.0947 6.25911C14.8583 6.25911 15.4747 6.90231 15.4747 7.70871C15.4747 8.51511 14.8583 9.14871 14.0947 9.14871C13.3311 9.14871 12.7147 8.50551 12.7147 7.69911C12.7147 6.89271 13.3311 6.25911 14.0947 6.25911Z"
					fill="white" />
			</svg>
			<span>Фильтры</span>
		</button>

		<div class="instock-filter">
			<div class="toggle-button">
				<input type="checkbox" name="" id="toggle-button">
				<label for="toggle-button"></label>
			</div>
			<span>В наличии</span>
		</div>
	</div>

	<?php
	echo '<div class="woo-page-wrapper">';
	echo '<div class="left">';
	?>
	<div class="filter_panel-wrapper">
		<div class="filter_panel-button">
			<svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M0.46967 5.96967C0.176777 6.26256 0.176777 6.73744 0.46967 7.03033L5.24264 11.8033C5.53553 12.0962 6.01041 12.0962 6.3033 11.8033C6.59619 11.5104 6.59619 11.0355 6.3033 10.7426L2.06066 6.5L6.3033 2.25736C6.59619 1.96447 6.59619 1.48959 6.3033 1.1967C6.01041 0.903806 5.53553 0.903806 5.24264 1.1967L0.46967 5.96967ZM17 5.75H1V7.25H17V5.75Z"
					fill="#9799A0" />
			</svg>
			<span>Фильтр</span>
		</div>
	</div>
	<?php
	echo '<div class="filter_panel">';
	?>

	<ul class="filters">
		<?php foreach ($attributes as $atribute) { ?>
			<li class="filter">
				<div class="filter__title"><?php echo $atribute['attribute_label']; ?></div>
				<ul class="filter__content">
					<?php
					foreach ($atribute['attribute_terms'] as $term) {
						if (isset($_GET[$atribute['attribute_name']])) {
							$data = json_decode(stripslashes($_GET[$atribute['attribute_name']]), true);
							if (!is_array($data)) {
								$data = array($_GET[$atribute['attribute_name']]);
							}
						}
						?>
						<li>
							<input type="checkbox" name="<?php echo $atribute['attribute_name']; ?>"
								value="<?php echo $term->term_id; ?>" <?php echo (isset($data) && in_array($term->term_id, $data)) ? ' checked' : ''; ?> /><?php echo $term->name; ?>
						</li>
						<?php
					}
					?>
				</ul>
			</li>
		<?php } ?>
	</ul>
	<?php

	echo '<!-- Тут рисуешь фильтры -->';
	echo '<div class="filter_buttons">';
	echo '<div id="filter_submit" class="button">Применить</div>';
	echo '<div id="filter_reset" class="button">Сбросить</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	echo '<div class="right">';
	// do_action('woocommerce_before_shop_loop');

	woocommerce_product_loop_start();

	// if (wc_get_loop_prop('total')) {
	// 	while (have_posts()) {
	// 		the_post();

	// 		/**
	// 		 * Hook: woocommerce_shop_loop.
	// 		 */
	// 		do_action('woocommerce_shop_loop');

	// 		wc_get_template_part('content', 'product');
	// 	}
	// }

	if ($products->have_posts()) {
		// var_dump($products->have_posts());
		while ($products->have_posts()) {
			$products->the_post();
			// var_dump('1');
			// /**
			//  * Hook: woocommerce_shop_loop.
			//  */
			// do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	// do_action('woocommerce_after_shop_loop');
	echo '</div>';

} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action('woocommerce_sidebar');

get_footer('shop');
