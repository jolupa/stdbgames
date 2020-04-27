<section class="section has-background-grey-lighter">
  <div class="container">
    <div class="columns">
      <div class="column">
				<p class="subtitle is-5">Game</p>
        <p class="title is-3">Addons</p>
      </div>
    </div>
    <?php if (!$addonshome): ?>
    <div class="columns">
      <div class="column has-text-centered">
        <p class=" button is-size-5 is-light"><?= $oops ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="columns is-multiline">
    <?php foreach ($addonshome as $addonshome): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img title="<?= $addonshome['aName'] ?>" src="<?= base_url() ?>/images/<?= $addonshome['aImage'] ?>-thumb.jpeg">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/addons/addon/<?= $addonshome['aSlug'] ?>"><?= character_limiter( $addonshome['aName'], 15, '...' ) ?></a></p>
            <p class="subtitle is-7"><?= $addonshome['adName'] ?> / <?= $addonshome['apName'] ?>
            <br>
            <?= $addonshome['aRelease'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
    <div class="column has-text-centered">
      <div class="column is-full-width">
        <a href="<?= base_url() ?>/addons/list"><button class="button is-warning">See All!</button></a>
      </div>
    </div>
  </div>
</section>
