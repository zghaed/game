<h1 id="title">CodeReadingDojo</h1>
<form action="<?= BASE_URL ?>/programs/edit/<?= $p->get('id') ?>" method="POST">
<img id="level-logo" src="<?= BASE_URL.'/public/img/1/'.$p->get('logo_url') ?>" alt="" />
<div id="scores">
	<span id="first-score" class="star-icon">☆</span>
	<span id="second-score" class="star-icon">☆</span>
	<span id="third-score" class="star-icon">☆</span>
	<h3><?= $p->get('title') ?></h3>
	<h3>Level <?= $p->get('level') ?></h3>
	<button type="submit" id="edit-button">Edit</button>
</div>

<div id="code-content">
	<pre id="code">
		<p><?= $p->get('code') ?></p>
	</pre>
</div>

<button id="start-button">Start</button>
</form>
