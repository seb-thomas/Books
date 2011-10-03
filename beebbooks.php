<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<title>Beeb Books</title>

  <style type="text/css">
 @import url("prodcss.css");	
  </style>
  
</head>
<body>

<div class="leftmenu">
<?php include("menu.php"); ?>
</div>
<div id="content">
<h1>Welcome to Beeb Books.</h1>
<p>...is not finished yet.</p>
<p><u>The concept</u>: Dynamically load book titles (etc) of books mentioned on BBC radio programmes.</p>
<p>Select the programme you want from the menu on the left (try Start the week), when you get to the programme page hit the submit button to display episodes with books mentioned. Use the slider to display more episodes.
<ul><b>Problems</b>
<li>Bad code...so slow! Start the week is ok, but the rest are painful.</li>
<li>Bad code...should I be using mysql?</li>
<li>Data from BBC is inconsistently formatted across brands (programmes)</li>
<li>Data is sometimes sloppy (programme producer's fault?)</li>
<li> Currently using http://www.bbc.co.uk/programmes/*brandID*/episodes/player.json as index for episode IDs, but this is sometimes incomplete. Need to look into using http://www.bbc.co.uk/programmes/*brandID*.rdf.</li>
<li>No Radio 3 programmes because of aforementioned data quality problems.</li>
</ul>
Original <a href="http://www.plonko.co.uk/bbctest/yaml.php">test pages</a>. 
</p>
</div>
</body>
</html> 