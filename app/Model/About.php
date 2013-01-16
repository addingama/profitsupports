<?php
App::uses('AppModel', 'Model');
class About extends AppModel {

	public $validate = array(
		'desc_about' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'About tidak boleh kosong',
			),
		),
	);
	
	public function findAbout($type = null, $condition = null){
		return $this->find($type, $condition);
	}
	public function readAbout($field=null, $id = null){
		return $this->read($field, $id);
	}
	public function saveAbout($data = null){
		$this->create();
		return $this->save($data);
	}
	public function deleteAbout($id = null){
		return $this->delete($id);
	}
}
