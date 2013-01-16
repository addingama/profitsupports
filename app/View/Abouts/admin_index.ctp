<div class="block-grid">
	<div id="about-header" class="twelve columns block-grid">
		<h2 class="main-title">About Us</h2>
	</div>
	<div class="twelve columns block-grid">
	<?php echo $this->Session->flash(); ?>
	</div>
	<article class="twelve columns">
		<div class="border-gray">
			<?php
				$id = null;
				foreach($abouts as $about){
					echo $about['About']['desc_about'];
					$id = $about['About']['id'];
				}
			?>
		</div>
			<?php
				if($id != null){
					echo $this->Html->link('Ubah', array('admin'=>true, 'controller'=>'abouts', 'action'=>'edit', $id), array('class'=>'button radius'));
					echo $this->Form->postLink('Hapus', array('admin'=>true, 'controller'=>'abouts', 'action'=>'delete', $id),array('class'=>'button radius'),'Anda yakin ?' );
				}
			?>
			<div class="spacer"></div>
	</article>
</div>
