<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Most Loved</p>
    <p class="title is-3">Games:</p>
  </div>
</div>
<div class="columns is-multiline">
  <?php foreach($chart as $chart): ?>
    <?php if($chart['total'] > 0): ?>
      <div class="column is-12">
        <div class="media">
          <figure class="media-left image is-64x64 is-fullwidth">
              <img src="<?= base_url() ?>/images/<?= $chart['game_image'] ?>-thumb.jpeg" title="<?= $chart['game_name'] ?>" alt="<?= $chart['game_name'] ?>">
          </figure>
          <div class="media-content">
            <p><a href="<?= base_url() ?>/game/<?= $chart['game_slug'] ?>"><?= character_limiter($chart['game_name'], 15, '...') ?></a></p>
            <p class="title is-7">
              Developer <a href="<?= base_url() ?>/developer/<?= $chart['developer_slug'] ?>"><?= character_limiter($chart['developer_name'], 15, '...') ?></a>
              <br>
              Publisher <a href="<?= base_url() ?>/publisher/<?= $chart['publisher_slug'] ?>"><?= character_limiter($chart['publisher_name'], 15, '...') ?></a>
            </p>
          </div>
          <div class="media-right">
            <figure class="image is-64x64 has-text-centered">
              <br><p class="title is-5"><strong><?= $chart['total'] ?></strong></p>
            </figure>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
