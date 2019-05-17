<?php 
	return '<main>
						<div class="container">
							<div class="row">
								<div class="col-9 main__content">
									<div class="row">
										<?php 
											$total_articles = get_all_posts()->num_rows; 
								 			$page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1; 
											$num_results_on_page = 1; 
											if ($stmt = mysqli_prepare($connection, "SELECT * FROM cat_articles ORDER BY id LIMIT ?,?")) { 
											$calc_page = ($page - 1) * $num_results_on_page; 
											mysqli_stmt_bind_param($stmt, "ii", $calc_page, $num_results_on_page); 
											mysqli_stmt_execute($stmt); 
											$result = mysqli_stmt_get_result($stmt); 
											while($article = mysqli_fetch_assoc($result)) { 
												echo "<div class=\"col-6\">"; 
												echo "<img src=\"{$article["img_link"]}\">"; 
												$safe_article_id = urlencode($article["id"]); 
											  echo "<a href=\"single.php?article={$safe_article_id}\">"; 
											  echo htmlentities($article["title"]); 
												echo "</a>"; 
												echo "<p>"; 
												echo htmlentities($article["excerpt"]); 
												echo "</p>"; 
												echo "</div>"; 
											} 
										 ?>
									</div>
								</div>
							<div class="col-3 bg-info sidebar">
								<h4>Все категории</h4>
								<ul>
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
						<div class="row">
							<?php display_pagination_on_page("homepage.php", $page, $total_articles, $num_results_on_page); ?> 
						</div>
					</div>
				</main>
		 <?php 
		$stmt->close(); 
		} 
		?> ';


			