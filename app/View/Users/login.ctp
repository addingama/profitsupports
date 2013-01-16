<div class="twelve columns block-grid">
	<?php echo $this->Session->flash('auth'); ?>
</div>

<div class="spacer clear"></div>
<div class="holder_content row">
	<?php echo $this->Form->create(array('class'=>'eight offset-by-two')); ?>
		<fieldset class="border-gray">
		<legend>Login Area</legend>
		<?php echo $this->Html->image('login.png', array('style'=>'right:0; position:absolute;'));?>
		<?php echo $this->Form->input('username'); ?>
		<?php echo $this->Form->input('password'); ?>
		<?php echo $this->Form->submit('Login', array('class'=>'button'), array('action'=>'login')); ?>
		</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
