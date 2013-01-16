<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class ContactsController extends AppController {
	public $components = array('Email');
	public function index() {
		if ($this->request->is('post')) {
			if ($this->Recaptcha->verify()) {
				$pesan = $this->request->data;
				if ($this->Contact->saveContact($pesan)) {
					$this->Session->setFlash(__('Pesan anda telah terkirim, terima kasih telah menghubungi kami'));
					$this->Email->to = 'support@profitsupports.com';  
					$this->Email->subject = 'Subject - '. $pesan['Contact']['subject'];   
					$this->Email->from = $pesan['Contact']['email'];  
					$this->Email->send($pesan['Contact']['desc_content']);
					$this->redirect(array('action'=>'index'));
				} else {
					$this->Session->setFlash(__('Pesan anda tidak dapat terkirim, silahkan mencoba kembali.'));
				}
			}else{
				$this->Session->setFlash(__('Captcha yang anda masukkan salah, silahkan mencoba kembali.'));
			}
		}
	}

	public function admin_index() {
		$this->paginate = array('limit'=>10, 'order'=>array('status'=>'ASC', 'id'=>'DESC'));
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

	public function admin_view($id = null, $value=null) {
		$this->Contact->id = $id;
		$this->updateStatus($id, $value);
		$this->request->data = $this->Contact->readContact(null, $id);
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contact->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('Contact deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contact was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function updateStatus($id, $value){
		$this->request->data['Contact']['id'] = $id;
		$this->request->data['Contact']['status'] = $value;
		if($this->Contact->saveContact($this->request->data)){
			$this->Session->setFlash(__('Contact status updated'));
		}else{
			$this->Session->setFlash(__('Contact fail to update status'));	
		}
		return true;
	}
	public function admin_search(){
			if($this->request->is('get')){
				if(isset($_GET['keyword'])){
					$keyword = $_GET['keyword'];
					$keyword = '%'.$keyword. '%';
					$this->paginate = array(
						'order'=>array('status'=>'ASC', 'id'=>'DESC'),
						'limit' => 10,
						'conditions' => array(
							'OR' => array(
								'email LIKE' => $keyword,
								'name LIKE' => $keyword,
								'subject LIKE' => $keyword,
							),
						),
					);
					$this->set('contacts', $this->paginate());
				}else{
					$this->redirect(array('controller' => 'contact', 'action'=>'index', 'admin'=>true));
				}
				$this->render('admin_index');
			}
		}
}
