<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>tests</title>


<body>
<?php

$jsonurl = "http://www.bbc.co.uk/programmes/b00x8hdz.json";
$iso_8859_1_data = file_get_contents($jsonurl,0,null,null);
$data = json_decode($iso_8859_1_data);

$bbcData = $data->programme->supporting_content_items[0]->content;
echo $bbcData;
?>
</body>
</html>