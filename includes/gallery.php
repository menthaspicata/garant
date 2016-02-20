<div class="house_gallery">

	<?php  

	if ( !empty($house_gallery_front[0]) ) {

		preg_match('/\[gallery.*ids=.(.*).\]/', $house_gallery_front[0], $ids);
		$array_ids = explode(",", $ids[1]);

		if ( has_post_thumbnail( $current_post_id ) ) {
			echo '<img src="' . wp_get_attachment_url( get_post_thumbnail_id($current_post_id) ) . '" onclick="gallery_view(this)" class="gallery_thumb material_shadow" >';
		}		

			foreach ($array_ids as $key) {
				echo '<img src="';
				echo wp_get_attachment_url( $key );
				echo '" class="gallery_thumb material_shadow" ';
				echo 'onclick="gallery_view(this)"';
				echo '>';
			}	
	}

		//wp_get_attachment_image( $attachment_id, $size, $icon, $attr );

		//echo do_shortcode( $house_gallery_front[0] );
	?>

	<script type="text/javascript">

		function gallery_view(obj) { 
			document.getElementsByClassName("thumb")[0].innerHTML = '<img src="' + obj.src + '" class="material_shadow">';
		}

	</script>
	
</div>