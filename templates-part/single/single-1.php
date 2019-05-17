<?php
	return '<main>
						<div class="container">
							<div class="row">
								<div class="col-9 main__content">
									<div class="row">
										<div class="col-12">
											<div class="single__img">
												<h1 class="single__title"><?php echo $article["title"]; ?></h1>
												<img src="<?php echo $article["img_link"]; ?>">
												<p class="single__description"><?php echo $article["description"]; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-3 bg-info sidebar">
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
					</main>';
