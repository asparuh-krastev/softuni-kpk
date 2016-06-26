<?php 
namespace League\CLImate\Settings;

class Manager {
	protected $settings = array();
	
	public function	exists( $name ) {
		return class_exists( $this->get_path( $name ) );
	}

	public function add( $name, $value ) {
		$setting = $this->get_path( $name );
		$key     = $this->get_class_name( $name );
		
		if ( ! array_key_exists( $name, $this->settings ) ) {
			$this->settings[ $key ] = new $setting();
		}
		
		$this->settings[ $key ]->add( $value );
	}

	public function get( $key ) {
		if ( array_key_exists( $key, $this->settings ) ) {
			return $this->settings[ $key ];
		}

		return false;
	}

	protected function get_path( $name ) {
		return '\\League\CLImate\\Settings\\' . $this->get_class_name( $name );
	}

	protected function get_class_name( $name ) {
		return ucwords( str_replace( 'add_', '', $name ) );
	}

	public function settings() {
		return [];
	}

	public function import_setting( $setting ) {
		$short_name = basename( str_replace( '\\', '/', get_class( $setting ) ) );
		$method     = 'importSetting' . $short_name;
		
		if ( method_exists( $this, $method ) ) {
			$this->$method( $setting );
		}
	}
}