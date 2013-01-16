<?php echo $this->Html->script('tinyMce600', false); ?>
<div class="block-grid">
	<div id="about-header" class="twelve columns block-grid">
		<h2 class="main-title">About Us</h2>
	</div>
	<div class="twelve columns block-grid">
	<?php echo $this->Session->flash(); ?>
	</div>
	<div class="row">
	<?php echo $this->Form->create('About', array('class'=>'twelve columns')); ?>
		<fieldset>
	<?php
		echo $this->Form->input('id',array('type'=>'hidden'));
		echo $this->Form->input('desc_about', array('label'=>'Deskripsi'));
		echo '<div class="spacer"></div>';
		echo $this->Form->submit('Simpan',array('class'=>'button radius'), array('admin'=>true, 'controller'=>'abouts', 'action'=>'edit'));
	?>
		<div class="spacer"></div>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
