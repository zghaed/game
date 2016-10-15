<div id="content">

<h2>Edit Program</h2>

<form id="edit-program" action="<?= BASE_URL ?>/programs/edit/<?= $id ?>/process" method="POST">

<label>Title: <input type="text" name="title" value="<?= $program['title'] ?>"></label>

<label>Level: <input type="text" name="level" value="<?= $product['level'] ?>"></label>

<label>Code: <textarea name="code"><?= $program['code'] ?></textarea></label>

<label>Logo URL: <input type="text" name="logo_url" value="<?= $product['logo_url'] ?>"></label>

<input type="submit" name="submit" value="Save Changes">

</form>

</div>
