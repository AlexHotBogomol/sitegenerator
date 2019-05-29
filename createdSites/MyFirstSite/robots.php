
Sitemap: /sitemap.xml
<?php
header("Content-type: text/plain;");
echo"User-agent: *
Disallow: *?*
Allow: /
Allow: /*.css
Allow: /*.js

";
echo 'Sitemap: http://'.$_SERVER['HTTP_HOST'].'/sitemap.xml';
