
<ul>Radio 4
<li><a href="/bbctest/starttheweek.php">Start the Week</a></li>
<li><a href="/bbctest/frontrow.php">Front Row</a></li>
<li><a href="/bbctest/saturdaylive.php">Saturday Live</a></li>
<li><a href="/bbctest/womanshour.php">Woman's Hour</a></li>
<li><a href="/bbctest/openbook.php">Open Book</a></li>
</ul>
<!-- <a href="/bbctest/midweek.php">Midweek</a>

<br>
Radio 3
<a href="/bbctest/nightwaves.php">Night Waves</a>
<a href="/bbctest/theverb.php">The Verb</a><br>
Radio 2
<a href="/bbctest/artsshow.php">Arts Show with Claudia Winkleman</a>
 -->
<!-- <form method="post">
<p>
<select name="number">
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="40">40</option>
<option value="0">All</option>
</select>
<input type="submit" />
</p>
</form> -->
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.7.custom.css" rel="Stylesheet" />	
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.7.custom.min.js"></script>
<style>
	#demo-frame > div.demo { padding: 10px !important; };
	</style>
	<script>
	$(function() {
		$( "#slider" ).slider({
			value:5,
			min: -1,
			max: 80,
			step: 5,
			slide: function( event, ui ) {
				$( "#number" ).val( ui.value );
			}
		});
		$( "#number" ).val( $( "#slider" ).slider( "value" ) );
	});
	</script>



<div class="demo">

<p>	<form method="post">
	<label for="number">Number of episodes (Set to -1 for all eps):</label>
	<input type="text" id="number" name="number" style="border:0; color:#f6931f; font-weight:bold;" />
	<input type="submit" />
	</form>
</p>
<br>
<div id="slider"></div>

</div>