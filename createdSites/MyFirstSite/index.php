<?php 
          $connection = mysqli_connect('localhost', 'CSVimport_admin', '111111', 'CSVimport_db');
          if(mysqli_connect_errno()) {
            die("Database connection failed: " . 
              mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")"
              );
            }
          ?><?php require_once("functions.php");?>
					<!DOCTYPE html>
					<html lang="en">
						<head>
							<meta charset="UTF-8">
								<title>MyFirstSite</title>
							<meta name="description" content="superpupersite">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
							<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Poppins|Roboto|Ubuntu&display=swap" rel="stylesheet">
							<link rel="stylesheet" href="/style.css">
						</head>
					<body class="home"><div class="wrapper">
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
							</header><main style="padding: 100px 0;">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2 class="text-center main__heading">Заголовок</h2>
									<p class="main__desc"style="text-align: justify; padding-bottom: 85px;">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat porro quo itaque possimus optio quas iusto at atque. Nobis distinctio aliquam minima aspernatur perspiciatis ab nulla totam, architecto, recusandae error tenetur quas dolor. Amet reprehenderit, est et consequatur nobis error magni fugiat dolores, mollitia officia sunt, reiciendis corrupti exercitationem assumenda maiores nemo odit possimus atque pariatur, praesentium ipsum rem aliquid. Odio ab harum nostrum aliquid incidunt. Similique vel suscipit repellendus fuga consequuntur molestiae nostrum maiores consequatur aperiam odit, ea, perferendis deleniti est eligendi quae quas! Qui cupiditate officia eveniet, tempora aliquam corporis totam aliquid, repudiandae odit at mollitia quibusdam non!
									</p>
									<div class="categories" style="padding-bottom: 80px;">
										<ul class="categories__list">
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
							<div class="row">
								<div class="col-12 main__content">
									<div class="row">
										<?php 
											$total_articles = get_last_posts(10);
											while($article = mysqli_fetch_assoc($total_articles)) { 
												if( 2 == 3){
													echo "<div class=\"col-md-4 col-sm-6\">"; 
												}else if( 2 == 4){
													echo "<div class=\"col-md-3 col-sm-6\">"; 
												}else{
													echo "<div class=\"col-sm-6\">"; 
												}
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