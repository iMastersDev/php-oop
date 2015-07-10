<?php

namespace App\view\gui;

use App\view\gui\Component;

/**
 * Implementação de um elemento de interface de usuário
 * que representa a tag SPAN.
 */
class Span extends Component {
	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<span%s>%s</span>' , $this->drawAttributes() , $this->drawAll() );
	}
}