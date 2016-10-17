<?php

function isSelected($pn, $link) {
	if($pn == $link) {
		return ' id="selected-nav" ';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	  <meta name="description" content="CodeReadingDojo is a new and dun educationally-oriented game aimed at promoting code reading skils.">
		<title>Virginia Tech | <?= $pageName ?></title>

		<style type="text/css">
		</style>

		<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/public/css/styles.css">
	  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/jquery-3.1.0.min.js"></script>
	  <script type="text/javascript" src="<?= BASE_URL ?>/public/js/scripts.js"></script>

	</head>
	<body>

	<?php

	session_start();
	if(isset($_SESSION['user'])) {
			$url = BASE_URL.'/signout/';
			echo '<a class="signin-signout" href="'.$url.'">Sign Out</a>';
			echo '<p id="signed-in">Signed in as: '.$_SESSION['user'].'</p>';
	}
	else {
		$url = BASE_URL.'/signin/';
		echo '<a class="signin-signout" href="'.$url.'">Sign In</a>';
	}

	?>

	<h1>Virginia Tech | CodeReadingDojo</h1>

	<label for="show-menu" class="show-menu">Show Menu</label>
	<input type="checkbox" id="show-menu" value="button">
	<ul id="menu">
		<li><a <?= isSelected($pageName, 'Home') ?> href="<?= BASE_URL ?>/">Home</a></li>
		<li><a <?= isSelected($pageName, 'Play') ?> href="<?= BASE_URL ?>/programs/">Play</a></li>
		<li><a <?= isSelected($pageName, 'About') ?> href="<?= BASE_URL ?>/about/">About</a></li>
		<li><a <?= isSelected($pageName, 'Contact') ?> href="<?= BASE_URL ?>/contact/">Contact</a></li>
	</ul>
