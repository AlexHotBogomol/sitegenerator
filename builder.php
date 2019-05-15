<?php
	if(empty($_POST)){
		die();
	}
	/*====================================================
										 PAGEBUILDER
	====================================================*/
	class PageBuilder{
		private $sitename;
		private $folder;
		private $header_type;
		private $main_type;
		private $footer_type;
		public function __construct($post_array){
			$this->sitename = $post_array["sitename"];
			$this->description = $post_array["description"];
			$this->folder = 'createdSites/' . $this->sitename;
			$this->header_type = $_POST["header_type"];
			$this->main_type = $_POST["main_type"];
			$this->footer_type = $_POST["footer_type"];
		}
		public function build_site_folder(){
			if ( !file_exists($this->folder) && !is_dir($this->folder)) {
			    mkdir($this->folder);       
			} 
			return $this;
		}
		public function build_homepage(){
			$head = ' <!DOCTYPE html>'
							. '<html lang="en">'
							. '<head>'
								. '<meta charset="UTF-8">'
								. '<title>' . $this->sitename .'</title>'
								. '<meta name="description" content="' . $this->description . '">'
								. '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">'
								. '<link rel="stylesheet" href="style.css">'
							. '</head>'
							. '<body>';
			require_once("connect_to_mysql.php"); //return string $db_connection
			require_once("functions.php"); //return string $db_connection
			require_once("templates-part/header/header-{$this->header_type}.php"); //return string $header
			require_once("templates-part/main/main-{$this->main_type}.php"); //return string $header
			require_once("templates-part/footer/footer-{$this->footer_type}.php"); //return string $footer
			require_once("disconnect_mysql.php"); //return string $db_disconnect
			$strOut = $db_connection . $functions . $head . $header . $main . $footer . $db_disconnect;
			$f = fopen($this->folder . '/homepage.php', "w"); 
			fwrite($f, $strOut); 
			fclose($f);  
			return $this;
		}
		public function build_single(){
			$strOut = '123456';
			$f = fopen($this->folder . '/single.php', "w"); 
			fwrite($f, $strOut); 
			fclose($f);
			return $this;
		}
		public function build_css(){
			$strOut = 'img{max-width: 100%;}';
			$f = fopen($this->folder . '/style.css', "w"); 
			fwrite($f, $strOut); 
			fclose($f);
			return $this;
		}
		public function render(){
			echo "<a href='{$this->folder}/homepage.php'>homepage</a>";
			return $this -> build_site_folder() -> build_homepage() -> build_single() -> build_css();
		}
	}
	$pageBuilder = new PageBuilder($_POST);
	$pageBuilder -> render();
