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
		//DataBase
		private $dbhost;
		private $dbuser;
		private $dbpass;
		private $dbname;
		//Posts
		private $posts_per_page;
		private $posts_on_homepage;
		private $posts_per_row;
		//Variables
		private $sitename;
		private $folder;
		private $main_img;
		private $logo;
		private $header_type;
		private $main_type;
		private $single_type;
		private $category_type;
		private $footer_type;
		private $stylesheet_type;
		private $sidebar_align;
		
		//Stylesheet
		private $main_color;
		private $lighter_color;
		private $darken_color;
		private $text_color;
		private $text_base_size;
		private $text_font_family;

		//Site Blocks
		private $db_connection;
		private $head;
		private $head_single;
		private $head_category;
		private $header;
		private $main;
		private $single;
		private $category;
		private $footer;
		private $db_disconnect;
		public function __construct($post_array){
			//DataBase
			$this->dbhost = "'" . $post_array["dbhost"] . "'";
			$this->dbuser = "'" . $post_array["dbuser"] . "'";
			$this->dbpass = "'" . $post_array["dbpass"] . "'";
			$this->dbname = "'" . $post_array["dbname"] . "'";

			$this->sitename = $post_array["sitename"];
			$this->description = $post_array["description"];
			$this->main_img = $post_array["main_img"];
			$this->logo = $post_array["logo"];
			$this->folder = self::FINISH_FOLDER . $this->sitename;

			$this->header_type = $_POST["header_type"];
			$this->main_type = $_POST["main_type"];
			$this->single_type = $_POST["single_type"];
			$this->category_type = $_POST["category_type"];
			$this->footer_type = $_POST["footer_type"];

			$this->posts_per_page = $_POST["posts_per_page"];
			$this->posts_on_homepage = $_POST["posts_on_homepage"];
			$this->posts_per_row = $_POST["posts_per_row"];

			$this->sidebar_align = $_POST["sidebar_align"];

			$this->footer_text = $_POST["footer_text"];
			$this->footer_align = $_POST["footer_align"];
			$this->footer_bg = $_POST["footer_bg"];
			$this->footer_text_color = $_POST["footer_text_color"];

			$this->main_color = $post_array["main_color"];
			$this->lighter_color = different_shade(hex2rgb($this->main_color), "lighter", 20);
			$this->darken_color = different_shade(hex2rgb($this->main_color), "darken", 20);
			$this->text_color = $post_array["text_color"];
			$this->text_base_size = $post_array["text_base_size"] . "px";
			switch ($post_array["text_font_family"]){
				case 'Ubuntu':
					$this->text_font_family = "Ubuntu, Arial, sans-serif";
					break;
				case 'Open Sans':
					$this->text_font_family = "Open Sans, Arial, sans-serif";
					break;
				case 'Roboto':
					$this->text_font_family = "Roboto, Arial, sans-serif";
					break;
				case 'Lato':
					$this->text_font_family = "Lato, Arial, sans-serif";
					break;
				case 'Poppins':
					$this->text_font_family = "Poppins, Arial, sans-serif";
					break;
			}
			$this->stylesheet_type =  $post_array["stylesheet_type"];
			$this->calculate_site_blocks();
		}
		public function calculate_site_blocks(){
			$this->db_connection = require_once("connect_to_mysql.php"); 
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
	 	public function copy_helpers(){
	 		copy('helpers/functions.php', $this->folder . '/functions.php');
	 		copy('helpers/.htaccess', $this->folder . '/.htaccess');
	 		copy('helpers/robots.php', $this->folder . '/robots.php');
	 		copy('helpers/sitemap.class.php', $this->folder . '/sitemap.class.php');
	 		copy('helpers/sitemap.php', $this->folder . '/sitemap.php');
	 		
	 		return $this;
	 	}
		public function build_homepage(){
			$strOut = $this->db_connection . $this->head . $this->header . $this->main . $this->footer . $this->db_disconnect;
			$f = fopen($this->folder . '/index.php', "w"); 
			fwrite($f, $strOut); 
			fclose($f);  
			return $this;
		}
		public function build_single(){
			$strOut = $this->db_connection . $this->head_single . $this->header . $this->single . $this->footer . $this->db_disconnect;
			$f = fopen($this->folder . '/single.php', "w"); 
			fwrite($f, $strOut); 
			fclose($f);
			return $this;
		}
		public function build_category(){
			$strOut = $this->db_connection . $this->head_category . $this->header . $this->category . $this->footer . $this->db_disconnect;
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
			return $this -> build_site_folder() -> copy_helpers() ->  build_homepage() -> build_single() -> build_category() -> build_css();
		}
	}
	$pageBuilder = new PageBuilder($_POST);
	$pageBuilder -> render();
