<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Artags'), array('controller' => 'artags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artag'), array('controller' => 'artags', 'action' => 'add')); ?> </li>
	</ul>
</div>
