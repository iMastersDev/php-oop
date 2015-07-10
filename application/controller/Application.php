<?php

namespace App\controller;

use App\model\MySQLTaskConnector;
use App\model\TaskRepository;
use App\view\MainView;
use App\view\TaskFormView;

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
		$taskConnector = new MySQLTaskConnector( '127.0.0.1' , 'todo' , 'usuario' , 'senha' );
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