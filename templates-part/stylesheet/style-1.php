<?php
	if($this->posts_per_row == 3){
		$imgHeight = "220px";
	} else if($this->posts_per_row == 4){
		$imgHeight = "160px";
	} else {
		$imgHeight = "340px";
	}
	return 'html, body{
						min-width: 320px;
						overflow-x: hidden;
						height: 100%;
						color: ' . $this->text_color . ';
						font-size: ' . $this->text_base_size . ';
						font-family: ' . $this->text_font_family . ';
					}
					h1, h2, h3, h4, h5, h6{
						font-family: ' . $this->text_font_family . ';
					}
					.wrapper {
					  display: flex;
					  flex-direction: column;
					  height: 100%;
					}
					.content {
					  flex: 1 0 auto;
					}
					.footer {
					  flex: 0 0 auto;
					}
					.header .menu, .header .sub-menu{
						list-style: none;
				    padding: 0;
				    margin: 0;
					}
					.header .menu .menu-item{
						display: inline-block;
						margin-left: 20px;
						position: relative;
					}
					.header .sub-menu{
						position: absolute;
						z-index: 1;
						top: 0;
						left: -20px;
				    padding: 20px;
						transition: 0.2s;
				    background: #fff;
				   	transform: scaleY(0);
					}
					.header .menu .menu-link{
						color:' . $this->text_color . ';
						text-decoration: none;
						cursor: pointer;
					}
					.header .menu .menu-link:hover{
						color: ' . $this->main_color . ';
					}
					.header .menu .menu-item:hover .sub-menu{
				    top: 100%;
				    transition: 0.2s;
				    transform: scaleY(1);
					}
					.header .menu{
						list-style: none;
				    padding: 0;
				    margin: 0;
					}
					a{
						color:' . $this->text_color . ';
						text-decoration: none;
					} 
					img{
							max-width: 100%;
					}
					.main__heading{
						font-size: 2rem;
						padding-bottom: 40px;
					}
					.main__desc{
						font-size: 1rem;
						line-height: 1.8;
					}
					.pagination {
						list-style-type: none;
						padding: 30px 0;
						display: inline-flex;
						justify-content: space-between;
						box-sizing: border-box;
						margin-bottom: 0;
					}
					.pagination li {
						box-sizing: border-box;
						padding-right: 10px;
					}
					.pagination li a {
						box-sizing: border-box;
						background-color: ' . $this->main_color . ';
						padding: 8px;
						text-decoration: none;
						font-size: 12px;
						font-weight: bold;
						color: #616872;
						border-radius: 4px;
					}
					.pagination li a:hover {
						background-color: ' . $this->lighter_color . ';
					}
					.pagination .next a, .pagination .prev a {
						text-transform: uppercase;
						font-size: 12px;
					}
					.pagination .currentpage a {
						background-color: ' . $this->darken_color . ';
						color: #fff;
					}
					.pagination .currentpage a:hover {
						background-color: ' . $this->darken_color . ';
					}
					.category .header_banner, .single .header_banner{
						display: none;
					}
					.category .top-panel, .single .top-panel{
						border-bottom: 1px solid ' . $this->main_color . ';
    				margin-bottom: 50px;
					}
					.header_banner{
						height: 600px;
					}
					.categories__list{
						list-style: none;
				    padding: 0;
				    margin: 0;
				    display: flex;
				    justify-content: center;
				    align-items: center;
					}
					.categories__list li{
						margin-left: 10px;
						margin-right: 10px;
					}
					.categories__list li a{
						padding-left: 20px;
						padding-right: 20px;
						padding-top: 10px;
						padding-bottom: 10px;
						text-decoration: none;
						color: #fff;
						background-color: ' . $this->main_color . ';
						border-radius: 5px;
						font-size: 1.16rem;
						font-weight: 500;
					}
					.single__img{
						margin-bottom: 30px;
					}
					.post_card a{
						font-size: 1.16rem;
						text-decoration: none;
						color:  ' . $this->main_color . ';
						margin-bottom: 5px;
					}
					.post_card a:hover{
						color: ' . $this->lighter_color . ';
					}
					.categories__list li a{
						background-color: ' . $this->lighter_color . ';
					}
					.post_card{
						margin-bottom: 30px;
					}
					.post_card p{
						font-size: 1rem;
					}
					.footer{
						padding-top: 30px;
						padding-bottom: 30px;
					}
					.footer p{
						margin-bottom: 0;
					}
					.sidebar h4{
				    margin: 0;
    				padding-bottom: 20px;
    				font-size: 1.16rem;
					}
					.sidebar ul{
						list-style: none;
						padding: 0;
						margin: 0;
					}
					.sidebar ul li{
						margin-bottom: 5px;
					}
					.sidebar ul li a{
						color:  ' . $this->main_color . ';
						text-decoration: none;
					}
					.sidebar ul li a:hover{ 
						color: ' . $this->lighter_color . ';
					}
					.card__img{
						height: 220px;
				    overflow: hidden;
				    display: flex;
				    justify-content: center;
				    align-items: center;
				    margin-bottom: 20px;
					}
					.home .card__img{
						height: ' . $imgHeight . ';
					}
					';
			
