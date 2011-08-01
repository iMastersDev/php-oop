<?php
require_once 'view/gui/Component.php';
require_once 'view/gui/Text.php';

/**
 * Implementação de um elemento de interface de usuário
 * que representa um botão.
 */
class Button extends Component {
	/**
	 * Constroi o objeto que representa um botão de interface
	 * de usuário.
	 * @param	string $label
	 */
	public function __construct( $label ) {
		parent::__construct();

		$this->addChild( new Text( $label ) );
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<button%s>%s</button>' , $this->drawAttributes() , $this->drawAll() );
	}
}