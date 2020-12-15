<div class="container">
  <section class="section">
    <div class="content">
      <?php if(isset($error)): ?>
        <p><?= $error ?></p>
      <?php else: ?>
        <p class="subtitle is-5">Update</p>
        <p class="title is-3">Developer</p>
        <form action="<?= base_url() ?>/developers/updatedeveloperdb" method="post">
          <input type="hidden" name="id" value="<?= $developer['id'] ?>">
          <input type="hidden" name="slug" value="<?= $developer['slug'] ?>">
          <div class="field">
            <div class="control is-expanded">
              <input type="text" class="input" name="name" value="<?= $developer['name'] ?>">
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input type="text" class="input" name="url" value="<?= $developer['url'] ?>">
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <textarea class="textarea" id="textarea" name="about"><?= $developer['about'] ?></textarea>
            </div>
          </div>
          <div class="field is-grouped is-grouped-multiline">
            <div class="control">
              <button class="button is-small is-primary" value="submit">Update Developer!</button>
            </div>
            <div class="control">
              <button class="button is-small is-danger" value="reset">Clear All!</button>
            </div>
          </div>
        </form>
      <?php endif; ?>
    </div>
  </section>
</div>
