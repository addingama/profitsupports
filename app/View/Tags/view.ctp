<div class="tags view">
<h2><?php  echo __('Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['tag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artags'), array('controller' => 'artags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artag'), array('controller' => 'artags', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Artags'); ?></h3>
	<?php if (!empty($tag['Artag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Article Id'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Artag'] as $artag): ?>
		<tr>
			<td><?php echo $artag['id']; ?></td>
			<td><?php echo $artag['article_id']; ?></td>
			<td><?php echo $artag['tag_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'artags', 'action' => 'view', $artag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'artags', 'action' => 'edit', $artag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'artags', 'action' => 'delete', $artag['id']), null, __('Are you sure you want to delete # %s?', $artag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Artag'), array('controller' => 'artags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
