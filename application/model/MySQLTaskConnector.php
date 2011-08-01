<?php
require_once 'model/TaskConnector.php';

/**
 * Conector MySQL para armazenamento de tarefas
 */
class MySQLTaskConnector implements TaskConnector {
	/**
	 * @var	PDO
	 */
	private $pdo;

	/**
	 * Constroi o objeto que representa um conector MySQL para armazenamento
	 * de tarefas.
	 * @param	string $host Host de conexão
	 * @param	string $dbname Nome da base de dados
	 * @param	string $user Usuário do banco
	 * @param	string $pswd Senha do usuário do banco
	 */
	public function __construct( $host , $dbname , $user , $pswd ) {
		$this->pdo = new PDO(
			sprintf( 'mysql:host=%s;dbname=%s' , $host , $dbname ),
			$user,
			$pswd
		);
	}

	/**
	 * @param	Task $task
	 * @return	boolean
	 * @see		TaskConnector::create()
	 */
	public function create( Task $task ) {
		$stm = $this->pdo->prepare( '
			INSERT INTO `Task`(`taskName`,`taskDescription`,`taskStatus`,`taskOpened`)
			VALUES (:taskName,:taskDescription,:taskStatus,NOW());
		' );

		$stm->bindValue( ':taskName'		, $task->getTaskName() );
		$stm->bindValue( ':taskDescription'	, $task->getTaskDescription() );
		$stm->bindValue( ':taskStatus'		, $task->getTaskStatus() );

		if ( $stm->execute() ) {
			$task->setIdTask( (int) $this->pdo->lastInsertId() );

			return true;
		}

		return false;
	}

	/**
	 * @return	array
	 * @see		TaskConnector::getTasks()
	 */
	public function getTasks() {
		$stm = $this->pdo->prepare( 'SELECT * FROM `Task` ORDER BY `taskOpened`;' );
		$stm->setFetchMode( PDO::FETCH_CLASS , 'Task' );
		$stm->execute();

		return $stm->fetchAll();
	}

	/**
	 * @param	integer $id
	 * @return	Task ou NULL se não encontrado
	 * @see		TaskConnector::read()
	 */
	public function read( $id ) {
		$stm = $this->pdo->prepare( 'SELECT * FROM `Task` WHERE `idTask`=:idTask;' );
		$stm->bindParam( ':idTask' , $id , PDO::PARAM_INT );
		$stm->setFetchMode( PDO::FETCH_CLASS , 'Task' );
		$stm->execute();

		$task = $stm->fetch();

		$stm->closeCursor();

		return $task;
	}

	/**
	 * @param	Task $task
	 * @return	boolean
	 * @see		TaskConnector::update()
	 */
	public function update( Task $task ) {
		$stm = $this->pdo->prepare( '
			UPDATE `Task` SET
				`taskName`=:taskName,
				`taskDescription`=:taskDescription,
				`taskStatus`=:taskStatus
			WHERE
				`idTask`=:idTask;
		' );

		$stm->bindValue( ':taskName'		, $task->getTaskName() );
		$stm->bindValue( ':taskDescription'	, $task->getTaskDescription() );
		$stm->bindValue( ':taskStatus'		, $task->getTaskStatus() );
		$stm->bindValue( ':idTask'			, $task->getIdTask() );

		return $stm->execute();
	}
}