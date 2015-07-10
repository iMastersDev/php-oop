<?php

namespace App\view\gui;

use App\view\gui\Component;

/**
 * Componente de interface de usuário que representa uma lista
 * não ordenada UL.
 */
class UnorderedList extends Component {
	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<ul%s>%s</ul>' , $this->drawAttributes() , $this->drawAll() );
	}
}