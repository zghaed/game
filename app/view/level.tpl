<h1 id="title">CodeReadingDojo</h1>

<img id="level-logo" src="<?= BASE_URL.'/public/img/'.$p->get('logo_url') ?>" alt="" />
<div id="scores">
	<span id="first-score" class="star-icon">☆</span>
	<span id="second-score" class="star-icon">☆</span>
	<span id="third-score" class="star-icon">☆</span>
	<h3><?= $p->get('title') ?></h3>
	<h3>Level <?= $p->get('level') ?></h3>
	<?php
	if(isset($_SESSION['user'])) {
		if ($_SESSION['user'] == 'admin') {
			$pid = $p->get('id');
			$editUrl = BASE_URL.'/programs/edit/'.$pid;
			$deleteUrl = BASE_URL.'/programs/delete/'.$pid;

			echo '<form action="'.$editUrl.'" method="POST">
				<button type="submit" id="edit-button">Edit</button>
			</form>';

			echo '<form action="'.$deleteUrl.'" method="POST" onsubmit="return confirm("Really Delete?");">
				<button type="submit" id="delete-button">Delete</button>
			</form>';
		}
	}
	?>
</div>

<div id="code-content">
	<pre id="code">
		<p><?= $p->get('code') ?></p>
	</pre>
</div>

<button id="start-button">Start</button>
