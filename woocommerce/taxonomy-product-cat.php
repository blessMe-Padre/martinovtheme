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

	echo '<div class="woo-page-wrapper">';
	echo '<div class="left">';

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
