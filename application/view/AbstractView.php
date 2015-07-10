<?php

namespace App\view;

use App\view\View;
use App\view\gui\Anchor;
use App\view\gui\Panel;

/**
 * Base para implementação de uma View. Essa classe implementa
 * um esqueleto da marcação HTML para facilitar a implementação
 * das interfaces de usuário da aplicação.
 */
abstract class AbstractView implements View {
	/**
	 * @var	Panel
	 */
	protected $applicationPanel;

	/**
	 * @var	TaskRepository
	 */
	protected $taskRepository;

	/**
	 * @var	string
	 */
	protected $title;

	/**
	 * @var	Panel
	 */
	protected $topPanel;

	/**
	 * Construtor padrão de uma View.
	 * @param	TaskRepository $taskRepository Repositório de tarefas
	 */
	public function __construct( TaskRepository $taskRepository ) {
		$this->taskRepository = $taskRepository;
		$this->title = 'Lista de Tarefas';

		$this->applicationPanel = new Panel();
		$this->applicationPanel->setId( 'application' );

		$this->topPanel = $this->applicationPanel->addChild( new Panel() );
		$this->topPanel->setId( 'top' );
		$this->topPanel->addChild( new Heading( new Anchor( '?action=home' , new Text( $this->title ) ) ) );
		$this->topPanel->addChild( new Anchor( '?action=create' , new Text( 'Criar Tarefa' ) ) )->setId( 'create' );
	}

	/**
	 * @see		View::show()
	 */
	public function show() {
		$this->showHeader();
		$this->applicationPanel->show();
		$this->showFooter();
	}

	/**
	 * Exibe o rodapé da marcação.
	 */
	protected function showFooter() {
		echo '</body></html>';
	}

	/**
	 * Exibe o cabeçalho da marcação
	 */
	protected function showHeader() {
		echo '<!DOCTYPE html>' , PHP_EOL;
		echo '<html>';
		echo '<head>';
		echo '<title>' , $this->title , '</title>';
		echo '</head>';
		echo '<body>';
	}
}