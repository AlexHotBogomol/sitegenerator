<?php 
	return '<div class="wrapper">
						<div class="content">	
							<header class="header">
								<div class="top-panel bg-white" style="padding: 15px 0;">
									<div class="container">
										<div class="row">
											<div class="col-12">
												<div class="header__menu d-flex justify-content-between align-items-center">
													<a href="/">
														<img src="' . $this->logo . '" alt = "' . $this->sitename . '">
													</a>
													<nav class="nav">
														<ul class="menu">
															<li class="menu-item">
																<a class="menu-link" href="/">
																	Home
																</a>	
															</li>

															<li class="menu-item">
																<span class="menu-link">Categories</span>
																<ul class="sub-menu">
																<?php 
																	$categories_set = get_all_categories(); 
																	while($category_item = mysqli_fetch_assoc($categories_set)) { 
																		echo "<li class=\"sub-menu-item\">"; 
																			$safe_category_name = urlencode($category_item["category_name"]); 
																	    echo "<a class=\"menu-link\" href=\"/category/{$safe_category_name}\">";  
																	    	echo htmlentities($category_item["category_name"]);  
																			echo "</a>"; 
																		echo "</li>"; 
																	} 
																	mysqli_free_result($categories_set);
																 ?>
																</ul>
															</li>
														</ul>	
													</nav>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="header_banner" style="background: url(' . $this->main_img . ') no-repeat center top / cover;">
									
								</div>
							</header>';
?>