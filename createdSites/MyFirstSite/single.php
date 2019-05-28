<?php 
          $connection = mysqli_connect('localhost', 'a43349_site_adm', 'QbtnQhngoORCvR!o', 'a43349_site_db');
          if(mysqli_connect_errno()) {
            die("Database connection failed: " . 
              mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")"
              );
            }
          ?><?php require_once("functions.php");?>
					<?php
						if(!(isset($_GET) && !empty($_GET))){ 
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
					<body class="single"><div class="wrapper">
						<div class="content">	
							<header class="header">
								<div class="top-panel bg-white" style="padding: 15px 0;">
									<div class="container">
										<div class="row">
											<div class="col-12">
												<div class="header__menu d-flex justify-content-between align-items-center">
													<a href="/">
														<img src="https://res.cloudinary.com/emailsandereverest/image/upload/v1558083941/oilcbd/logo.png" alt = "MyFirstSite">
													</a>
													<nav class="nav">
														<ul class="menu">
															<li class="menu-item">
																<a class="menu-link" href="/">
																	Home
																</a>	
															</li>

															<li class="menu-item">
																<span class="menu-link">Categories</span>
																<ul class="sub-menu">
																<?php 
																	$categories_set = get_all_categories(); 
																	while($category_item = mysqli_fetch_assoc($categories_set)) { 
																		echo "<li class=\"sub-menu-item\">"; 
																			$safe_category_name = urlencode($category_item["category_name"]); 
																	    echo "<a class=\"menu-link\" href=\"/category/{$safe_category_name}\">";  
																	    	echo htmlentities($category_item["category_name"]);  
																			echo "</a>"; 
																		echo "</li>"; 
																	} 
																	mysqli_free_result($categories_set);
																 ?>
																</ul>
															</li>
														</ul>	
													</nav>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="header_banner" style="background: url(https://res.cloudinary.com/emailsandereverest/image/upload/v1558083944/oilcbd/first-bg.jpg) no-repeat center top / cover;">
									
								</div>
							</header><main style="padding-bottom: 100px;">
						<div class="container">
							<div class="row flex-row">
								<div class="col-8 main__content">
									<h2 class="main__heading">
										<?php echo $article["title"]; ?>
									</h2>
									<img class="single__img" src="<?php echo $article["img_link"]; ?>">
									<p class="single__description"><?php echo $article["description"]; ?></p>
								</div>
								<div class="col-1"></div>
								<div class="col-3 sidebar">
									<h4>Все статьи из этой категории: </h4>
									<ul>
										<?php 
										$posts = get_posts_by_category($article["category_id"]); 
										while($post = mysqli_fetch_assoc($posts)) { 
										 if($post["id"] == $article["id"]){ 
											echo "<li class=\"current_list\">"; 
										 }else{ 
										  echo "<li>"; 	
										 } 
										$safe_post_title = urlencode($post["title"]); 
										  echo "<a href=\"/article/{$safe_post_title}\">";  
						 				  echo htmlentities($post["title"]); 
											echo "</a>"; 
										echo "</li>"; 
										} 
										?>
									</ul>
								</div> 
							</div>
						</div>
					</main></div>
						<footer class="footer" style="background: #111;">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<p style="color: #fff; text-align: left; ">
												Текст в футере...
											</p>
										</div>
									</div>
								</div>
							</footer>
						</div>
					</body>
				</html> <?php if (isset($connection)) {
								mysqli_close($connection); 
 					} ?> 