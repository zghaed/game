
<h1 id="title">Add Program</h1>

<div id="edit">
  <form id="edit-program" action="<?= BASE_URL ?>/programs/add/process/" method="POST">

  <label>Title: <input type="text" name="title" value="Title"></label>

  <label>Level: <input type="text" name="level" value="1"></label>

  <label>Code: <textarea name="code">Enter a short program</textarea></label>

  <label>Logo URL: <input type="text" name="logo_url" value="Logo_02.png"></label>

  <input type="submit" name="submit" value="Add Program">

  </form>
</div>
