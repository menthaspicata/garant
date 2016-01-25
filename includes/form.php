<section class="contact_form">
	<h1>Оставьте заявку</h1>

	<span class="close_form"></span>

	<form action="">

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

		<button>Отправить</button>

	</form>
</section>