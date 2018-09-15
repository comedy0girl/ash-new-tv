<?php wp_nav_menu(array(
	'menu' => 'Main Menu', 
	'theme_location' => 'header-menu',
	'container_id' => 'cssmenu', 
	'walker' => new CSS_Menu_Walker()
)); ?>
	


	