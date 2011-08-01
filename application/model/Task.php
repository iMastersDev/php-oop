<?php
/**
 * Entidade que representa uma tarefa
 */
class Task {
	/**
	 * @var	integer
	 */
	private $idTask;

	/**
	 * @var	string
	 */
	private $taskName;

	/**
	 * @var	string
	 */
	private $taskDescription;

	/**
	 * @var	string
	 */
	private $taskStatus;

	/**
	 * @var	string
	 */
	private $taskOpened;

	/**
	 * @var	string
	 */
	private $taskModified;

	/**
	 * Recupera o valor de $idTask
	 * @return	integer
	 */
	public function getIdTask() {
		return $this->idTask;
	}

	/**
	 * Recupera o valor de $taskName
	 * @return	string
	 */
	public function getTaskName() {
		return $this->taskName;
	}

	/**
	 * Recupera o valor de $taskDescription
	 * @return	string
	 */
	public function getTaskDescription() {
		return $this->taskDescription;
	}

	/**
	 * Recupera o valor de $taskStatus
	 * @return	string
	 */
	public function getTaskStatus() {
		return $this->taskStatus;
	}

	/**
	 * Recupera o valor de $taskOpened
	 * @return	string
	 */
	public function getTaskOpened() {
		return $this->taskOpened;
	}

	/**
	 * Recupera o valor de $taskModified
	 * @return	string
	 */
	public function getTaskModified() {
		return $this->taskModified;
	}

	/**
	 * @param integer $idTask
	 */
	public function setIdTask( $idTask ) {
		$this->idTask = $idTask;
	}

	/**
	 * @param string $taskName
	 */
	public function setTaskName( $taskName ) {
		$this->taskName = $taskName;
	}

	/**
	 * @param string $taskDescription
	 */
	public function setTaskDescription( $taskDescription ) {
		$this->taskDescription = $taskDescription;
	}

	/**
	 * @param string $taskStatus
	 */
	public function setTaskStatus( $taskStatus ) {
		$this->taskStatus = $taskStatus;
	}

	/**
	 * @param string $taskOpened
	 */
	public function setTaskOpened( $taskOpened ) {
		$this->taskOpened = $taskOpened;
	}

	/**
	 * @param string $taskModified
	 */
	public function setTaskModified( $taskModified ) {
		$this->taskModified = $taskModified;
	}
}