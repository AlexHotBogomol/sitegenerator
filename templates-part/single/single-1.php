<?php
	if($this->sidebar_align == "left"){
		$flex_direction = "flex-row-reverse";
	}else{
		$flex_direction = "flex-row";
	}
	return '<main style="padding-bottom: 100px;">
						<div class="container">
							<div class="row ' . $flex_direction . '">
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
					</main>';
