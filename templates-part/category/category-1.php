<?php 
	if($this->sidebar_align == "left"){
		$flex_direction = "flex-row-reverse";
	}else{
		$flex_direction = "flex-row";
	}
	return '<main style="padding-bottom: 100px;">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2 class="main__heading"><?php echo $category["category_name"]; ?></h2>
								</div>
							</div>
							<div class="row ' . $flex_direction . '">
								<div class="col-8 main__content">
									<div class="row">
										<?php 
											$total_articles = get_posts_by_category($category["id"])->num_rows; 
											$page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1; 
											$num_results_on_page = ' . $this->posts_per_page . '; 
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
		?> ';