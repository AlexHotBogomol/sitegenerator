<?php

	set_time_limit(0);
	include("./sitemap.class.php");
	$sitemap = new sitemap();

	//игнорировать ссылки с расширениями:
	$sitemap->set_ignore(array("javascript:", ".css", ".js", ".ico", ".jpg", ".png", ".jpeg", ".swf", ".gif"));

	//ссылка Вашего сайта:
	$sitemap->get_links($_SERVER['HTTP_HOST']);

	header ("content-type: text/xml");
	$map = $sitemap->generate_sitemap();
	file_put_contents("sitemap.xml", $map);
?>