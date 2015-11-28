<?php


$courses = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=3');
$courses = json_decode($courses, true);

foreach ($courses as $course) {

	switch ($course['ccy']) {
		case 'EUR':
			$EUR_p24 = $course['buy'];
			continue;
		case 'RUR':
			$RUR_p24 = $course['buy'];
			continue;
		case 'USD':
			$USD_p24 = $course['buy'];
			continue;
	}
}


require 'functions/theme_settings.php';
require 'functions/add_scripts.php';

require 'functions/house.php';
require 'functions/house_meta_main.php';
require 'functions/house_meta_gallery.php';