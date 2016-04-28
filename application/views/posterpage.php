<?php

var_dump($poster);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PosterPage</title>
</head>
<body>
	<div id="container">
		<p><a href="/dash">Dashboard</a></p>
		<p><a href="/logout">Logout</a></p>
		<h4>Posts by: <?= $poster[0]['alias']?></h4>
		
		<p>Count: <?= count($poster) ?></p>

		<?php for($i = 0; $i < count($poster); $i++) { ?>
		<p><?= $poster[$i]['speaker']?></p>
		<p><?= $poster[$i]['message']?></p>

		<?php } ?>

	</div>
</body>
</html>