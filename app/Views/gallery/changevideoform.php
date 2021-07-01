<div id="change_video" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Modify Gallery Video</p>
    <?php if ( isset ( $video ) ): ?>
      <form method="post" action="<?= base_url ('/gallery/save') ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $video['id'] ?>">
        <input type="hidden" name="game_id" value="<?= $video['game_id'] ?>">
        <div class="field">
          <label class="label">URL</label>
          <div class="control">
            <input type="text" class="input" name="url" value="<?= $video['url'] ?>">
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-coral" type="submit">Modify</button>
          </div>
          <div class="control">
            <button class="button is-info" type="reset">Reset</button>
          </div>
        </div>
      </form>
    <?php endif; ?>
  </div>
</div>
