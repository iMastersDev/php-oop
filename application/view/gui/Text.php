<?php
require_once 'view/gui/Component.php';

/**
 * Implementação de um texto que será exibido na marcação
 * da interface de usuário
 */
class Text extends Component {
	/**
	 * @var	string
	 */
	private $text;

	/**
	 * Constroi o objeto que representa um texto na interface
	 * de usuário.
	 * @param	string $text
	 */
	public function __construct( $text ) {
		parent::__construct();

		$this->text = $text;
	}

	/**
	 * @return	string
	 * @see		Component::draw()
	 */
	public function draw() {
		return $this->text;
	}
}