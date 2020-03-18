<section class="section has-background-grey-lighter">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="title is-4"><span class="icon has-text-grey-dark"><i class="fas fa-gamepad"></i></span> Comming Soon</p>
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
              <img src="<?= base_url() ?>/images/<?= $soon['gImage'] ?>-thumb">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $soon['gSlug'] ?>"><?= character_limiter($soon['gName'], 15, '...') ?></a></p>
            <p class="subtitle is-7"><?= $soon['dName'] ?> / <?= $soon['pName'] ?>
            <br>
            <?= $soon['gRelease'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
