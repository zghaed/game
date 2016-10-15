<h1 id="title">CodeReadingDojo</h1>
<img id="level-logo" src="<?= BASE_URL.'/public/img/1/'.$p->get('logo_url') ?>" alt="" />

<div id="scores">
	<span id="first-score" class="star-icon">☆</span>
	<span id="second-score" class="star-icon">☆</span>
	<span id="third-score" class="star-icon">☆</span>
	<h3><?= $p->get('title') ?></h3>
	<h3>Level <?= $p->get('level') ?></h3>
</div>


<div id="code-content">
	<pre id="code">
		<p><?= $p->get('code') ?></p>
	</pre>
</div>

<button id="start-button">Start</button>
