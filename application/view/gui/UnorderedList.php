<?php
require_once 'view/gui/Component.php';

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