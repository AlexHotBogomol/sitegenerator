<?php $dbhost = "localhost";
      $dbuser = "CSVimport_admin";
      $dbpass = "111111";
      $dbname = "CSVimport_db";
      $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
      if(mysqli_connect_errno()) {
        die("Database connection failed: " . 
          mysqli_connect_error() . 
            " (" . mysqli_connect_errno() . ")"
          );
        }
      ?> <?php function get_all_posts(){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM cat_articles ";
				$query .= "ORDER BY id DESC";
				$articles_set = mysqli_query($connection, $query);
				return $articles_set;
			}
			function get_last_posts($limit){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM cat_articles ";
				$query .= "ORDER BY id DESC ";
				$query .= "LIMIT {$limit}";
				$articles_set = mysqli_query($connection, $query);
				return $articles_set;
			}
			function get_all_categories(){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM categories "; 
				$query .= "ORDER BY id ASC";
				$categories_set = mysqli_query($connection, $query);
				return $categories_set;
			}
			function get_category_by_id($category_id){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM categories ";
				$query .= "WHERE id = {$category_id}";
				$category = mysqli_query($connection, $query);
				return $category;  
			}
			function get_posts_by_category($category_id){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM cat_articles ";
				$query .= "WHERE category_id = {$category_id} ";
				$query .= "ORDER BY id DESC";
				$articles_set = mysqli_query($connection, $query);
				return $articles_set;
			}
			function get_post_by_id($id){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM cat_articles ";
				$query .= "WHERE id = {$id}";
				$article = mysqli_query($connection, $query);
				return $article;
			} 
			function display_pagination_on_page($page_name, $page, $total_post, $posts_per_page){
				if (ceil($total_post / $posts_per_page) > 0):
				 	echo "<ul class=\"pagination\">";
					 if ($page > 1):
					 	echo "<li class=\"prev\"><a href=\"$page_name=";
					 	echo $page-1;
					 	echo "\">Prev</a></li>";
					 endif; 

					 if ($page > 3):
					 	echo "<li class=\"start\"><a href=\"$page_name=1\">1</a></li>"; 
					 	echo "<li class=\"dots\">...</li> ";
					 endif; 

					 if ($page-2 > 0): 
					  echo "<li class=\"page\"><a href=\"$page_name=";
					  echo $page-2;
					  echo "\">";
					  echo $page-2;
					  echo "</a></li>";
					 endif; 
					 if ($page-1 > 0):
					 	echo "<li class=\"page\"><a href=\"$page_name=";
				 	  echo  $page-1; 
				 	  echo "\">";
				 	  echo $page-1;
				 	  echo "</a></li>";
					 endif;
					
					 echo "<li class=\"currentpage\"><a href=\"$page_name=";
					 echo $page;
					 echo "\">";
					 echo $page;
					 echo "</a></li>";

					 if ($page+1 < ceil($total_post / $posts_per_page)+1):
					 	echo "<li class=\"page\"><a href=\"$page_name=";
					 	echo $page+1;
					 	echo "\">"; 
					 	echo $page+1;
					 	echo "</a></li>"; 
					 endif;

					 if ($page+2 < ceil($total_post / $posts_per_page)+1): 
					 	echo "<li class=\"page\"><a href=\"$page_name=";
					 	echo $page+2;
					 	echo "\">";
					 	echo $page+2;
					 	echo "</a></li>";  
					 endif;

					 if ($page < ceil($total_post / $posts_per_page)-2):
					  echo "li class=\"dots\">...</li>"; 
					  echo "<li class=\"end\"><a href=\"$page_name=";
					  echo  ceil($total_post / $posts_per_page);
					  echo "\">";
					  echo ceil($total_post / $posts_per_page);
					  echo "</a></li>";  
					 endif; 

					 if ($page < ceil($total_post / $posts_per_page)):
					 echo "<li class=\"next\"><a href=\"$page_name=";
					 echo $page+1;
					 echo "\">Next</a></li>";
					 endif;
				 echo "</ul>";
				endif;
			} 
			?><?php
						if(!(isset($_GET) && !empty($_GET))){ 
							echo "wrong link"; 
							die();
						}
						$article = mysqli_fetch_assoc(get_post_by_id($_GET["article"]));
					?>
					<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title><?php echo $article["title"]; ?></title>
						<meta name="description" content="<?php echo $article["title"]; ?>">
						<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Poppins|Roboto|Ubuntu&display=swap" rel="stylesheet">
						<link rel="stylesheet" href="./style.css">
					</head>
					<body class="single"><div class="wrapper">
						<div class="content">	
							<header class="header">
								<div class="top-panel bg-white" style="padding: 15px 0;">
									<div class="container">
										<div class="row">
											<div class="col-12">
												<div class="header__menu d-flex justify-content-between align-items-center">
													<a href="./">
														<img src="https://res.cloudinary.com/emailsandereverest/image/upload/v1558083941/oilcbd/logo.png" alt = "MyFirstSite">
													</a>
													<nav class="nav">
														<ul class="menu">
															<li class="menu-item">
																<a class="menu-link" href="./">
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
																			$safe_category_id = urlencode($category_item["id"]); 
																	    echo "<a class=\"menu-link\" href=\"category.php?category={$safe_category_id}\">";  
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
										$safe_post_id = urlencode($post["id"]); 
										  echo "<a href=\"single.php?article={$safe_post_id}\">";  
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
											<p style="color: #fff; text-align: center; ">
												Теasfsafafsasf
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