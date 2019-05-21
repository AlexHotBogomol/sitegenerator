<?php 
	return '<main style="padding-bottom: 100px;">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2 class="main__heading"><?php echo $category["category_name"]; ?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-9 main__content">
									<div class="row">
										<?php 
											$total_articles = get_posts_by_category($category["id"])->num_rows; 
											$page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1; 
											$num_results_on_page = ' . $this->posts_per_page . '; 
											$category_id = $category["id"];
											if ($stmt = mysqli_prepare($connection, "SELECT * FROM cat_articles WHERE category_id = $category_id ORDER BY id DESC LIMIT ?,?")) {
											$calc_page = ($page - 1) * $num_results_on_page; 
											mysqli_stmt_bind_param($stmt, "ii", $calc_page, $num_results_on_page); 
											mysqli_stmt_execute($stmt); 
											$result = mysqli_stmt_get_result($stmt); 
											while($article = mysqli_fetch_assoc($result)) { 
											echo "<div class=\"col-6\">"; 
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
								<?php $page_name = "category.php?category=$category_id&page"; ?>
								<?php display_pagination_on_page($page_name, $page, $total_articles, $num_results_on_page); ?> 
							</div>
						</div>
					</main>
					<?php 
		$stmt->close(); 
		} 
		?> ';