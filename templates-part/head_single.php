<?php
	return '<?php require_once("functions.php");?>
					<?php if(!(isset($_GET) && !empty($_GET))){ 
							echo "wrong link"; 
							die();
						}
						$article = mysqli_fetch_assoc(get_post_by_name($_GET["article"]));
					?>
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title><?php echo $article["title"]; ?></title>
						<meta name="description" content="<?php echo $article["title"]; ?>">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Poppins|Roboto|Ubuntu&display=swap" rel="stylesheet">
						<link rel="stylesheet" href="/style.css">
					</head>
					<body class="single">';