<?php echo $this->Html->script('tinyMce600', false); ?>
<div id="tutorial-header" class="twelve columns block-grid">
		<h2 class="main-title">Tambah Tutorial</h2>
</div>
<div class="twelve columns block-grid">
	<?php echo $this->Session->flash(); ?>
</div>
<div class="holder-content row">
	<article class="twelve columns border-gray">
		<?php echo $this->Form->create('Article')?>
		<fieldset id="form-article">
			<?php
				echo $this->Form->input('title');
				echo $this->Form->input('content');
				echo $this->Form->input('published', array('value'=>0));
				echo $this->Form->input('category');
				echo '<div class="spacer"></div>';
				echo $this->Form->submit('Save',array('class'=>'button radius'), array('action'=>'add'));
				echo '<div class="spacer"></div>';
			?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</article>
</div>
