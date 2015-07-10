<?php

namespace App\view\gui;

use App\view\gui\Component;
use App\view\gui\Text;

/**
 * Implementação de um componente de interface de usuário que
 * representa a tag label em um formulário.
 */
class Label extends Component {
	/**
	 * Constroi o objeto que representa um label em um formulário.
	 * @param	mixed $label
	 */
	public function __construct( $label ) {
		parent::__construct();

		if ( $label instanceof Component ) {
			$this->addChild( $label );
		} else {
			$this->addChild( new Text( $label ) );
		}
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<label%s>%s</label>' , $this->drawAttributes() , $this->drawAll() );
	}
}