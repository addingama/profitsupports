<div id="tutorial-header" class="twelve columns block-grid">
		<h2 class="main-title">Tutorial</h2>
</div>
<div class="twelve columns block-grid">
	<?php echo $this->Session->flash(); ?>
</div>
<div class="holder-content row">
	<article class="twelve columns border-gray">
		<h4 class="article-view-title"><?php echo $this->Html->image('notes.png', array('class'=>'content-logo'));?><?php echo $article['Article']['title'];?><span class="title-desc"><?php echo $this->Html->link('Ingin Bertanya?',array('controller'=>'contacts', 'action'=>'index' , 'admin'=>false), array('class'=>'button success radius small')); echo $this->Html->link('Tutorial Index',array('controller'=>'articles', 'action'=>'index' , 'admin'=>false), array('class'=>'button secondary radius small'));?></span></h4>
		<p class="article-view-content"><?php echo $article['Article']['content'];?>
	</article>
</div>
