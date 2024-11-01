<?php
/**
 * Plugin Name: ZazimBareshet - Elementor Forms ActiveTrail
 * Description: Elementor forms ActiveTrail integration
 * Plugin URI:  https://zazim-bareshet.co.il
 * Version:     1.0.0
 * Author:      Eden K. - Zazim Bareshet
 * Author URI:  https://profiles.wordpress.org/zazim
 * Text Domain: zb-elementor-forms-activetrail
 * License:     GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


define( 'ZB_ELEMENTOR_FORMS_ACTIVETRAIL_VERSION', '1.0.0' );

final class ZB_Elementor_Forms_ActiveTrail {

	const MINIMUM_ELEMENTOR_PRO_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Load translation
		add_action( 'init', array( $this, 'i18n' ) );

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'init' ), 20 );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'zb-elementor-forms-activetrail' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor & Elementor Pro is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor & Elementor Pro installed and activated
		if ( ! did_action( 'elementor/loaded' ) || ! defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor Pro version
		if ( ! version_compare( ELEMENTOR_PRO_VERSION, self::MINIMUM_ELEMENTOR_PRO_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}

		require_once( 'plugin.php' );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor & Elementor Pro installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor & Elementor Pro */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'zb-elementor-forms-activetrail' ),
			'<strong>' . esc_html__( 'ZazimBareshet - Elementor Forms ActiveTrail', 'zb-elementor-forms-activetrail' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor & Elementor Pro', 'zb-elementor-forms-activetrail' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor Pro version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor Pro 3: Required Elementor Pro version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'zb-elementor-forms-activetrail' ),
			'<strong>' . esc_html__( 'ZazimBareshet - Elementor Forms ActiveTrail', 'zb-elementor-forms-activetrail' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor Pro', 'zb-elementor-forms-activetrail' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_PRO_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'zb-elementor-forms-activetrail' ),
			'<strong>' . esc_html__( 'ZazimBareshet - Elementor Forms ActiveTrail', 'zb-elementor-forms-activetrail' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'zb-elementor-forms-activetrail' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
}

new ZB_Elementor_Forms_ActiveTrail();
