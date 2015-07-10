<?php

namespace App\view;

/**
 * Interface para definição da camada de apresentação onde,
 * através de uma interface, o usuário pode interagir com
 * a aplicação.
 */
interface View {
	/**
	 * Exibe a camada de interface de usuário.
	 */
	public function show();
}