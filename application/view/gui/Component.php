<?php

namespace App\view\gui;

/**
 * Interface para definição de um componente de interface
 * de usuário. Essa classe é a base para a criação de
 * qualquer componente de interface de usuário e tem como
 * objetivo facilitar a implementação desses elementos e
 * oferecer uma interface comum para a renderização de toda
 * a interface de usuário.
 */
abstract class Component implements Countable {
	/**
	 * Lista de atributos do elemento de interface de usuário.
	 * @var	array
	 */
	private $attributes;

	/**
	 * Lista de filhos do componente de interface de usuário.
	 * @var	array
	 */
	private $children;

	/**
	 * Constroi o componente de interface de usuário e inicializa
	 * as propriedades com valores padrão.
	 */
	public function __construct() {
		$this->attributes = array();
		$this->children = array();
	}

	/**
	 * Recupera a representação do objeto de interface de usuário
	 * como uma string.
	 * @return	string
	 */
	public function __toString() {
		return (string) $this->draw();
	}

	/**
	 * Adiciona um atributo ao componente de interface de usuário.
	 * @param	string $name Nome do atributo
	 * @param	string $value Valor do atributo
	 */
	public function addAttribute( $name , $value ) {
		$this->attributes[ $name ] = $value;
	}

	/**
	 * Adiciona um componente como filho do componente de interface
	 * de usuário.
	 * @param	Component $child O filho que será adicionado
	 * @return	Component O filho recém adicionado.
	 */
	public function addChild( Component $child ) {
		$this->children[] = $child;

		return $child;
	}

	/**
	 * Recupera o número de filhos do componente de interface de usuário.
	 * @return	integer
	 * @see		Countable::count()
	 */
	public function count() {
		return count( $this->children );
	}

	/**
	 * Desenha o componente de interface de usuário.
	 * @return	string
	 */
	public abstract function draw();

	/**
	 * Desenha todos os filhos do componente.
	 * @return	string
	 */
	protected function drawAll() {
		$children = '';

		foreach ( $this->children as $child ) {
			$children .= $child;
		}

		return $children;
	}

	/**
	 * Desenha os atributos do componente.
	 * @return	string
	 */
	protected function drawAttributes() {
		$attr = null;

		foreach ( $this->attributes as $name => $value ) {
			$attr .= sprintf( ' %s="%s"' , $name , $value );
		}

		return $attr;
	}

	/**
	 * Define o atributo class do componente para especificar um estilo
	 * CSS.
	 * @param string $class Nome da classe CSS do componente
	 */
	public function setClass( $class ) {
		$this->addAttribute( 'class' , $class );
	}

	/**
	 * Define o ID do componente
	 * @param	string $id O ID do componente
	 * @see		Component::addAttribute()
	 */
	public function setId( $id ) {
		$this->addAttribute( 'id' , $id );
	}

	/**
	 * Exibe o componente de interface de usuário.
	 */
	public function show() {
		echo $this;
	}
}