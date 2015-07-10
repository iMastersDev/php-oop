<?php

namespace App\view;

use App\view\AbstractView;
use App\view\gui\task\TaskList;

/**
 * Implementação da View principal da lista de tarefas.
 */
class MainView extends AbstractView {
	/**
	 * Cria a lista de tarefas.
	 */
	public function createTaskList() {
		$this->applicationPanel->addChild( new TaskList( $this->taskRepository ) );
	}
}