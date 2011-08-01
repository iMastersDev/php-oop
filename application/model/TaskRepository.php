<?php
require_once 'model/Task.php';

/**
 * Implementação das regras de negócio referentes a lista
 * de tarefas.
 */
class TaskRepository {
	/**
	 * @var	TaskConnector
	 */
	private $taskConnector;

	/**
	 * Constroi o objeto que representa o repositório de tarefas.
	 * @param	TaskConnector $taskConnector Conector com o sistema
	 * 			de armazenamento das tarefas.
	 */
	public function __construct( TaskConnector $taskConnector ) {
		$this->taskConnector = $taskConnector;
	}

	/**
	 * Recupera a lista de tarefas do sistema.
	 * @return	array
	 */
	public function getTaskList() {
		return $this->taskConnector->getTasks();
	}

	/**
	 * Recupera a tarefa que está sendo editada.
	 * @return	Task
	 */
	public function getCurrentTask() {

		if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
			$post = filter_input_array( INPUT_POST , array(
				'taskName'			=> FILTER_SANITIZE_STRING,
				'taskDescription'	=> FILTER_SANITIZE_STRING,
				'taskStatus'		=> FILTER_SANITIZE_STRING
			) );

			if ( isset( $_POST[ 'idTask' ] ) ) {
				$task = $this->taskConnector->read( $_POST[ 'idTask' ] );
				$task->setTaskName( $post[ 'taskName'] );
				$task->setTaskDescription( $post[ 'taskDescription'] );
				$task->setTaskStatus( $post[ 'taskStatus'] );

				$this->taskConnector->update( $task );
			} else {
				$task = new Task();
				$task->setTaskName( $post[ 'taskName'] );
				$task->setTaskDescription( $post[ 'taskDescription'] );
				$task->setTaskStatus( $post[ 'taskStatus'] );

				$this->taskConnector->create( $task );
			}
		} elseif ( isset( $_GET[ 'idTask' ] ) ) {
			$task = $this->taskConnector->read( $_GET[ 'idTask' ] );
		}

		return $task;
	}
}