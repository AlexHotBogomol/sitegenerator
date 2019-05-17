<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-bottom: 20px;">
			<div class="row">
				<div class="col-6 mx-auto">
					<form
					 class="form-horizontal"
					 id="frmVoucher"
					 method="post"
					 action="builder.php">
						<h1>Builder Form</h1>
						<div class="form-group">
							<label for="sitename"></label>
							<input type="text" name="sitename" id="sitename" placeholder="Имя сайта(Будет названием папки, уйдет в title)" required="required">
						</div>
						<div class="form-group">
							<label for="description"></label>
							<input type="text" name="description" id="description" placeholder="Описание (Уйдет в description)" required="required">
						</div>
						<div class="form-group">
							<label for="main_img"></label>
							<input type="text" name="main_img" id="main_img" placeholder="Url основной картинки (Уйдет в баннер)" required="required">
						</div>
						<div class="form-group">
							<label for="logo"></label>
							<input type="text" name="logo" id="logo" placeholder="Url логотипа" required="required">
						</div>
						<div class="form-group">
							<label for="main_color"></label>
							<input type="text" name="main_color" id="main_color" placeholder="Основной цвет в формате hex" required="required">
						</div>
						<div class="form-group">
							<h2>Choose stylesheet type</h2>
							<select name="stylesheet_type" required="required">
								<option value="1">First</option>
							</select>
						</div>
						<div class="form-group">
							<h2>Choose header type</h2>
							<select name="header_type" required="required">
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
						<div class="form-group">
							<h2>Choose main type</h2>
							<select name="main_type" required="required">
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
						<div class="form-group">
							<h2>Choose single type</h2>
							<select name="single_type" required="required">
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
						<div class="form-group">
							<h2>Choose category type</h2>
							<select name="category_type" required="required">
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
						</div>
						<div class="form-group">
							<h2>Choose footer type</h2>
							<select name="footer_type" required="required">
								<option value="1">First</option>
								<option value="2">Second</option>
								<option value="3">Third</option>
								<option value="4">Fourth</option>
							</select>
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