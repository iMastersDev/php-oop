<?php
require_once 'view/gui/Component.php';

/**
 * Implementação de um componente de interface de usuário que
 * representa um link.
 */
class Anchor extends Component {
	/**
	 * Constroi o objeto que representa um link.
	 * @param	string $href
	 * @param	Component $child
	 */
	public function __construct( $href , Component $child = null ) {
		parent::__construct();

		$this->addAttribute( 'href' , $href );

		if ( $child != null ) {
			$this->addChild( $child );
		}
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<a%s>%s</a>' , $this->drawAttributes() , $this->drawAll() );
	}
}