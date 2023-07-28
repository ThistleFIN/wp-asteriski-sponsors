<?php
/**
 * Plugin Name:       Sponsors block for Asteriski ry
 * Plugin URI:        https://takiainen.fi
 * Description:       Simple block adding options page for easy addition of sponsors and a block for displaying them.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Roosa Virta
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       asteriski-sponsors
 * Domain Path:       /languages
 *
 * @package           asteriski-sponsors
 */

defined( 'ABSPATH' ) || exit;

/**
 * Boots the plugin.
 */
function asteriski_sponsors_boot_plugin(): void
{
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		require __DIR__ . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}

	if ( class_exists( 'Carbon_Fields\Container' ) ) {
		require_once __DIR__ . '/block-options-page.php';
	}
}
add_action( 'after_setup_theme', 'asteriski_sponsors_boot_plugin' );


/**
 * Initializes the block.
 */
function asteriski_sponsors_block_init(): void
{
	$asset_file = include plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	wp_register_script(
		'takiainen-asteriski-sponsors',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	wp_register_style(
		'takiainen-asteriski-sponsors',
		plugins_url( 'build/style-index.css', __FILE__ ),
		false,
		$asset_file['version']
	);

	wp_enqueue_script( 'takiainen-asteriski-sponsors' );
	wp_enqueue_style('takiainen-asteriski-sponsors');
	register_block_type(
		'takiainen/asteriski-sponsors',
		array(
			/** @link asteriski_sponsor_block() */
			'render_callback' => 'asteriski_sponsor_block',
		)
	);

}
add_action( 'init', 'asteriski_sponsors_block_init' );

add_action( 'plugins_loaded', 'sponsors_load_plugin_textdomain' );

function sponsors_load_plugin_textdomain() {
	load_plugin_textdomain( 'asteriski-sponsors', false, 'asteriski-sponsors/languages');
}
/**
 * Renders the block.
 *
 * @return string The block output.
 */
function asteriski_sponsor_block(): string
{
	if(!function_exists('carbon_get_theme_option')) {
		require_once __DIR__ . '/vendor/htmlburger/carbon-fields/core/functions.php';
	}
	ob_start();
	include __DIR__ . '/sponsors.php';

	return ob_get_clean();
}
