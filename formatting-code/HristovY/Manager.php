<?php
/**
 * @Manager.php Created on June 25, 2016. Homework for Course: High quality code.
 *
 * [Long description for file (if any)...]
 *
 * PHP version [number]
 *
 * [LICENSE: (if any)...]
 *
 * @author  Yavor Hristov <yvhristov@gmail.com>
 * @version 1.0
 * 
 * References:
 * @see http://www.php-fig.org/psr/ PHP Standards Recommendations.
 * @see https://phpdoc.org/ Generate documentation from your PHP.
 */
namespace League\CLImate\Settings;

	class Manager
	{
		/**
		 * An associative array where ...[short description here].
		 *
		 * @var array
		 */
		protected $settings = [];

		public function exists($name)
		{
			return class_exists($this->getPath($name));
		}

		 /**
		 * [Method description here - if needed!]
		 *
		 * Example: [Clarify method's final purpose - if needed!].
		 *
		 * @param type $name
		 * @param type $value
		 * @return ...
		 */
		public function add($name, $value)
		{
			$setting = $this->getPath($name); 
			$key = $this->getClassName($name);

			if (!array_key_exists($name, $this->settings)) {
				$this->settings[$key] = new $setting();
			}
			
			$this->settings[$key]->add($value);
		}

		public function get($key)
		{
			if (array_key_exists($key, $this->settings)) {
				return $this->settings[$key];
			}

			return false;
		}

		public function settings()
		{
			return [];
		}

		public function importSetting($setting)
		{
			$short_name = basename(str_replace('\\', '/', get_class($setting))); 
			$method = 'importSetting'. $short_name;

			if (method_exists($this, $method)) {
				$this->$method($setting);
			}
		}

		protected function getPath($name)
		{
			return '\\League\CLImate\\Settings\\' . $this->getClassName($name);
		}

		protected function getClassName($name)
		{
			return ucwords(str_replace('add_', '', $name));
		}
	}