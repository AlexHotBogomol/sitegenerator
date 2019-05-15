<?php
  // Close database connection
	$db_disconnect = ' <?php if (isset($connection)) { '
	. ' mysqli_close($connection); '
	. ' } ?> ';
?>