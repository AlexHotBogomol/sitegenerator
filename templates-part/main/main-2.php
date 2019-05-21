<?php 
	return '<main style="padding: 100px 0;">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2 class="text-center" class="main__heading" style="padding-bottom: 40px;">Заголовок</h2>
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
											$total_articles = get_last_posts(' . $this->posts_on_homepage . ');
											while($article = mysqli_fetch_assoc($total_articles)) { 
												if( ' . $this->posts_per_row . ' == 3){
													echo "<div class=\"col-4\">"; 
												}else if( ' . $this->posts_per_row . ' == 4){
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
					</main>';
