<?php
require_once 'view/AbstractView.php';
require_once 'view/gui/task/TaskList.php';

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