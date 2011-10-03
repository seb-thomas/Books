<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Front Row</title>

  <style type="text/css">
 @import url("prodcss.css");	
  </style>
  
</head>

<body>
<?php include("title.php"); ?>
<?php
$brandjsonurl = "http://www.bbc.co.uk/programmes/b006qsq5.json";
$brandjson = file_get_contents($brandjsonurl,0,null,null);
$brandjson_output = json_decode($brandjson);

echo "<h2>{$brandjson_output->programme->title}</h2><h3>{$brandjson_output->programme->short_synopsis}</h3>";
?>
<div class="leftmenu">
<?php 
include("menu.php");
?>
</div>
<div id="content">
<?php
$i = ( int )1;
$n = 1 + $_POST["number"];
    if ( $i == ( int )$n)
    {
        break;
    }
    else
    {
        $i++;
    }
$indexjsonurl = "http://www.bbc.co.uk/programmes/b006qsq5/episodes/player.json/";
$indexjson = file_get_contents($indexjsonurl,0,null,null);
$indexjson_output = json_decode($indexjson);

foreach ( $indexjson_output->episodes as $indextrend )
{
    $jsonurl = "http://www.bbc.co.uk/programmes/{$indextrend->programme->pid}.json/";
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);

foreach ( $json_output->programme->supporting_content_items as $trend )
{
	if (strpos($trend->content, "is published by") !== false)
	{
	    echo "<p><a href=\"http://www.bbc.co.uk/programmes/{$indextrend->programme->pid}\">{$trend->title}, {$json_output->programme->display_title->subtitle}</a><br> {$trend->content} <br> <a href=\"{$trend->link_uri}\">{$trend->link_title}</a></p>";
	}	
}
    if ( $i == ( int ) $n)
    {
        break;
    }
    else
    {
        $i++;
    }
}
?>
</div>
</body>
</html>
