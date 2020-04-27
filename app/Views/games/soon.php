<section class="section has-background-grey-lighter">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="subtitle is-5">Games</p>
        <p class="title is-3">Coming Soon!</p>
      </div>
    </div>
    <?php if (!isset ($soon)): ?>
    <div class="columns">
      <div class="column has-text-centered">
        <p class=" button is-size-5 is-light"><?= $oops ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="columns is-multiline">
    <?php foreach ($soon as $soon): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img title="<?= $soon['gName'] ?>" src="<?= base_url() ?>/images/<?= $soon['gImage'] ?>-thumb.jpeg">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $soon['gSlug'] ?>"><?= character_limiter( $soon['gName'], 15, '...' ) ?></a></p>
            <p class="subtitle is-7"><?= $soon['gdName'] ?> / <?= $soon['gpName'] ?>
            <br>
            <?= $soon['gRelease'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
    <div class="columns has-text-centered">
      <div class="column is-full-width">
        <a href="<?= base_url() ?>/games/list/soon"><button class="button is-warning">See All!</button></a>
      </div>
    </div>
  </div>
</section>
