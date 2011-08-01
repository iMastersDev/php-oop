<?php
/**
 * Interface para definição de um conector com o mecanismo
 * de armazenamento de tarefas.
 */
interface TaskConnector {
	/**
	 * Armazena uma nova tarefa.
	 * @param	Task $task
	 * @return	boolean TRUE se a tarefa tiver sido criada com sucesso.
	 */
	public function create( Task $task );

	/**
	 * Recupera uma lista de tarefas.
	 * @return	array
	 */
	public function getTasks();

	/**
	 * Recupera uma tarefa com um ID específico.
	 * @param	integer $id
	 * @return	Task
	 */
	public function read( $id );

	/**
	 * Atualiza uma tarefa com as modificações feitas
	 * @param	Task $task
	 * @return	boolean TRUE se a tarefa tiver sido atualizada com sucesso.
	 */
	public function update( Task $task );
}