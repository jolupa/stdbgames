<section class="section" id="trailer">
  <div class="container is-max-widescreen">
    <h1 class="title">
      Add/Update Game Trailer:
    </h1>
    <form action="<?= base_url ('/gallery/savegallery') ?>" method="post" enctype="multipart/form-data">
      <?php if (isset ($video ['id'])): ?>
        <input type="hidden" name="id" value="<?= $video ['id'] ?>">
      <?php endif; ?>
      <?php if (isset ($video ['game_id'])): ?>
        <input type="hidden" name="game_id" value="<?= $video ['game_id'] ?>">
      <?php else: ?>
        <input type="hidden" name="game_id" value="<?= $game ['id'] ?>">
      <?php endif; ?>
      <div class="field is-grouped">
        <div class="control is-expanded">
          <label class="label">Youtube Video Code:</label>
          <input class="input" type="text" name="video_code"
          <?php if (isset ($video ['url'])): ?>
            value="<?= $video ['url'] ?>"
          <?php endif; ?>
          >
        </div>
      </div>
      <div class="field is-grouped">
        <div class="control is-expanded">
        </div>
        <div class="control">
          <button class="button is-primary" type="submit">Add/Edit</button>
        </div>
        <div class="control">
          <button class="button is-danger" type="reset">Reset</button>
        </div>
      </div>
    </form>
  </div>
</section>
