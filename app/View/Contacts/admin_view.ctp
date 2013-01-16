<div class="row">
	<?php echo $this->Form->create('Contact', array('class'=>'seven columns')) ?>
		<fieldset>
			<legend>Detail Pesan</legend>
			<?php
				echo $this->Form->input('name');
				echo $this->Form->input('email');
				echo $this->Form->input('subject');
				echo $this->Form->input('desc_content');
			?>
			<?php echo $this->Html->link(__('Kembali'),array('admin'=>true, 'controller'=>'contacts', 'action'=>'index'), array('class'=>'button radius')); ?>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
