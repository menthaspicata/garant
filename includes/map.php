<?php 
	
	$geo_link = 'http://maps.googleapis.com/maps/api/geocode/json?address=херсон+'
					.str_replace(' ', '', $house_street)
					.'+'.str_replace(' ', '', $house_street_number)
					.'&sensor=false&language=ru';

	$geo_data = wp_remote_fopen($geo_link);
	$geo_data = json_decode($geo_data, true);

	if($geo_data['status']=='OK'){
		$lati = $geo_data['results'][0]['geometry']['location']['lat'];
		$longi = $geo_data['results'][0]['geometry']['location']['lng'];
		$formatted_address = $geo_data['results'][0]['formatted_address'];
	} else {
		/*
		 *		херсон
		 */
		$lati = 46.635417;
      $longi = 32.616867;
	}

?>

<div class="house_map">

	<div id="map"></div>

	<script type="text/javascript">

		var map;
		var lati = <?= $lati; ?>;
		var longi = <?= $longi; ?>;
		var title = '<?= the_title(); ?>';		

	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzEDcLGilxNUcp3aybOUm1B63fAS4FBqQ&callback=initMap"></script>
	
</div>