jQuery( document ).ready(function() {

	jQuery('.content').wookmark({
		autoResize: true, 
		offset: 10 
	});

	var header_button = jQuery('.header_button');
	var close_button = jQuery('.close_form');
	var contact_form = jQuery('.contact_form');

	header_button.on("click", function() {
		contact_form.toggleClass('active_form');
	});

	close_button.on("click", function() {
		contact_form.toggleClass('active_form');
	});
});


/*
 *		галерея
 */

function gallery_view(obj) { 
	document.getElementsByClassName("thumb")[0].innerHTML = '<img src="' + obj.src + '" class="material_shadow">';
}

/*
 *		кнопки скрытия фильтров
 */

function spoiler() {
	var more = document.getElementById('more');
	var less = document.getElementById('less');
	var spoiler = document.getElementById('spoiler');

	more.onclick = function() {
		spoiler.style.display="block";
		more.style.display="none";
	};

	less.onclick = function() {
		spoiler.style.display="none";
		more.style.display="block";
	};
}

/*
 *		карта
 *		переменные определяются в includes/map.php
 */

function initMap() {
	var center = new google.maps.LatLng(lati, longi);

	map = new google.maps.Map(document.getElementById('map'), {
		center: center,
		zoom: 15,
	});

	var marker = new google.maps.Marker({
		position: center,
		map: map,
		title: title 
	});
}


function initMap_contacts() {
	var center = new google.maps.LatLng(46.6333595, 32.6037943);

	map = new google.maps.Map(document.getElementById('map_contacts'), {
		center: center,
		zoom: 15,
	});

	var marker = new google.maps.Marker({
		position: center,
		map: map
	});
}

