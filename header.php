<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php wp_title(); ?></title>

	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/style.css'; ?>">



	<?php wp_head(); ?>
</head>

<body>

<div class="wrapp">


<?php

wp_nav_menu( array(
						'menu'            => 'header_menu',
						'container'       => 'nav',
						'container_class' => 'header_nav',
						'menu_class'      => 'header_nav_list',
						'echo'            => true,
						'fallback_cb'     => 'false',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0
					) 
);

?>
	
	<header class="list-header">
		<h1 class="header_logo">Garant</h1>

		<button class="header_button">связь с риелтором</button>

		<ul class="header_contacts">
			<li>+380000000000</li>
			<li>+380000000000</li>
		</ul>
	</header>