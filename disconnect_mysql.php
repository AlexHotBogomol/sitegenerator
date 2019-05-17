<?php
  // Close database connection
	return ' <?php if (isset($connection)) {
								mysqli_close($connection); 
 					} ?> ';
?>