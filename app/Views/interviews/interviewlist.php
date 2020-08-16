<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Our Small
    <p class="title is-3">Interviews:</p>
  </div>
</div>
<div class="columns mt-2">
  <?php foreach($interview as $interview): ?>
    <div class="column is-multiline">
      <div class="card">
        <div class="card-image" style="height: 200px; background-image: url(<?= base_url() ?>/images/<?= $interview['game_image'] ?>.jpeg); background-size: cover; background-position: center;"></div>
        <div class="card-content has-background-white">
          <div class="content">
            <p>Small Interview with <a href="<?= base_url() ?>/game/<?= $interview['game_slug'] ?>#small_interview"><strong><?= $interview['game_name'] ?></strong></a> Developers</p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
