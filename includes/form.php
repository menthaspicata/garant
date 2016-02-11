<section class="contact_form">
	<h1>Оставьте заявку</h1>

	<span class="close_form"></span>

	<form action="" method="post">

		<div>
			<label for="client_want">Я хочу <span>*</span></label>
			<select name="client_want" id="what_i_want">
				<option value="client_buy">Купить объект</option>
				<option value="client_sell">Продать объект</option>
				<option value="client_rent">Снять объект</option>
				<option value="client_rate">Заказать оценку объекта</option>
			</select>

			<br>

			<label for="client_name">Имя <span>*</span></label>
			<input type="text" name="client_name" required>

			<br>
	
			<label for="client_phone">Телефон <span>*</span></label>
			<input type="tel" name="client_phone" required>

			<br>

			<label for="client_mail">Email</label>
			<input type="email" name="client_mail">
		</div>

		<div>
			<label for="object_cat">Категория объекта</label>
			<select name="object_cat">
				<option value="client_house">Дом</option>
				<option value="client_apartment">Квартира</option>
				<option value="client_dacha">Дача</option>
				<option value="client_comm">Коммерческая</option>
				<option value="client_lend">Участок</option>
				<option value="client_another">Другое</option>
			</select>

			<br>

			<label for="client_about">Описание</label>
			<textarea name="client_about" ></textarea>	

			<br>

			<label for="client_file">Фотографии объекта</label>
			<input type="file" multiple>


		</div>		

		<button type="submit" name="contact_form">Отправить</button>

	</form>
</section>

<?php 
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact_form']) ) {

		/**
		 * 	Я хочу
		 * 	client_want
		 */


		if ( isset($_POST['client_want']) ) {
			$client_want = sanitize_text_field($_POST['client_want']);

			//print_r( $client_want );

			switch ($client_want) {
				case 'client_buy':
					$client_want = 'Покупатель';
					break;
				case 'client_buy':
					$client_want = 'Покупатель';
					break;
				case 'client_sell':
					$client_want = 'Продавец';
					break;
				case 'client_rent':
					$client_want = 'Арендатор';
					break;
				case 'client_rate':
					$client_want = 'Заказ на оценку';
					break;
			}

		}

		if ( isset($_POST['client_name']) ) {
			$client_name = sanitize_text_field($_POST['client_name']);
		}

		if ( isset($_POST['client_phone']) ) {
			$client_phone = sanitize_text_field($_POST['client_phone']);
		}

		if ( isset($_POST['client_mail']) ) {
				$client_mail = sanitize_text_field($_POST['client_mail']);
		}

		if ( isset($_POST['object_cat']) ) {
			$object_cat = sanitize_text_field($_POST['object_cat']);

			//print_r( $object_cat );

			switch ($object_cat) {
				case 'client_house':
					$object_cat = 'Дом';
					break;
				case 'client_apartment':
					$object_cat = 'Квартира';
					break;
				case 'client_dacha':
					$object_cat = 'Дача';
					break;
				case 'client_comm':
					$object_cat = 'Коммерческая';
					break;
				case 'client_lend':
					$object_cat = 'Участок';
					break;
				case 'client_another':
					$object_cat = 'Другое';
					break;
			}
		}

		if ( isset($_POST['client_about']) ) {
				$client_about = sanitize_text_field($_POST['client_about']);
		}

		if ( isset($_POST['client_file']) ) {
				$client_file = sanitize_text_field($_POST['client_file']);

		}



		/**
		 * 	письмо
		 */
		

		$to = 'hello@an-garant.ks.ua';

		// тема письма
		$subject = $client_want . ' - Гарант - an-garant.ks.ua';

		// текст письма
		$message = '
			<html>
			<head>
			  <title>' . $client_want . '</title>
			</head>
			<body>
			  <table>
			    <tr>
			      <td>Статус:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			      <td>' . $client_want . '</td>
			    </tr>
			    <tr>
					<td>Категория:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>' . $object_cat . '</td>
			    </tr>
			    <tr>
			      <td>Имя:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			      <td>' . $client_name . '</td>		      
			    </tr>
			    <tr>
			    	<td>Телефон:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			      <td>' . $client_phone . '</td>
			    </tr>
			    <tr>
			    	<td>Почта:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			    	<td>' . $client_mail . '</td>				
			    </tr>
			    
			    <tr>     
			      <td>Описание:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			      <td>' . $client_about . '</td>
			    </tr>
			  </table>
			</body>
			</html>
		';

		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$headers .= 'From: '. $client_want .' <mail@an-garant.ks.ua>' . "\r\n";

		// Дополнительные заголовки
		/*
		$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
		$headers .= 'From: Birthday Reminder <hello@an-garant.ks.ua>' . "\r\n";
		$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
		$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		*/

		// Отправляем
		mail($to, $subject, $message, $headers);

	}
?>