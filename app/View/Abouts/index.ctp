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
				foreach($abouts as $about){
					echo $about['About']['desc_about'];
				}
			?>
		</div>
	</article>
</div>
