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
		private $head;
		const FINISH_FOLDER = 'createdSites/';
		public function __construct($post_array){
			$this->sitename = $post_array["sitename"];
			$this->description = $post_array["description"];
			$this->folder = self::FINISH_FOLDER . $this->sitename;
			$this->header_type = $_POST["header_type"];
			$this->main_type = $_POST["main_type"];
			$this->footer_type = $_POST["footer_type"];
			$this->db_connection = require_once("connect_to_mysql.php"); 
			$this->functions = require_once("functions.php");
			$this->head = require_once("templates-part/head.php");
			$this->header = require_once("templates-part/header/header-{$this->header_type}.php");
			$this->main = require_once("templates-part/main/main-{$this->main_type}.php");
			$this->footer = require_once("templates-part/footer/footer-{$this->footer_type}.php");
			$this->db_disconnect = require_once("disconnect_mysql.php");
		}
		public function build_site_folder(){
			if ( !file_exists($this->folder) && !is_dir($this->folder)) {
			    mkdir($this->folder);       
			} 
			return $this;
		}
		public function build_homepage(){
			$strOut = $this->db_connection . $this->functions . $this->head . $this->header . $this->main . $this->footer . $this->db_disconnect;
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
		public function build_category(){
			$strOut = '123456';
			$f = fopen($this->folder . '/category.php', "w"); 
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
