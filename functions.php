<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );


// Voordelen prijsmodel
function prijs_voordelen_shortcode() {
    ob_start();
?>

    <ul>
        <?php while (has_sub_field('voordelen')) : ?>
            <li class="mq-prijsmodel">
                <span class="green-checkmark">&#10004;</span>
                <?php echo get_sub_field('voordeel'); ?>
            </li>
        <?php endwhile; ?>
    </ul>

<?php
    return ob_get_clean();
}

add_shortcode('mq_prijs_voordelen', 'prijs_voordelen_shortcode');


// Blog category shortcode
function mq_blog_category_shortcode() {
    ob_start();

    ?>
    <span class="mq-category">
        <?php
        $categories = get_the_category();
        if (!empty($categories)) {
            $primary_category = $categories[0]->name;
            echo esc_html($primary_category);
        }
        ?>
    </span>
    <?php

    return ob_get_clean();
}

add_shortcode('mq_blog_category', 'mq_blog_category_shortcode');

// Blog category shortcode
function mq_bel_process() {
    ob_start();

    require_once plugin_dir_path(__FILE__).'blocks/process-block.php';

    return ob_get_clean();
}

add_shortcode('mq_bel_process', 'mq_bel_process');



