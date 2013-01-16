<?php

App::uses('Controller', 'Controller');
class AppController extends Controller {
	public $layout = 'profitsupports';
	//public $helpers = array('Session','Html', 'Form', 'Js', 'Paginator');
	public $components = array(
		'Session', 'Recaptcha.Recaptcha',
		'Auth' => array(
			'loginRedirect' => array('controller'=>'homes', 'action'=>'index'),
			'logoutRedirect' => array('controller'=>'homes', 'action'=>'index'),
			'authError' => 'Halaman ini tidak bisa di akses',
		)
	);
	public function beforeFilter(){
		$this->Auth->allow('index','view');
		$this->set('logged_in', $this->Auth->loggedIn());
		$this->set('current_user', $this->Auth->user());
	}
}	
