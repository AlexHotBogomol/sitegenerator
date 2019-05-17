<?php
	return ' <?php function get_all_posts(){
				global $connection;
				$query  = "SELECT * ";
				$query .= "FROM cat_articles ";
				$query .= "ORDER BY id DESC";
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
				$query .= "WHERE id = {$id} ";
				$query .= "ORDER BY id DESC";
				$article = mysqli_query($connection, $query);
				return $article;
			} 
			function display_pagination_on_page($page_name, $page, $total_post, $posts_per_page){
				if (ceil($total_post / $posts_per_page) > 0):
				 	echo "<ul class=\"pagination\">";
					 if ($page > 1):
					 	echo "<li class=\"prev\"><a href=\"$page_name?page=";
					 	echo $page-1;
					 	echo "\">Prev</a></li>";
					 endif; 

					 if ($page > 3):
					 	echo "<li class=\"start\"><a href=\"$page_name?page=1\">1</a></li>"; 
					 	echo "<li class=\"dots\">...</li> ";
					 endif; 

					 if ($page-2 > 0): 
					  echo "<li class=\"page\"><a href=\"$page_name?page=";
					  echo $page-2;
					  echo "\">";
					  echo $page-2;
					  echo "</a></li>";
					 endif; 
					 if ($page-1 > 0):
					 	echo "<li class=\"page\"><a href=\"$page_name?page=";
				 	  echo  $page-1; 
				 	  echo "\">";
				 	  echo $page-1;
				 	  echo "</a></li>";
					 endif;
					
					 echo "<li class=\"currentpage\"><a href=\"$page_name?page=";
					 echo $page;
					 echo "\">";
					 echo $page;
					 echo "</a></li>";

					 if ($page+1 < ceil($total_post / $posts_per_page)+1):
					 	echo "<li class=\"page\"><a href=\"$page_name?page=";
					 	echo $page+1;
					 	echo "\">"; 
					 	echo $page+1;
					 	echo "</a></li>"; 
					 endif;

					 if ($page+2 < ceil($total_post / $posts_per_page)+1): 
					 	echo "<li class=\"page\"><a href=\"$page_name?page=";
					 	echo $page+2;
					 	echo "\">";
					 	echo $page+2;
					 	echo "</a></li>";  
					 endif;

					 if ($page < ceil($total_post / $posts_per_page)-2):
					  echo "li class=\"dots\">...</li>"; 
					  echo "<li class=\"end\"><a href=\"$page_name?page=";
					  echo  ceil($total_post / $posts_per_page);
					  echo "\">";
					  echo ceil($total_post / $posts_per_page);
					  echo "</a></li>";  
					 endif; 

					 if ($page < ceil($total_post / $posts_per_page)):
					 echo "<li class=\"next\"><a href=\"$page_name?page=";
					 echo $page+1;
					 echo "\">Next</a></li>";
					 endif;
				 echo "</ul>";
				endif;
			} 
			?>';
?>

	
