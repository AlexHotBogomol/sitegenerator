<?php 
          $connection = mysqli_connect('localhost', 'a43349_site_adm', 'QbtnQhngoORCvR!o', 'a43349_site_db');
          if(mysqli_connect_errno()) {
            die("Database connection failed: " . 
              mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")"
              );
            }
          ?><?php require_once("functions.php");?>
					<?php if(!(isset($_GET) && !empty($_GET))){
						echo "wrong link"; 
						die();
					 }
						$category = mysqli_fetch_assoc(get_category_by_name($_GET["category"]));
					?>
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title><?php echo $category["category_name"]; ?></title>
						<meta name="description" content="<?php echo $category["category_name"]; ?>">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Poppins|Roboto|Ubuntu&display=swap" rel="stylesheet">
						<link rel="stylesheet" href="/style.css">
					</head>
					<body class="category"><div class="wrapper">
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
							<div class="row">
								<div class="col-12">
									<h2 class="main__heading"><?php echo $category["category_name"]; ?></h2>
								</div>
							</div>
							<div class="row flex-row">
								<div class="col-8 main__content">
									<div class="row">
										<?php 
											$total_articles = get_posts_by_category($category["id"])->num_rows; 
											$page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1; 
											$num_results_on_page = 10; 
											$category_id = $category["id"];
											$category_name = $category["category_name"];
											if ($stmt = mysqli_prepare($connection, "SELECT * FROM cat_articles WHERE category_id = $category_id ORDER BY id DESC LIMIT ?,?")) {
											$calc_page = ($page - 1) * $num_results_on_page; 
											mysqli_stmt_bind_param($stmt, "ii", $calc_page, $num_results_on_page); 
											mysqli_stmt_execute($stmt); 
											$result = mysqli_stmt_get_result($stmt); 
											while($article = mysqli_fetch_assoc($result)) { 
											echo "<div class=\"col-6\">"; 
												echo "<div class=\"post_card\">";
													echo "<div class=\"card__img\">";
														echo "<img src=\"{$article["img_link"]}\">"; 
													echo "</div>";
													$safe_article_name = urlencode($article["title"]); 
														echo "<a href=\"/article/{$safe_article_name}\">";  
															echo htmlentities($article["title"]); 
														echo "</a>"; 
														echo "<p>"; 
															echo htmlentities($article["excerpt"]); 
														echo "</p>"; 
												echo "</div>";
											echo "</div>"; 
											} 
										?>
									</div>
									<div class="row">
										<?php $page_name = "/category/$category_name"; ?>
										<?php display_pagination_on_page($page_name, $page, $total_articles, $num_results_on_page); ?> 
									</div>
								</div>
								<div class="col-1"></div>
								<div class="col-3 sidebar">
									<h4>Все категории</h4>
									<ul>
										<?php 
											$categories = get_all_categories(); 
											while($category = mysqli_fetch_assoc($categories)) { 
												echo "<li>"; 
													$safe_category_name = urlencode($category["category_name"]); 
											    echo "<a href=\"/category/{$safe_category_name}\">";  
											    	echo htmlentities($category["category_name"]);  
													echo "</a>"; 
												echo "</li>"; 
											} 
										 ?>
									</ul>
								</div> 
							</div>
						</div>
					</main>
					<?php 
		$stmt->close(); 
		} 
		?> </div>
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