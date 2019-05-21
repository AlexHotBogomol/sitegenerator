<?php
	return '<?php if(!(isset($_GET) && !empty($_GET))){
						echo "wrong link"; 
						die();
					 }
						$category = mysqli_fetch_assoc(get_category_by_id($_GET["category"]));
					?>
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title><?php echo $category["category_name"]; ?></title>
						<meta name="description" content="<?php echo $category["category_name"]; ?>">
						<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Poppins|Roboto|Ubuntu&display=swap" rel="stylesheet">
						<link rel="stylesheet" href="./style.css">
					</head>
					<body class="category">';