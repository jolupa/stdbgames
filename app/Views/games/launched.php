<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="subtitle is-5">Games</p>
        <p class="title is-3">Launched!</p>
      </div>
    </div>
    <?php if (!isset ($launched)): ?>
    <div class="columns">
      <div class="column has-text-centered">
        <p class=" button is-size-5 is-light"><?= $oops ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="columns is-multiline">
    <?php foreach ($launched as $launched): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img title="<?= $launched['gName'] ?>" src="<?= base_url() ?>/images/<?= $launched['gImage'] ?>-thumb.jpeg">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $launched['gSlug'] ?>"><?= character_limiter( $launched['gName'], 15, '...' ) ?></a></p>
            <p class="subtitle is-7"><?= $launched['gdName'] ?> / <?= $launched['gpName'] ?>
            <br>
            <?= $launched['gRelease'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
    <div class="column has-text-centered">
      <div class="column is-full-width">
        <a href="<?= base_url() ?>/games/list/launched"><button class="button is-warning">See All!</button></a>
      </div>
    </div>
  </div>
</section>
