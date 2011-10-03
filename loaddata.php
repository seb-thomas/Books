<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Load Data test</title>

  <style type="text/css">
 @import url("testingcss.css");	
  </style>
</head>

<body>
<?php
$i = ( int )1; 

$indexjsonurl = "http://www.bbc.co.uk/programmes/b006r9xr/episodes/player.json/";
$indexjson = file_get_contents($indexjsonurl,0,null,null);
$indexjson_output = json_decode($indexjson);

foreach ( $indexjson_output->episodes as $indextrend )
{
    $jsonurl = "http://www.bbc.co.uk/programmes/{$indextrend->programme->pid}.json/";
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);

echo "{$json_output->programme->pid} <br>";
echo "{$json_output->programme->display_title->title} <br>";
echo "{$json_output->programme->display_title->subtitle} <br>";
echo "{$json_output->programme->medium_synopsis} <br><br>";

foreach ( $json_output->programme->supporting_content_items as $trend )
{
	if (strpos($trend->content, "is published by") !== false)
	{
	    echo "{$trend->title} <br> {$trend->content} <br> <a href=\"{$trend->link_uri}\">{$trend->link_title}</a> <br> <br>";
	}	
}
    if ( $i == ( int ) 0)
    {
        break;
    }
    else
    {
        $i++;
    }
}



?>

</body>
</html>
