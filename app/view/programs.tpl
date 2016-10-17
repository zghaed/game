<h1 id="title">CodeReadingDojo</h1>
<h3 class="sub-title">Select an exercise you want to play</h3>

<?php
if(isset($_SESSION['user'])) {
	if ($_SESSION['user'] == 'admin') {
		$url = BASE_URL.'/programs/addProgram/';
		echo '<form action="'.$url.'" method="POST">
			<button type="submit" id="add-button">Add Program</button>
		</form>';
	}
}
?>

<div id="programs">
  <?php foreach($p as $k => $l): ?>
  <span class="level">
    <a href="<?= BASE_URL ?>/programs/level/<?= $l->getId(); ?>">
    	<img class="level-logo" src="<?= BASE_URL ?>/public/img/<?= $l->getLogo(); ?>" alt="<?= $l->getTitle(); ?>" />
    	<h3><?= $l->get('title') ?></h3>
    </a>
  </span>
  <?php endforeach; ?>
</div>
