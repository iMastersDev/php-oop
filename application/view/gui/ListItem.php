<?php
require_once 'view/gui/Component.php';

/**
 * Elemento de interface de usuário que representa um item
 * de uma lista.
 */
class ListItem extends Component {
	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<li%s>%s</li>' , $this->drawAttributes() , $this->drawAll() );
	}
}