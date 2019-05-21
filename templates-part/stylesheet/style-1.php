<?php
	return 'html, body{
						min-width: 320px;
						overflow-x: hidden;
						height: 100%;
						color: ' . $this->text_color . ';
						font-size: ' . $this->text_base_size . ';
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
					a{
						color:' . $this->text_color . ';
						text-decoration: none;
					} 
					img{
							max-width: 100%;
					}
					.main__heading{
						font-size: 2.37rem;
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
					.post_card img{
						margin-bottom: 20px;
					}
					.post_card a{
						font-size: 1.16rem;
						text-decoration: none;
						color:  ' . $this->main_color . ';
						margin-bottom: 5px;
					}
					.post_card p{
						font-size: 1rem;
					}
					';
			?>