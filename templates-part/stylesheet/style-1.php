<?php
	return 'img{max-width: 100%;}
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
						';
			?>