<div id="tutorial-header" class="twelve columns block-grid">
		<h2 class="main-title">Tutorial</h2>
</div>
<div class="holder-content row">
	<div class="spacer"></div>
	<section class="eight columns">
		<table style="border:none; margin:0;">
		<?php
			foreach ($articles as $article){
				echo '<tr class="block-grid"><td class="twelve block-grid">';
					echo '<h5 class="title-blue">'. $this->Html->image('notes.png', array('class'=>'content-logo')) . $this->Html->link($article['Article']['title'], array('admin'=>false,'controller'=>'articles', 'action'=>'view', $article['Article']['id'] )).'<span class="title-desc">'. substr($article['Article']['created'],0,10) .'</span></h5>';
					echo '<div class="border-gray cut">'. substr($article['Article']['content'], 0, 250) . '</div>';
				echo '</td></tr>';
			}
		?>
		</table>
	<?php 	
		if($this->Paginator->counter('{:count}') > 10){
			echo $this->element('pagination');
		} 
	?>
	</section>
	<aside class="four columns block-grid">
		<table >
			<tr>
				<?php 
					echo	$this->Form->create(array('action'=>'search', 'admin'=>false, 'type'=>'get'));
					echo $this->Form->input('keyword', array('label'=>false, 'placeholder'=>'Kata kunci', 'class'=>'nine columns'));
					echo $this->Form->submit('Cari', array('class'=>'button expand postfix', 'div'=> array('class'=>'three columns block-grid')));
					echo $this->Form->end();
					if(isset($_GET['keyword'])){
						echo $this->Html->link('Reset Pencarian',array('controller'=>'articles', 'action'=>'index' , 'admin'=>false), array('class'=>'button success radius small expand block-grid'));
					}
				?>
				<div class="spacer"></div>
			</tr>
			<tr class="clear">
				<?php echo $this->Sidebar->getAllArticle($articles);?>
			</tr>
		</table>
	</aside>
</div>
