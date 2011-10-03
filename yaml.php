<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP/JSON BBC tests</title>

<script type="text/javascript">
var bbcData
function cb(data){
    bbcData = data;
    document.write(bbcData[0].schedule.service.type);
}
</script>
<script type="text/javascript"
src="http://www.bbc.co.uk/radio4/programmes/schedules/fm/today.json?callback=cb&count=1">
</script>
  <style type="text/css">
 @import url("testingcss.css");	
  </style>


</head>

<body>
<b>Test 1) First JavaScript/JSON test using Twitter API:</b>
<br><br>
<script type="text/javascript">
var myTweets
function bumfart(data){
    myTweets = data;
    document.write(myTweets[0].user.name + "<br>");
	document.write(myTweets[0].text + "<br>");
	document.write(myTweets[0].created_at + "<br>");
}
</script>
<script type="text/javascript"
src="http://twitter.com/statuses/user_timeline/alexkammerling.json?callback=bumfart&count=1">
</script> <br>
<hr>
<b>Test 2) Adapted different Twitter PHP/JSON example to work with BBC API:</b><br><br>
<code>
$jsonurl = "http://www.bbc.co.uk/programmes/b006r9xr.json"; <br>
$json = file_get_contents($jsonurl,0,null,null); <br>
$json_output = json_decode($json); <br>
echo $json_output->programme->short_synopsis; <br>
</code>
Outputs:<br> <br> 
<?php

$jsonurl = "http://www.bbc.co.uk/programmes/b006r9xr.json";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);

echo $json_output->programme->short_synopsis;

?>
 <br>  <br> 
<hr>
<b>Test 3) FOREACH test with an episode json file <a href="http://www.bbc.co.uk/programmes/b00x8hdz">http://www.bbc.co.uk/programmes/b00x8hdz</a> to loop through the json and display each chunk marked 'content' (and the short_synopsis):</b><br> <br>
<code>
$jsonurl = "http://www.bbc.co.uk/programmes/b00x8hdz.json"; <br>
$json = file_get_contents($jsonurl,0,null,null); <br>
$json_output = json_decode($json); <br>

echo "{$json_output->programme->short_synopsis}"; <br>

foreach ( $json_output->programme->supporting_content_items as $trend ) <br>
{ <br>
    echo "{$trend->title} {$trend->content}"; <br>
} <br>
</code>
Outputs: <br> <br>
<?php

$jsonurl = "http://www.bbc.co.uk/programmes/b00x8hdz.json";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);

echo "{$json_output->programme->short_synopsis} <br>";

foreach ( $json_output->programme->supporting_content_items as $trend )
{
    echo "{$trend->title} <br> {$trend->content} <br> <br>";
}

?>
<hr>
<b>Test 4) Putting programme->supporting_content_items->content in variable 'bbcdata':</b>
<br><br>
<?php
$jsonurl = "http://www.bbc.co.uk/programmes/b00x8hdz.json";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
$bbcData = $json_output->programme->supporting_content_items[0]->content;
echo $bbcData;
?>

<hr>
<b>Test 5) Test IF statement function on static variable 'bbcdata':</b><br><br>
<code>
if (strpos($bbcData, "published") !== false)<br>
{<br>

   echo "variable 'bbcdata' contains 'published'";<br>
}<br>
</code><br>
<?php
if (strpos($bbcData, "published") !== false)
{

   echo "variable 'bbcdata' contains 'published'";
}
?>
<br><br>
<hr>
<b>Test 6) Combining the FOREACH with the IF loops through all 'content' but only shows it if it contains the string "published":</b><br><br> 
<code>
foreach ( $json_output->programme->supporting_content_items as $trend )<br> 
{<br> 
	if (strpos($trend->content, "published") !== false)<br> 
	{<br> 
	    echo "{$trend->title} {$trend->content} ";<br> 
	}	<br> 
}<br> 
</code><br> 
<?php
foreach ( $json_output->programme->supporting_content_items as $trend )
{
	if (strpos($trend->content, "published") !== false)
	{
	    echo "{$trend->title} <br> {$trend->content} <br> <br>";
	}	
}
?>
<hr>
<b>Test 7) Parsing an index to find lots of recent Start the Week episodes.</b><br><br>
<code>
$jsonurl = "http://www.bbc.co.uk/programmes/b006r9xr/episodes/player.json/";<br>
$json = file_get_contents($jsonurl,0,null,null);<br>
$json_output = json_decode($json);<br>
foreach ( $json_output->episodes as $trend )<br>
{<br>
    echo "{$trend->programme->title} {$trend->programme->pid} {$trend->programme->short_synopsis}";<br>
}<br>
</code>
Outputs:<br><br>
<div class="smallbox">
<?php
$jsonurl = "http://www.bbc.co.uk/programmes/b006r9xr/episodes/player.json/";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);

foreach ( $json_output->episodes as $trend )
{
    echo "{$trend->programme->title} <br><a href=\"http://www.bbc.co.uk/programmes/{$trend->programme->pid}\">{$trend->programme->pid}</a> <br>{$trend->programme->short_synopsis} <br><br>";
}

?>
</div>
<hr>
<a href="http://www.plonko.co.uk/bbctest/loaddata.php">On to final test:</a> Extracting ProgrammeID values from player.json to use as individual episode URLs, extracting content from episode json, and applying 'is published by' filter!...
<br> <br>
</body>
</html>
