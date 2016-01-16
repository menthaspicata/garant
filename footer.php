<footer class="list-header">

	<ul class="header_contacts">
		<li>Гарант 2015 &copy; Все права защищены.</li>
		<li>(050)9816278, (050)9747779</li>
		<li>ул.9 Января 38</li>
	</ul>


	<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<h1 class="header_logo"><img src="<?= get_template_directory_uri() . '/img/logo.jpg'; ?>"></h1>
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

</div>

<?php wp_footer(); ?>
</body>
</html>