<?php

	class HomesController extends AppController {
		public $uses = array('Article', 'News', 'About');
		
		public function index(){
			$this->set('title_for_layout','Home - Profitsupports');
			$this->set('articles', $this->Article->find('all', array('conditions' => array('published'=> 1),'limit' => 1, 'order' => array('created'=>'DESC'))));
			$this->set('news', $this->News->find('all', array('conditions' => array('published'=> 1),'limit' => 1, 'order' => array('created'=>'DESC'))));
			$this->set('abouts', $this->About->find('all', array('limit' => 1, 'order' => array('id'=>'DESC'))));
		}
	}
?>
