<?php

namespace App\view\gui;

use App\view\gui\Component;

/**
 * Implementação de um componente de interface de usuário
 * que representa um painel DIV.
 */
class Panel extends Component {
	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<div%s>%s</div>' , $this->drawAttributes() , $this->drawAll() );
	}
}