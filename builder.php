<?php
	if(empty($_POST)){
		die();
	}
	/*====================================================
										 PAGEBUILDER
	====================================================*/
	class PageBuilder{
		const FINISH_FOLDER = 'createdSites/';
		private $sitename;
		private $folder;
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
			$this->folder = self::FINISH_FOLDER . $this->sitename;
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
			$strOut = 'img{max-width: 100%;}
									html {
										font-family: Tahoma, Geneva, sans-serif;
										padding: 20px;
										background-color: #F8F9F9;
									}
									table {
										border-collapse: collapse;
										width: 500px;
									}
									td, th {
										padding: 10px;
									}
									th {
										background-color: #54585d;
										color: #ffffff;
										font-weight: bold;
										font-size: 13px;
										border: 1px solid #54585d;
									}
									td {
										color: #636363;
										border: 1px solid #dddfe1;
									}
									tr {
										background-color: #f9fafb;
									}
									tr:nth-child(odd) {
										background-color: #ffffff;
									}
									.pagination {
										list-style-type: none;
										padding: 10px 0;
										display: inline-flex;
										justify-content: space-between;
										box-sizing: border-box;
									}
									.pagination li {
										box-sizing: border-box;
										padding-right: 10px;
									}
									.pagination li a {
										box-sizing: border-box;
										background-color: #e2e6e6;
										padding: 8px;
										text-decoration: none;
										font-size: 12px;
										font-weight: bold;
										color: #616872;
										border-radius: 4px;
									}
									.pagination li a:hover {
										background-color: #d4dada;
									}
									.pagination .next a, .pagination .prev a {
										text-transform: uppercase;
										font-size: 12px;
									}
									.pagination .currentpage a {
										background-color: #518acb;
										color: #fff;
									}
									.pagination .currentpage a:hover {
										background-color: #518acb;
									}';
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
