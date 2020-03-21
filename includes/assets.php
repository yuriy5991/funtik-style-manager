<?php
/**
 * Class description
 *
 * @package   package_name
 * @author    Yurii Bratchenko
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Funtik_Style_Manager_Assets' ) ) {

	/**
	 * Define Funtik_Style_Manager_Assets class
	 */
	class Funtik_Style_Manager_Assets {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * Constructor for the class
		 */
		public function init() {
			add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_styles' ) );
		}

		/**
		 * Enqueue elemnetor editor-related styles
		 *
		 * @return void
		 */
		public function editor_styles() {

			wp_enqueue_style(
				'styles-font',
				funtik_style_manager()->plugin_url( 'assets/css/styles.css' ),
				array(),
				funtik_style_manager()->get_version()
			);
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}
	}

}

function funtik_style_manager_assets() {
	return Funtik_Style_Manager_Assets::get_instance();
}
