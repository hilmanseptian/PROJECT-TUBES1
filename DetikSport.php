<html>
<head>
<title>Detik Sport</title>
<style>
p.padding
{
padding-top:20px;
padding-bottom:20px;
padding-right:40px;
padding-left:40px;
color:#18091989;
}
</style>
</head>
<body>
<p class="padding">
<h1>RSS FEED "DETIK SPORT"</h1>
<?php
$html = "";
$url = "http://rss.detik.com/index.php/sport";
$xml = simplexml_load_file($url);
 
for($i = 0; $i < 5; $i++){
 
    $title = $xml->channel->item[$i]->title;
    $link = $xml->channel->item[$i]->link;
    $description = $xml->channel->item[$i]->description;
    $pubDate = $xml->channel->item[$i]->pubDate;
 
    $html .= "<a href='$link'><h3>$title</h3></a>";
    $html .= "$description";
    $html .= "<br />$pubDate<hr />";
}
echo $html;
?>
 </p>
 </body>
 </html>
