<div class="columns is-multiline mb-2">
  <?php foreach($game as $game): ?>
    <div class="column is-3">
      <div class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img src="<?= base_url() ?>/images/<?= $game['image'] ?>-thumb.jpeg">
          </p>
        </figure>
        <div class="media-content">
          <p class="title is-5"><a href="<?= base_url() ?>/game/<?= $game['slug'] ?>"><?= character_limiter($game['name'], 15, '...') ?></a></p>
          <p class="subtitle is-7">Release <?= $game['release'] ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
