<?php
/**
 * Manager Class
 * Formatting follows WordPress PHP coding standards.
 *
 * @link https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
 */
namespace League\CLImate\Settings;

class Manager {
	/**
	 * Settings array
	 *
	 * @var array
	 */
	protected $settings = [];

	/**
	 * Check if class exists
	 *
	 * @param $name
	 *
	 * @return bool
	 */
	public function exists( $name ) {
		return class_exists( $this->get_path( $name ) );
	}

	/**
	 * Add class instance to settings array
	 *
	 * @param $name
	 * @param $value
	 */
	public function add( $name, $value ) {
		$setting = $this->get_path( $name );
		$key     = $this->get_class_name( $name );

		if ( ! array_key_exists( $name, $this->settings ) ) {
			$this->settings[$key] = new $setting();
		}

		$this->settings[$key]->add( $value );
	}

	/**
	 * Get class instance from settings array
	 *
	 * @param $key
	 *
	 * @return bool|mixed
	 */
	public function get( $key ) {
		if ( array_key_exists( $key, $this->settings ) ) {
			return $this->settings[$key];
		}

		return false;
	}

	/**
	 * Get class path by class name
	 *
	 * @param $name
	 *
	 * @return string
	 */
	protected function get_path( $name ) {
		return '\\League\CLImate\\Settings\\' . $this->get_class_name( $name );
	}

	/**
	 * Format class name by removing "add_"
	 *
	 * @param $name
	 *
	 * @return string
	 */
	protected function get_class_name( $name ) {
		return ucwords( str_replace( 'add_', '', $name ) );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings() {
		return $this->settings;
	}

	/**
	 * Import setting
	 *
	 * @param $setting
	 */
	public function import_setting( $setting ) {
		$short_name = basename( str_replace( '\\', '/', get_class( $setting ) ) );
		$method     = 'import_setting' . $short_name;

		if ( method_exists( $this, $method ) ) {
			$this->$method( $setting );
		}
	}
}