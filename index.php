<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		input{
			width: 100%;
			margin-bottom: 15px;
		}
		h1{
		}
		h3{
			padding-top: 20px;
			padding-bottom: 40px;
		}
	</style>
</head>
<body>
	<div class="container-fluid" style="margin-bottom: 20px;">
			<div class="row">
				<div class="col-12 mx-auto">
					<form
					 class="form-horizontal"
					 id="frmVoucher"
					 method="post"
					 action="builder.php">
						<h1 class="text-center">Builder Form</h1>
						<h3 class="text-center">Основные</h3>
						<div class="row">
							<div class="col-3">
								<label for="sitename">Имя сайта(Будет названием папки, уйдет в title)</label>
								<input type="text" name="sitename" id="sitename" required="required">
							</div>
							<div class="col-3">
								<label for="sitename">Описание (Уйдет в description)</label>
								<input type="text" name="description" id="description" required="required">
							</div>
							<div class="col-3">
								<label for="main_img">Url основной картинки (Уйдет в баннер)</label>
								<input type="text" name="main_img" id="main_img" required="required">
							</div>
							<div class="col-3">
								<label for="logo">Url логотипа</label>
								<input type="text" name="logo" id="logo" required="required">
							</div>
						</div>
						<h3 class="text-center">Шаблоны</h3>
						<div class="row">
							<div class="col-3">
								<div class="form-group">
									<p>Стили</p>
									<select name="stylesheet_type" required="required">
										<option value="1">Первый</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<p>Шапка</p>
									<select name="header_type" required="required">
										<option value="1">Первый</option>
										<option value="2">Второй</option>
										<option value="3">Третий</option>
										<option value="4">Четвертый</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<p>Тело главной страницы</p>
									<select name="main_type" required="required">
										<option value="1">Первый</option>
										<option value="2">Второй</option>
										<option value="3">Третий</option>
										<option value="4">Четвертый</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<p>Тело статьи</p>
									<select name="single_type" required="required">
										<option value="1">Первый</option>
										<option value="2">Второй</option>
										<option value="3">Третий</option>
										<option value="4">Четвертый</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<p>Тело категории</p>
									<select name="category_type" required="required">
										<option value="1">Первый</option>
										<option value="2">Второй</option>
										<option value="3">Третий</option>
										<option value="4">Четвертый</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<p>Футер</p>
									<select name="footer_type" required="required">
										<option value="1">Первый</option>
										<option value="2">Второй</option>
										<option value="3">Третий</option>
										<option value="4">Четвертый</option>
									</select>
								</div>
							</div>
						</div>
						<h3 class="text-center">Верхняя панель</h3>
						<h3 class="text-center">Футер</h3>
						<div class="row">
							<div class="col-3">
								<p>Текст в футере</p>
								<textarea name="footer_text" id="footer_text" cols="30" rows="5">Текст в футере...</textarea>
							</div>
							<div class="col-3">
								<p>Положение текста в футере</p>
								<select name="footer_align" required="required">
									<option value="left">Слева</option>
									<option value="center">Центр</option>
									<option value="right">Справа</option>
								</select>
							</div>
							<div class="col-3">
								<label for="footer_bg">Цвет заднего фона футера(в хеш формате)</label>
								<input type="text" name="footer_bg" id="footer_bg" required="required">
							</div>
							<div class="col-3">
								<label for="footer_text_color">Цвет текста футера(в хеш формате)</label>
								<input type="text" name="footer_text_color" id="footer_text_color" required="required">
							</div>
						</div>
						<h3 class="text-center">Вывод постов</h3>
						<div class="row">
							<div class="col-3">
								<label for="posts_per_page">Количество постов для одной страницы</label>
								<input type="text" name="posts_per_page" id="posts_per_page" required="required">
							</div>
							<div class="col-3">
								<p>Количество постов в строке</p>
								<select name="posts_per_row" required="required">
									<option value="2">Два</option>
									<option value="3">Три</option>
									<option value="4">Четыре</option>
								</select>
							</div>
							<div class="col-3">
								<label for="posts_on_homepage">Количество постов на главной странице</label>
								<input type="text" name="posts_on_homepage" id="posts_on_homepage" required="required">
							</div>
						</div>
						<div class="row"></div>
						<h3 class="text-center">Цвет</h3>
						<div class="row">
							<div class="col-3">
								<label for="main_color">Основной цвет в формате hex</label>
								<input type="text" name="main_color" id="main_color" required="required">
							</div>
							<div class="col-3">
								<label for="text_color">Цвет текста в формате hex</label>
								<input type="text" name="text_color" id="text_color" required="required">
							</div>
						</div>
						<h3 class="text-center">Шрифт</h3>
						<div class="row">
							<div class="col-3">
								<div class="form-group">
									<p>Выбрать шрифт</p>
									<select name="text_font_family" required="required">
										<option value="Ubuntu">Ubuntu</option>
										<option value="Open Sans">Open Sans</option>
										<option value="Roboto">Roboto</option>
										<option value="Poppins">Poppins</option>
										<option value="Lato">Lato</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<label for="text_base_size">Базовый размер текста</label>
								<input type="text" name="text_base_size" id="text_base_size" required="required">
							</div>
						</div>
						<button
						 type="submit"
						 class="btn btn-success">
							BUILD IT
						</button>
					</form>
				</div>
			</div>
		</div>
</body>
</html>