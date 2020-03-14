<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="title is-4"><span class="icon has-text-primary"><i class="fas fa-gamepad"></i></span> The Free Ones</p>
      </div>
    </div>
    <?php if (!isset ($founders)): ?>
    <div class="columns">
      <div class="column has-text-centered">
        <p class=" button is-size-5 is-light"><?= $founders ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="columns is-multiline">
    <?php
    foreach ($founders as $founders): ?>
      <div class="column is-one-fifth">
        <div class="card" style="height: 100%;">
          <div class="card-image">
            <figure class="image is-16by9">
              <img src="<?= base_url() ?>/images/<?= $founders['gImage'] ?>">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4"><a href="<?= base_url() ?>/games/game/<?= $founders['gSlug'] ?>"><?= character_limiter($founders['gTitle'], 10, '...') ?></a></p>
                <p class="subtitle is-6">Developer: <?= $founders['dName'] ?>
                <br>
                Publisher: <?= $founders['pName'] ?>
                <br>
                Release Date: <?= $founders['gRelease'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
