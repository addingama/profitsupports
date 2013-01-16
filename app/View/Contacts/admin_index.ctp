<div id="contact-header" class="twelve columns block-grid">
		<h2 class="main-title">Contact Us</h2>
</div>
<div class="spacer clear"></div>
<div class="twelve columns block-grid">
	<?php echo $this->Session->flash(); ?>
</div>
	<?php 
		echo	$this->Form->create(array('action'=>'search', 'admin'=>true, 'type'=>'get'));
		echo $this->Form->input('keyword', array('label'=>false, 'placeholder'=>'Kata kunci', 'div'=> array('class'=>'nine columns')));
		echo $this->Form->submit('Cari', array('class'=>'button expand postfix', 'div'=> array('class'=>'three columns')));
		if(isset($_GET['keyword'])){
			echo $this->Form->submit('Reset Pencarian', array('class'=>'button expand  postfix', 'div'=> array('class'=>'three columns')) ,array('controller'=>'articles', 'action'=>'index' , 'admin'=>true));
		}
		echo $this->Form->end();
	?>
<div class="spacer clear"></div>
<div class="row">
	<h4 class="twelve title-orange"><?php echo $this->Html->image('message.png', array('class'=>'admin-logo')); ?>Pesan Masuk</h4>
	<table class="twelve columns border-gray">
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>E-mail</td>
			<td>Subject</td>
			<td>Actions</td>
		</tr>	
		<?php
			$no = 1;
			foreach ($contacts as $contact):
		?>
		<tr>
			<td class="<?php echo $this->Function->checkColor($contact, 'Contact', 'status')?>"><?php echo $no++; ?></td>
			<td><?php echo $contact['Contact']['name']; ?></td>
			<td><?php echo $contact['Contact']['email']; ?></td>
			<td><?php echo $contact['Contact']['subject']; ?></td>
			<td>
					<?php
						echo $this->Html->link(__('Ubah'), array('controller'=>'contacts', 'action'=>'edit', $contact['Contact']['id']), array('class'=>'button radius'));
						echo $this->Html->link(__('Baca'), array('controller'=>'contacts', 'action'=>'view', $contact['Contact']['id'], 1), array('class'=>'button radius'));
						echo $this->Form->postLink(__('Hapus'),array('admin' => true, 'controller'=>'contacts', 'action'=>'delete', $contact['Contact']['id']), array('class'=>'button radius'), 'Apakah anda yakin ?');
					?>
			</td>
		</td>
		<?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination'); ?>
	<div class="spacer twelve columns"></div>
</div>
