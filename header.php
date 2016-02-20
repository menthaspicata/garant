<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>

	<link rel="icon" type="image/png" href="<?= get_template_directory_uri() . '/img/favicon.png'; ?>" />
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/style.css'; ?>">

	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/media-max-480.css'; ?>" media="screen and (max-width:480px)">
	<link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/media-min-480-max-768.css'; ?>" media="screen and (max-width:768px) and (min-width:481px)">

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
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<h1 class="header_logo"><img src="<?= get_template_directory_uri() . '/img/logo.jpg'; ?>"></h1>
	</a>

	<button class="header_button">Заявка купить / продать</button>

	<ul class="header_contacts">
		<li>(050)9816278</li>
		<li>(050)9747779</li>
		<li>ул. 9 Января 38</li>
	</ul>
</header>

<?php require 'includes/form.php'; ?>