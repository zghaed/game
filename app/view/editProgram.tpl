
<h1 id="title">CodeReadingDojo</h1>

<div id="edit">
  <img id="logo-edit" src="<?= BASE_URL.'/public/img/1/'.$p->get('logo_url') ?>" alt="" />
  <form id="edit-program" action="<?= BASE_URL ?>/programs/edit/<?= $id ?>/process" method="POST">

  <label>Title: <input type="text" name="title" value="<?= $p->get('title') ?>"></label>

  <label>Level: <input type="text" name="level" value="<?= $p->get('level') ?>"></label>

  <label>Code: <textarea name="code"><?= $p->get('code') ?></textarea></label>

  <label>Logo URL: <input type="text" name="logo_url" value="<?= $p->get('logo_url') ?>"></label>

  <input type="submit" name="submit" value="Save Changes">

  </form>
</div>
