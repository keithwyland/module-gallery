<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Module Gallery</title>
	
	<link rel="stylesheet" href="assets/css/mg.css" />
	
	<!-- link this to your project's CSS -->
	<link rel="stylesheet" href="assets/css/style.css" />
</head>

<body class="mg-body">



<?php 
	
	$files = array();
	$patterns = "patterns";
	$viewAll = true;
	if (isset($_GET["p"])):
		$files[] = $_GET["p"] . ".json";
		$viewAll = false;
	else:
		$handle = opendir($patterns);
		while (false !== ($file = readdir($handle))):
			if(substr($file,-5) == '.json'):
				$files[] = $file;
			endif;
		endwhile;
		sort($files);
		
		echo '<h1 class="mg-head">Module Gallery</h1>';
		echo '<p class="mg-text">A simple front-end pattern library. <a href="https://github.com/keithwyland/module-gallery">Check it out on GitHub.</a></p>';
	endif;

	foreach ($files as $file):
		$string = file_get_contents($patterns.'/'.$file);
		$json_a = json_decode($string, true);

		if ($viewAll !== true):
			echo '<p><a href="index.php" class="mg-link">&lt; Return to All Modules</a></p>';
		endif;
		
		echo '<h2 class="mg-pattern-head"><a href="index.php?p=' . str_replace('.json', '', $file) . '">' . $json_a['title'] . '</a></h2>';
		
		echo '<div class="mg-tabs">';
		
		echo '<nav class="mg-tabs-nav">';
		echo '<ul>';
		
		foreach ($json_a['types'] as $key => $value):
			if ($key < 1) :
				echo  '<li><a href="#tab-' . htmlspecialchars(str_replace(' ', '', $json_a['title'])) . $key . '" class="active">' . $value['name'] . '</a></li>';
			
			else:
				echo '<li><a href="#tab-' . htmlspecialchars(str_replace(' ', '', $json_a['title'])) . $key . '" >' . $value['name'] . '</a></li>';
			endif;
		endforeach;
		
		echo '</ul>';
		echo '</nav><!--/.mg-tabs-nav-->';
		
		foreach ($json_a['types'] as $key => $value):
			if ($key < 1) {
				echo '<div id="tab-' . htmlspecialchars(str_replace(' ', '', $json_a['title'])) . $key . '" class="active">';
			}
			else {
				echo '<div id="tab-' . htmlspecialchars(str_replace(' ', '', $json_a['title'])) . $key . '">';
			}
			
			echo '<div class="mg-pattern">';
			echo '<details class="mg-source">';
			echo '<summary>Markup for "'  . $value['name'] .  '"</summary>';

			echo '<textarea rows="10" class="mg-code">'.htmlspecialchars(file_get_contents($patterns.'/'.$value['src'])).'</textarea>';
			echo '<p class="mg-caption"><strong>Notes:</strong> '. $value['info'] .'</p>';

			echo '</details><!--/.mg-source-->';
			
			include($patterns.'/'.$value["src"]);
			
			echo '</div><!--/.mg-pattern-->';
			echo '</div>';
		endforeach;

		echo '</div><!--/.mg-tabs-->';
				
	endforeach;
	
?>

<footer class="mg-footer">
	<p><small>Module Gallery by <a href="http://twitter.com/keithwyland">Keith Wyland</a></small></p>
</footer>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/transformer-tabs.js"></script>
<script src="assets/js/jquery.details.min.js"></script>
<script>
	$('details').details();	
</script>


</body>
</html>
