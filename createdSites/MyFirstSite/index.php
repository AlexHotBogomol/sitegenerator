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
			?><!DOCTYPE html>
					<html lang="en">
						<head>
							<meta charset="UTF-8">
								<title>MyFirstSite</title>
							<meta name="description" content="superpupersite">
							<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
							<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Poppins|Roboto|Ubuntu&display=swap" rel="stylesheet">
							<link rel="stylesheet" href="./style.css">
						</head>
					<body class="home"><div class="wrapper">
						<div class="content">	
							<header>
								<div class="top-panel bg-white" style="padding: 15px 0;">
									<div class="container">
										<div class="row">
											<div class="col-12">
												<div class="header__menu d-flex justify-content-between align-items-center">
													<a href="./">
														<img src="https://res.cloudinary.com/emailsandereverest/image/upload/v1558083941/oilcbd/logo.png" alt = "MyFirstSite">
													</a>
													<a href="./" class="text-dark">
														Home
													</a>	
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="header_banner" style="background: url(https://res.cloudinary.com/emailsandereverest/image/upload/v1558083944/oilcbd/first-bg.jpg) no-repeat center top / cover; height: 600px;">
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
													$safe_category_id = urlencode($category["id"]); 
										   		echo "<a href=\"category.php?category={$safe_category_id}\">";  
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
												if( 3 == 3){
													echo "<div class=\"col-4\">"; 
												}else if( 3 == 4){
													echo "<div class=\"col-3\">"; 
												}else{
													echo "<div class=\"col-6\">"; 
												}
													echo "<div class=\"post_card\">";
														echo "<img src=\"{$article["img_link"]}\">"; 
														$safe_article_id = urlencode($article["id"]); 
													  echo "<a href=\"single.php?article={$safe_article_id}\">"; 
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
						<footer style="background: #111;">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<p style="color: #fff; text-align: center; ">
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