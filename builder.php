<?php
	if(empty($_POST)){
		die();
	}
	require_once("help_functions.php");
	/*====================================================
										 PAGEBUILDER
	====================================================*/
	class PageBuilder{
		const FINISH_FOLDER = 'createdSites/';
		const POSTS_PER_PAGE = 2;
		private $stylesheet_type;
		private $sitename;
		private $folder;
		private $main_img;
		private $logo;
		private $header_type;
		private $main_type;
		private $footer_type;
		private $db_connection;
		private $head;
		private $head_single;
		private $head_category;
		private $header;
		private $main;
		private $single;
		private $single_type;
		private $category;
		private $category_type;
		private $footer;
		private $db_disconnect;
		public function __construct($post_array){
			$this->sitename = $post_array["sitename"];
			$this->description = $post_array["description"];
			$this->main_img = $post_array["main_img"];
			$this->logo = $post_array["logo"];
			$this->main_color = $post_array["main_color"];
			$this->lighter_color = different_shade(hex2rgb($this->main_color), "lighter", 10);
			$this->darken_color = different_shade(hex2rgb($this->main_color), "darken", 20);
			$this->folder = self::FINISH_FOLDER . $this->sitename;
			$this->stylesheet_type =  $post_array["stylesheet_type"];
			$this->header_type = $_POST["header_type"];
			$this->main_type = $_POST["main_type"];
			$this->single_type = $_POST["single_type"];
			$this->category_type = $_POST["category_type"];
			$this->footer_type = $_POST["footer_type"];
			$this->db_connection = require_once("connect_to_mysql.php"); 
			$this->functions = require_once("functions.php");
			$this->head = require_once("templates-part/head.php");
			$this->head_single = require_once("templates-part/head_single.php");
			$this->head_category = require_once("templates-part/head_category.php");
			$this->header = require_once("templates-part/header/header-{$this->header_type}.php");
			$this->main = require_once("templates-part/main/main-{$this->main_type}.php");
			$this->single = require_once("templates-part/single/single-{$this->single_type}.php");
			$this->category = require_once("templates-part/category/category-{$this->category_type}.php");
			$this->footer = require_once("templates-part/footer/footer-{$this->footer_type}.php");
			$this->db_disconnect = require_once("disconnect_mysql.php");
			$this->stylesheet = require_once("templates-part/stylesheet/style-{$this->stylesheet_type}.php");
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
			$strOut = $this->db_connection . $this->functions . $this->head_single . $this->header . $this->single . $this->footer . $this->db_disconnect;
			$f = fopen($this->folder . '/single.php', "w"); 
			fwrite($f, $strOut); 
			fclose($f);
			return $this;
		}
		public function build_category(){
			$strOut = $this->db_connection . $this->functions . $this->head_category . $this->header . $this->category . $this->footer . $this->db_disconnect;
			$f = fopen($this->folder . '/category.php', "w"); 
			fwrite($f, $strOut); 
			fclose($f);
			return $this;
		}
		public function build_css(){
			$strOut = $this->stylesheet;
			$f = fopen($this->folder . '/style.css', "w"); 
			fwrite($f, $strOut); 
			fclose($f);
			return $this;
		}
		public function render(){
			echo "<a href='{$this->folder}/homepage.php'>homepage</a>";
			return $this -> build_site_folder() -> build_homepage() -> build_single() -> build_category() -> build_css();
		}
	}
	$pageBuilder = new PageBuilder($_POST);
	$pageBuilder -> render();
