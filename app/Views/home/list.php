<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="title is-4"><span class="icon has-text-danger"><i class="fas fa-gamepad"></i></span> Launched!</p>
      </div>
    </div>
    <?php if (!isset ($games)): ?>
    <div class="columns">
      <div class="column has-text-centered">
        <p class=" button is-size-5 is-light"><?= $oops ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="columns is-multiline">
    <?php foreach ($games as $games): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="<?= base_url() ?>/images/<?= $games['gImage'] ?>-thumb">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $games['gSlug'] ?>"><?= character_limiter($games['gName'], 15, '...') ?></a></p>
            <p class="subtitle is-7"><?= $games['dName'] ?> / <?= $games['pName'] ?>
            <br>
            <?= $games['gRelease'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
