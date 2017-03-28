<?php

class UsuariosController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Flash');

	public function cadastro(){
	
		if($this->Usuario->save($this->request->data)){
			$this->Flash->set('Usuário cadastrado com sucesso!');
			$this->redirect(array('action' => 'index_login'));
		}
		
	}

	public function index_login(){}
	

	public function validar(){
		$usuario = $this->Usuario->findAllByLoginAndSenha($this->data['Usuario']['login'], $this->data['Usuario']['senha']);
		if(!empty($usuario))
			return $usuario;
		else
			return false;
	}


	public function login(){
		
		if(isset($this->data['Usuario']['login'])){
			
			$usuario = $this->validar();
			if($usuario != false){
				$this->Flash->set('Acesso realizado com sucesso!');
				$this->Session->write('User', $usuario);
				$this->redirect('/');
				exit();
			}
			else{
				$this->Flash->set('Usuario e/ou senha inválidos!');
				$this->redirect(array('action'=> 'index_login'));
				exit();
			}
			
		}	
		else{
			$this->redirect(array('action'=> 'index_login'));
			exit();
		}
	}

	public function logout(){
		$this->Session->destroy();
		$this->Flash->set('Atividades encerradas com sucesso!');
      	$this->redirect(array('action' => 'index_login'));
      	exit();
	}

//-------------------------------------------------------------------------------------------------------------------------------->>
//-------------------------------------------------------------------------------------------------------------------------------->>


	public function editar(){
		if(empty($this->request->data)){
			//carregar campos para edição
			$this->request->data= $this->Usuario->findById($this->Session->read('User')[0]['Usuario']['id']);
		}
		else{
			//Salvar os dados
			if($this->Usuario->save($this->request->data)){
				$this->Flash->set('Perfil atualizado com sucesso!');
				$this->redirect(array("controller" => "pages", "action" => "home"));
			}
		}

	}


}

