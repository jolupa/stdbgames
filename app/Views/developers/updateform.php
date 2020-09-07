<?php if(isset($error)): ?>
  <div class="columns my-2">
    <div class="column has-text-centered">
      <div class="content">
        <p><?= $error ?></p>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="columns mt-2">
    <div class="column">
      <p class="subtitle is-5">Update</p>
      <p class="title is-3">Developer</p>
    </div>
  </div>
  <div class="columns mb-2">
    <div class="column">
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
            <button class="button is-small is-primary has-text-dark" value="submit">Update Developer!</button>
          </div>
          <div class="control">
            <button class="button is-small is-danger has-text-white" value="reset">Clear All!</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>
