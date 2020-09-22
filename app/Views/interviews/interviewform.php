<div class="content mt-2">
  <p class="title is-5"><?php if($interview == false): ?>Insert<?php else: ?>Update<?php endif; ?></p>
  <p class="subtitle is-3">Interview:</p>
  <?php if($interview == false): ?>
    <form action="<?= base_url() ?>/interviews/createinterviewdb" method="post" enctype="multipart/form-data">
      <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
      <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
      <div class="field">
        <div class="control is-extended">
          <textarea name="body" class="textarea" id="textarea"></textarea>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-small is-primary has-text-dark" value="submit">Insert</button>
        </div>
        <div class="control">
          <button class="button is-small is-danger has-text-white" value="reset">Start OVer!</button>
        </div>
      </div>
    </form>
  <?php else: ?>
    <form action="<?= base_url() ?>/interviews/updateinterviewdb" method="post" enctype="multipart/form-data">
      <input type="hidden" name="game_id" value="<?= $interview['game_id'] ?>">
      <input type="hidden" name="id" value="<?= $interview['id'] ?>">
      <input type="hidden" name="slug" value="<?= $game['slug'] ?>">
      <div class="field">
        <div class="control is-extended">
          <textarea name="body" class="textarea" id="textarea"><?= $interview['body'] ?></textarea>
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-small is-primary has-text-dark" value="submit">Update</button>
        </div>
        <div class="control">
          <button class="button is-small is-danger has-text-white" value="reset">Start Over!</button>
        </div>
      </div>
    </form>
  <?php endif; ?>
</div>
