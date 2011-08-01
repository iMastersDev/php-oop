<?php
require_once 'view/gui/Component.php';

/**
 * Implementação de um componente de interface de usuário que representa
 * um formulário.
 */
class Form extends Component {
	/**
	 * Constroi o objeto que representa um formulário.
	 * @param	string $action Ação do formulário
	 * @param	string $method Método de envio do formulário
	 */
	public function __construct( $action , $method = 'post' ) {
		parent::__construct();

		$this->addAttribute( 'action' , $action );
		$this->addAttribute( 'method' , $method );
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return sprintf( '<form%s>%s</form>' , $this->drawAttributes() , $this->drawAll() );
	}
}