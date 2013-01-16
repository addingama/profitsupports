<?php
	App::uses('AppHelper', 'View/Helper');
	class SidebarHelper extends Helper{
		public $helpers = array('Html');
		
		public function getAllArticle($articles = null){
			echo '<div class=" clear"></div>';
			echo '<div class="article-sidebar twelve">';
			echo '<h5 class="title-orange">Tutorial List</h5>';
			echo '<div class="border-gray">';
			echo '<ul>';
			foreach($articles as $article){
				echo '<li>&raquo;'." ". $this->Html->link($article['Article']['title'],array('admin'=>false, 'controller'=>'articles', 'action'=>'view',$article['Article']['id'])).'</li>';
			}
			echo '</ul>';
			echo '</div>';
			echo '</div>';
		}
		
		public function getAllNews($news = null){
			echo '<div class=" clear"></div>';
			echo '<div class="article-sidebar twelve">';
			echo '<h5 class="title-orange">News List</h5>';
			echo '<div class="border-gray">';
			echo '<ul>';
			foreach($news as $n){
				echo '<li>&raquo;'." ". $this->Html->link($n['News']['title'],array('admin'=>false, 'controller'=>'news', 'action'=>'view',$n['News']['id'])).'</li>';
			}
			echo '</ul>';
			echo '</div>';
			echo '</div>';
		}
	}
?>
