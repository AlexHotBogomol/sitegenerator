<?php
  // 1. Create a database connection
  return '<?php 
          $connection = mysqli_connect(' . $this->dbhost . ', ' . $this->dbuser . ', ' . $this->dbpass . ', ' . $this->dbname . ');
          if(mysqli_connect_errno()) {
            die("Database connection failed: " . 
              mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")"
              );
            }
          ?>';


