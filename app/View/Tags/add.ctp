<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Add Tag'); ?></legend>
	<?php
		echo $this->Form->input('tag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Artags'), array('controller' => 'artags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artag'), array('controller' => 'artags', 'action' => 'add')); ?> </li>
	</ul>
</div>
