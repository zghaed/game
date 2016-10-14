<h1 id="title">CodeReadingDojo</h1>
<h3 class="sub-title">Select an exercise you want to play</h3>

<div id="content">
  <?php foreach($p as $k => $l): ?>

<form action="<?= BASE_URL ?>/programs/edit/<?= $l->getId(); ?>" method="POST">

<div id="beginner">
	<img class="level" src="<?= BASE_URL ?>/public/img/1/<?= $l->getLogo(); ?>" alt="<?= $l->getTitle(); ?>" />
  <div class="caption">
    <span class="star-icon full">☆</span>
    <span class="star-icon full">☆</span>
    <span class="star-icon full">☆</span>
  </div>
  <h3><a href="<?= BASE_URL ?>/shirts/view/<?= $l->getId(); ?>"><?= $l->getTitle(); ?></a></h3>
	<p>
		<?= $l->getCode(); ?>
	</p>
	<p>Level: <?= $l->getLevel(); ?></p>
	<button type="submit">Edit</button>
</div>


  <?php endforeach; ?>
</form>



</div>
