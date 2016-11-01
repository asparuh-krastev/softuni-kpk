<?php

namespace Minesweeper;

class Score_Board {
	/**
	 * Name
	 *
	 * @var
	 */
	private $name;

	/**
	 * Points
	 *
	 * @var
	 */
	private $points;

	/**
	 * Player
	 *
	 * @var
	 */
	public $player;

	/**
	 * Name setter
	 *
	 * @param $name
	 */
	public function set_name( $name ) {
		$this->name = $name;
	}

	/**
	 * Name getter
	 *
	 * @param $name
	 *
	 * @return mixed
	 */
	public function get_name( $name ) {
		return $this->name;
	}

	/**
	 * Points setter
	 *
	 * @param $points
	 */
	public function set_points( $points ) {
		$this->points = $points;
	}

	/**
	 * Points getter
	 *
	 * @param $points
	 *
	 * @return mixed
	 */
	public function get_points( $points ) {
		return $this->points;
	}

	/**
	 * Score_Board constructor.
	 *
	 * @param $name
	 * @param $points
	 */
	public function __construct( $name, $points ) {
		$this->set_name( $name );
		$this->set_points( $points );
	}
	
	//TODO The rest goes here...
}