<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('profit','foundation'));
		echo $this->Html->script(array('jquery','orbit','profit','tiny_mce/tiny_mce_src'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header class="row">
			<h1 style="position: fixed; top: -100px;">PROFITSUPPORTS</h1>
			<?php echo $this->Html->image('logo.png', array('alt'=>'logo' , 'class'=>'two columns'));	?>
			<nav class="ten columns">
				<ul class="nav-bar">
				<?php if($logged_in): ?>
					<li><?php echo $this->Html->link('Home', array('controller'=>'homes', 'action'=>'index', 'admin'=>false));?></li>
					<li><?php echo $this->Html->link('Tutorial', array('controller'=>'articles', 'action'=>'index', 'admin'=>true));?></li>
					<li><?php echo $this->Html->link('News', array('controller'=>'news', 'action'=>'index', 'admin'=>true));?></li>
					<li><?php echo $this->Html->link('About Us', array('controller'=>'abouts', 'action'=>'index', 'admin'=>true));?></li>
					<li><?php echo $this->Html->link('Contact Us', array('controller'=>'contacts', 'action'=>'index', 'admin'=>true));?></li>
					<li><?php echo $this->Html->link('User', array('controller'=>'users', 'action'=>'index', 'admin'=>true));?></li>
					<li><?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout', 'admin'=>false));?></li>
				<?php else: ?>
					<li><?php echo $this->Html->link('Home', array('controller'=>'homes', 'action'=>'index', 'admin'=>false));?></li>
					<li><?php echo $this->Html->link('Tutorial', array('controller'=>'articles', 'action'=>'index', 'admin'=>false));?></li>
					<li><?php echo $this->Html->link('News', array('controller'=>'news', 'action'=>'index', 'admin'=>false));?></li>
					<li><?php echo $this->Html->link('About Us', array('controller'=>'abouts', 'action'=>'index', 'admin'=>false));?></li>
					<li><?php echo $this->Html->link('Contact Us', array('controller'=>'contacts', 'action'=>'index', 'admin'=>false));?></li>
					<li><?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login', 'admin'=>false));?></li>
				<?php endif; ?>
				</ul>
			</nav>
		</header>
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer class="row">
			<h6 style="text-align:center; font-size: 10px; border-top: 1px dotted black;padding-top: 10px;">Copyright &copy; 2012 | ProfitSupports.com</h6>
		</footer>
	</div>
</body>
</html>
