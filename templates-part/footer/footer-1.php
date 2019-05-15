<?php 
	$footer = '<footer>'
		. '<div class="container">'
		. 	'<div class="row">'
		. 		'<div class="col-6 bg-dark" style="height:100px;">'
		. 		'</div>'
		. 		'<div class="col-6 bg-warning" style="height:100px;">'
		. 		'</div>' 
		. 	'</div>'
		. '</div>'
		.'</footer>'
		.'</body>'
		.'</html>'
		.'<?php'
		.'if (isset($connection)) {'
		.' mysqli_close($connection);'
		.'}'	
		.'?>';
?>