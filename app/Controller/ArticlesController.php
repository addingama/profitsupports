<?php
App::uses('AppController', 'Controller',  'Comment');
class ArticlesController extends AppController {
	public $paginate = array('limit'=> 6, 'order' => array('created' => 'DESC'));
	public function index() {
		$this->set('title_for_layout', 'Tutorial - Profitsupports.com');
		$this->paginate = array('limit'=> 6, 'order' => array('created' => 'DESC'), 'conditions' => array( 'AND' => array('published' => 1)));
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

	public function view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$data = $this->Article->read(null, $id);
		$this->set('title_for_layout',$data['Article']['title']);
		$this->set('article', $data);
	}


	public function admin_index() {
		$this->set('title_for_layout', 'Tutorial - Profitsupports.com');
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$data = $this->Article->read(null, $id);
		$this->set('title_for_layout',$data['Article']['title']);
		$this->set('article', $data);
	}
	public function addComment($id=null){
		$this->Comment->article_id = $id;
		if($this->request->is('post')){
			if($this->Comment->save($this->request->data)){
				$this->Session->setFlash('Komentar anda berhasil ditambahkan dan akan menunggu untuk moderasi');
				$this->redirect(array('admin'=>false, 'controller'=>'articles', 'action'=>'view', $id));
			}else{
				$this->Session->setFlash('Komentar anda gagal ditambahkan');
			}
		}
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		}
		$users = $this->Article->User->find('list');
		$categories = $this->Article->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	public function admin_edit($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Article->read(null, $id);
		}
		$users = $this->Article->User->find('list');
		$categories = $this->Article->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('Article deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Article was not deleted'));
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
				$this->set('articles', $this->paginate());
			}else{
				$this->redirect(array('controller' => 'articles', 'action'=>'index', 'admin'=>false));
			}
			$this->render('index');
		}
	}
}
