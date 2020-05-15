<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="subtitle is-5">Users Games</p>
        <p class="title is-3">Reviews:</p>
      </div>
    </div>
    <div class="columns is-multiline">
    <?php foreach ($latest as $latest): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img title="<?= $latest['rgName'] ?>" src="<?= base_url() ?>/images/<?= $latest['rgImage'] ?>-thumb.jpeg">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $latest['rgSlug'] ?>#Review<?= $latest['rId'] ?>"><?= character_limiter( $latest['rgName'], 15, '...' ) ?></a></p>
            <p class="subtitle is-7">Review by: <?= $latest['ruName'] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
