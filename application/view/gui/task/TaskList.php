<?php

namespace App\view\gui\task;

use App\view\gui\UnorderedList;
use App\view\gui\ListItem;
use App\view\gui\Span;

/**
 * Implementação de uma lista de tarefas
 */
class TaskList extends UnorderedList {
	/**
	 * Constroi o objeto que representa uma lista de tarefas na
	 * interface de usuário.
	 * @param	TaskRepository $taskRepository
	 */
	public function __construct( TaskRepository $taskRepository ) {
		parent::__construct();

		$this->setId( 'task-list' );

		foreach ( $taskRepository->getTaskList() as $task ) {
			$taskListItem = new ListItem();
			$taskListItem->setClass( 'task' );
			$taskListItem->addChild( new Anchor( sprintf( '?action=edit&idTask=%d' , $task->getIdTask() ) , new Text( $task->getTaskName() ) ) );

			$this->addChild( $taskListItem );
		}
	}
}