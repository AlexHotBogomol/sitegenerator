<?php 
	$main = '<main>'
		. '<div class="container">'
		. 	'<div class="row">'
		. 		'<div class="col-9 main__content">'
		.			'<?php '
		.			'	$articles = get_all_posts(); '
		.			'	while($article = mysqli_fetch_assoc($articles)) { '
		.			'		echo "<li>"; '
		.			'		$safe_article_id = urlencode($article["id"]); '
		.			'		echo "<a href=\"single.php?article={$safe_article_id}\">"; '
		.			'		echo htmlentities($article["excerpt"]); '
		.			'		echo "</a>"; '
		.			'		echo "</li>"; '
		.			'	} '
		.			' ?>'
		. 		'</div>'
		. 		'<div class="col-3 bg-info sidebar" style="height:100px;">'
		.     '<h4>Подобные посты</h4>'
		. 		'</div>' 
		. 	'</div>'
		. '</div>'
		.'</main>';

		// $articles = get_all_posts();
		// while($article = mysqli_fetch_assoc($articles)) {
		// 	echo "<li>";
		// 	$safe_article_id = urlencode($article["id"]);
		// 	echo "<a href=\"single.php?article={$safe_article_id}\">";
		// 	echo htmlentities($article["excerpt"]);
		// 	echo "</a>";
		// 	echo "</li>";
		// }