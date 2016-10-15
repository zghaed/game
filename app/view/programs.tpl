<h1 id="title">CodeReadingDojo</h1>
<h3 class="sub-title">Select an exercise you want to play</h3>

<div id="beginner">
  <?php foreach($p as $k => $l): ?>
  <span class="level">
    <a href="<?= BASE_URL ?>/programs/level/<?= $l->getId(); ?>">
    	<img class="level-logo" src="<?= BASE_URL ?>/public/img/1/<?= $l->getLogo(); ?>" alt="<?= $l->getTitle(); ?>" />
      <div class="caption">
        <span class="star-icon full">☆</span>
        <span class="star-icon full">☆</span>
        <span class="star-icon full">☆</span>
      </div>
    </a>
  </span>
  <?php endforeach; ?>
</div>
