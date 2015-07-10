<?php

namespace App\view;

use App\view\AbstractView;
use App\view\gui\Form;
use App\view\gui\Input;
use App\view\gui\Label;

/**
 * View de criação e edição de tarefas
 */
class TaskFormView extends AbstractView {
	private function createForm( $taskName = null , $taskDescription = null , $taskStatus = null ) {
		$taskNameInput = new Input( 'taskName' );
		$taskDescriptionInput = new Input( 'taskDescription' );
		$taskStatusInput = new Input( 'taskStatus' );

		if ( !is_null( $taskName ) ) {
			$taskNameInput->addAttribute( 'value' , $taskName );
		}

		if ( !is_null( $taskDescription ) ) {
			$taskDescriptionInput->addAttribute( 'value' , $taskDescription );
		}

		if ( !is_null( $taskStatus ) ) {
			$taskStatusInput->addAttribute( 'value' , $taskStatus );
		}

		$form = $this->applicationPanel->addChild( new Form( '?action=save' ) );
		$form->addChild( new Label( 'Nome:' ) )->addAttribute( 'for' , 'taskName' );
		$form->addChild( $taskNameInput );

		$form->addChild( new Label( 'Descrição:' ) )->addAttribute( 'for' , 'taskDescription' );
		$form->addChild( $taskDescriptionInput );

		$form->addChild( new Label( 'Situação:' ) )->addAttribute( 'for' , 'taskStatus' );
		$form->addChild( $taskStatusInput );

		$form->addChild( new Input( 'Enviar' , 'submit' ) );

		return $form;
	}

	/**
	 * Cria o formulário de criação de uma tarefa
	 */
	public function createTaskCreationForm() {
		$this->createForm();
	}

	/**
	 * Cria o formulário de edição de uma tarefa.
	 */
	public function createTaskEditionForm() {
		$task = $this->taskRepository->getCurrentTask();
		$form = $this->createForm( $task->getTaskName() , $task->getTaskDescription() , $task->getTaskStatus() );
		$form->addChild( new Input( 'idTask' , 'hidden' ) )->addAttribute( 'value' , $task->getIdTask() );
	}
}