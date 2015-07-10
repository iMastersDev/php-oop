<?php

namespace App\view\gui;

use App\view\gui\Component;
use App\view\gui\Text;

/**
 * Implementação de um elemento de interface de usuário que
 * representa a tag H1-6
 */
class Heading extends Component {
	/**
	 * @var	integer
	 */
	private $level;

	/**
	 * Constroi o objeto que representa uma tag H1-6
	 * @param	string $text Texto da tag
	 * @param	integer $level Nível da TAG (1-6)
	 */
	public function __construct( $text , $level = 1 ) {
		parent::__construct();

		$this->level = $level;
		$this->addChild( new Text( $text ) );
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<h%d%s>%s</h%d>',
			$this->level,
			$this->drawAttributes(),
			$this->drawAll(),
			$this->level
		);
	}
}