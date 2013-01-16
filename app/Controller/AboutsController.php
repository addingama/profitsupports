<?php
App::uses('AppController', 'Controller');
class AboutsController extends AppController {
	
#	USER FUNCTION
	public function index() {
		$this->set('title_for_layout', 'About - Profitsupports.com');
		$this->paginate = array(
			'limit'=>1,
			'order'=> array('id'=>'DESC'),
		);
		$this->About->recursive = 0;
		$this->set('abouts', $this->paginate());
	}
	
#	ADMIN FUNCTION 
	public function admin_index() {
		$this->set('title_for_layout', 'About - Profitsupports.com');
		$this->paginate = array(
			'limit'=>1,
			'order'=> array('id'=>'DESC'),
		);
		$this->About->recursive = 0;
		$this->set('abouts', $this->paginate());
	}

	public function admin_view($id = null) {
		$this->About->id = $id;
		$this->set('about', $this->About->readAbout(null, $id));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->About->create();
			if ($this->About->saveAbout($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->About->id = $id;
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->About->saveAbout($this->request->data)) {
				$this->Session->setFlash(__('The about has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->About->readAbout(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->About->id = $id;
		if (!$this->About->exists()) {
			throw new NotFoundException(__('Invalid about'));
		}
		if ($this->About->delete()) {
			$this->Session->setFlash(__('About deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('About was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
