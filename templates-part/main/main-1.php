<?php 
	return '<main style="padding: 100px 0;">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2 class="text-center" style="padding-bottom: 40px;">Заголовок</h2>
									<p style="text-align: justify; padding-bottom: 85px;">
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
											$total_articles = get_all_posts()->num_rows; 
								 			$page = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1; 
											$num_results_on_page = ' . self::POSTS_PER_PAGE . '; 
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


			