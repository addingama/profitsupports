<div id="news-header" class="twelve columns block-grid">
		<h2 class="main-title">News</h2>
</div>
<div class="holder-content row">
	<div class="spacer"></div>
	<section class="eight columns">
		<table style="border:none; margin:0;" class="twelve columns">
		<?php
			foreach ($news as $n){
				echo '<tr class="block-grid"><td class="twelve block-grid">';
					echo '<h5 class="title-orange">'. $this->Html->image('news.png', array('class'=>'content-logo')) . $this->Html->link($n['News']['title'], array('admin'=>false,'controller'=>'news', 'action'=>'view', $n['News']['id'] )).'<span class="title-desc">'. substr($n['News']['created'],0,10) .'</span></h5>';
					echo '<div class="border-gray cut">'. substr($n['News']['content'], 0, 250) . '</div>';
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
						echo $this->Html->link('Reset Pencarian',array('controller'=>'news', 'action'=>'index' , 'admin'=>false), array('class'=>'button success radius small expand block-grid'));
					}
				?>
				<div class="spacer"></div>
			</tr>
			<tr class="clear">
				<?php echo $this->Sidebar->getAllNews($news);?>
			</tr>
		</table>
	</aside>
</div>
