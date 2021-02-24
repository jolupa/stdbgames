<div class="columns">
  <div class="column">
    <p class="subtitle is-5">Most Loved</p>
    <p class="title is-3">Games:</p>
  </div>
</div>
<div class="columns is-multiline">
  <?php foreach($chart as $chart): ?>
    <div class="column is-12">
      <div class="media">
        <figure class="media-left image is-64x64 is-fullwidth">
            <img src="<?= base_url() ?>/images/<?= $chart['game_image'] ?>-thumb.jpeg" title="<?= $chart['game_name'] ?>" alt="<?= $chart['game_name'] ?>">
        </figure>
        <div class="media-content">
          <p><a href="<?= base_url() ?>/game/<?= $chart['game_slug'] ?>"><?= character_limiter($chart['game_name'], 15, '...') ?></a></p>
          <p class="title is-7">Developer <?= $chart['developer_name'] ?><br>Publisher <?= $chart['publisher_name'] ?></p>
        </div>
        <div class="media-right">
          <figure class="image is-64x64 has-text-centered">
            <br><p class="title is-5"><strong><?= $chart['like'] ?></strong></p>
          </figure>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
