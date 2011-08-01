<?php
require_once 'model/MySQLTaskConnector.php';
require_once 'model/TaskRepository.php';
require_once 'view/MainView.php';
require_once 'view/TaskFormView.php';

/**
 * Controlador da aplicação, esse participante receberá as
 * requisições do usuário e decidirá o que fazer com elas.
 */
class Application {
	/**
	 * O método start iniciará a aplicação e manipulará a
	 * requisição do usuário conforme adequado.
	 */
	public static function start() {
		$taskConnector = new MySQLTaskConnector( '127.0.0.1' , 'todo' , 'root' , 'oge6742fj' );
		$taskRepository = new TaskRepository( $taskConnector );

		$userAction = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : 'home';

		switch ( $userAction ) {
			case 'edit':
				if ( isset( $_GET[ 'idTask' ] ) ) {
					$view = new TaskFormView( $taskRepository );
					$view->createTaskEditionForm();
				}

				break;
			case 'create':
			case 'save':
				$view = new TaskFormView( $taskRepository );

				if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
					$view->createTaskEditionForm();
				} else {
					$view->createTaskCreationForm();
				}

				break;
			case 'home':
			default:
				$view = new MainView( $taskRepository );
				$view->createTaskList();
		}

		$view->show();
	}
}