<?php

namespace App\view\gui;

use App\view\gui\Component;

/**
 * Implementação de um elemento de interface de usuário que representa
 * a tag input.
 */
class Input extends Component {
	/**
	 * Constroi o objeto que representa um campo input.
	 * @param	string $name Nome do campo
	 * @param	string $type Tipo do campo
	 */
	public function __construct( $name , $type = 'text' ) {
		parent::__construct();

		$this->addAttribute( 'name' , $name );
		$this->addAttribute( 'type' , $type );
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<input%s />' , $this->drawAttributes() );
	}
}