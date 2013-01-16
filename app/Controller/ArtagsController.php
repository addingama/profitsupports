<?php
App::uses('AppController', 'Controller');
/**
 * Artags Controller
 *
 * @property Artag $Artag
 */
class ArtagsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Artag->recursive = 0;
		$this->set('artags', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Artag->id = $id;
		if (!$this->Artag->exists()) {
			throw new NotFoundException(__('Invalid artag'));
		}
		$this->set('artag', $this->Artag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Artag->create();
			if ($this->Artag->save($this->request->data)) {
				$this->Session->setFlash(__('The artag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artag could not be saved. Please, try again.'));
			}
		}
		$articles = $this->Artag->Article->find('list');
		$tags = $this->Artag->Tag->find('list');
		$this->set(compact('articles', 'tags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Artag->id = $id;
		if (!$this->Artag->exists()) {
			throw new NotFoundException(__('Invalid artag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artag->save($this->request->data)) {
				$this->Session->setFlash(__('The artag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Artag->read(null, $id);
		}
		$articles = $this->Artag->Article->find('list');
		$tags = $this->Artag->Tag->find('list');
		$this->set(compact('articles', 'tags'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Artag->id = $id;
		if (!$this->Artag->exists()) {
			throw new NotFoundException(__('Invalid artag'));
		}
		if ($this->Artag->delete()) {
			$this->Session->setFlash(__('Artag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Artag->recursive = 0;
		$this->set('artags', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Artag->id = $id;
		if (!$this->Artag->exists()) {
			throw new NotFoundException(__('Invalid artag'));
		}
		$this->set('artag', $this->Artag->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Artag->create();
			if ($this->Artag->save($this->request->data)) {
				$this->Session->setFlash(__('The artag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artag could not be saved. Please, try again.'));
			}
		}
		$articles = $this->Artag->Article->find('list');
		$tags = $this->Artag->Tag->find('list');
		$this->set(compact('articles', 'tags'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Artag->id = $id;
		if (!$this->Artag->exists()) {
			throw new NotFoundException(__('Invalid artag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artag->save($this->request->data)) {
				$this->Session->setFlash(__('The artag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Artag->read(null, $id);
		}
		$articles = $this->Artag->Article->find('list');
		$tags = $this->Artag->Tag->find('list');
		$this->set(compact('articles', 'tags'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Artag->id = $id;
		if (!$this->Artag->exists()) {
			throw new NotFoundException(__('Invalid artag'));
		}
		if ($this->Artag->delete()) {
			$this->Session->setFlash(__('Artag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
