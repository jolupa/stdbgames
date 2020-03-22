<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-time">
        <p class="subtitle is-5">Games</p>
        <?php if ( $type == 'soon'): ?>
          <p class="title is-3">Coming Soon!</p>
        <?php endif; ?>
        <?php if ( $type == 'launched'): ?>
          <p class="title is-3">Launched!</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="columns is-multiline">
    <?php foreach ($gametype as $games): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img src="<?= base_url() ?>/images/<?= $games['gImage'] ?>-thumb">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $games['gSlug'] ?>"><?= character_limiter($games['gName'], 15, '...') ?></a></p>
            <p class="subtitle is-7"><?= $games['gdName'] ?> / <?= $games['gpName'] ?>
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
