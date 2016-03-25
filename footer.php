<footer class="list-header">

	<div class="header_contacts">

	</div>


	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<h1 class="header_logo"><img src="<?= get_template_directory_uri() . '/img/new_logo.png'; ?>"></h1>
	</a>


</footer>
	<?php

		wp_nav_menu( array(
			'menu'            => 'header_menu',
			'container'       => 'nav',
			'container_class' => 'footer_nav',
			'menu_class'      => 'footer_nav_list',
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

		<div class="copyright">Гарант <?= date("Y"); ?> &copy; Все права защищены.	</div>

</div>

<?php wp_footer(); ?>
</body>
</html>