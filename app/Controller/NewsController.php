<?php
App::uses('AppController', 'Controller');
class NewsController extends AppController {
	public $paginate = array('limit'=> 6, 'order' => array('created' => 'DESC'));
	public function index() {
		$this->set('title_for_layout','News - Profitsupports.com');
		$this->paginate = array('limit'=> 6, 'order' => array('created' => 'DESC'), 'conditions' => array( 'AND' => array('published' => 1)));
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

	public function view($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$data = $this->News->read(null, $id);
		$this->set('title_for_layout',$data['News']['title']);
		$this->set('news', $data);
	}


	public function admin_index() {
		$this->set('title_for_layout','News - Profitsupports.com');
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$data = $this->News->read(null, $id);
		$this->set('title_for_layout',$data['News']['title']);
		$this->set('news', $data);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->News->delete()) {
			$this->Session->setFlash(__('News deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('News was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function search(){
		if($this->request->is('get')){
			if(isset($_GET['keyword'])){
				$keyword = $_GET['keyword'];
				$keyword = '%'.$keyword. '%';
				$this->paginate = array(
					'order'=>array('created'=>'DESC'),
					'limit' => 10,
					'conditions' => array(
						'OR' => array(
							'title LIKE' => $keyword,
							'content LIKE' => $keyword,
						),
						'AND' => array(
							'published'=>1,
						),
					),
				);
				$this->set('news', $this->paginate());
			}else{
				$this->redirect(array('controller' => 'news', 'action'=>'index', 'admin'=>false));
			}
			$this->render('index');
		}
	}
}
