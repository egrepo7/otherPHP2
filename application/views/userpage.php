<?php
$loggedUser = $this->session->userdata('loggedin');
// var_dump($notfaves);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Userpage</title>
</head>
<body>
	<div id="container">
		<a href="/logout">Logout</a>
		<h1>Welcome <?= $loggedUser['name'] ?></h1>
		
		<div id="notfaves">
			<fieldset>
			<legend>Quoteable Quotes</legend>
			<?php for($i = 0; $i < count($notfaves); $i++) { ?>
			<div class="notfavesquotes">
				<p><?= $notfaves[$i]['speaker']?>:</p>
				<p><?= $notfaves[$i]['message']?></p>
				<p>Posted by: <a href="/users/<?= $notfaves[$i]['poster_id']?>"><?= $notfaves[$i]['alias']?></a></p>

				<p><a href="/add/<?= $notfaves[$i]['id']?>/<?= $loggedUser['id']?>"><button>Add to My List</button></a></p>
			</div>
			<?php } ?>
			</fieldset>
		</div>

			<div id="faves">
			<fieldset>
			<legend>Your Favorites</legend>
			<?php for($i = 0; $i < count($faves); $i++) { ?>
			<div class="favesquotes">
				<p><?= $faves[$i]['speaker']?>:</p>
				<p><?= $faves[$i]['message']?></p>
				<p>Posted by: <a href="/users/<?= $faves[$i]['poster_id']?>"><?= $faves[$i]['alias']?></a></p>
				
				<p><a href="/remove/<?= $faves[$i]['id']?>/<?= $loggedUser['id']?>"><button>Remove From My List</button></a></p>
			</div>
			<?php } ?>
			</fieldset>
		</div>
		
			
			<fieldset>
				<legend>Contribute a Quote</legend>
				<form action="/Quotes/addQuote" method="POST">
					<?= form_error('quoted_by') ?>
					<p>Quoted By:<input type="text" name="quoted_by"></p>
					<?= form_error('message') ?>
					<p>Message:<textarea name="message" cols="30" rows="3"></textarea></p>
					<input type="hidden" name="poster_id" value="<?= $loggedUser['id'];?>">
					<input type="submit" value="Submit">
				</form>
			</fieldset>
	</div>	
</body>
</html>