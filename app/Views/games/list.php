<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-full-width">
        <p class="subtitle is-5">Games</p>
        <?php if ( $type === 'soon'): ?>
          <p class="title is-3">Coming Soon!</p>
        <?php endif; ?>
        <?php if ( $type === 'launched'): ?>
          <p class="title is-3">Launched!</p>
        <?php endif; ?>
        <?php if($type === 'firstonstadia'): ?>
          <p class="title is-3">First on Stadia</p>
        <?php endif; ?>
        <?php if($type === 'stadiaexclusive'): ?>
          <p class="title is-3">Stadia Exclusives</p>
        <?php endif; ?>
        <?php if($type === 'all'): ?>
          <p class="title is-3">All Games</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="columns">
      <div class="column is-full-width">
        <nav class="breadcrumb has-dot-separator is-centered">
          <ul>
            <li <?php if($type === 'all'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/games/list/all">All</a></li>
            <li <?php if($type === 'launched'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/games/list/launched">Launched</a></li>
            <li <?php if($type === 'soon'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/games/list/soon">Soon</a></li>
            <li <?php if($type === 'firstonstadia'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/games/list/firstonstadia">First on Stadia</a></li>
            <li <?php if($type === 'stadiaexclusive'): ?>class="is-active"<?php endif; ?>><a href="<?= base_url() ?>/games/list/stadiaexclusive">Stadia Exclusives</a></li>
          </ul>
        </nav>
        <hr>
      </div>
    </div>
    <div class="columns is-multiline">
    <?php foreach ($games as $games): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img title="<?= $games['gName'] ?>" src="<?= base_url() ?>/images/<?= $games['gImage'] ?>-thumb.jpeg">
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
