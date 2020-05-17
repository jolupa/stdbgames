<?php if(date('Y-m-d') === '2020-05-19' || date('Y-m-d') > date('2020-05-19 + 3 days')): ?>
  <?= view_cell('App\Controllers\Specials::specialhome', 'slug=six-months-with-stadia') ?>
<?php endif; ?>
<section class="section has-background-grey-lighter">
  <div class="container">
    <div class="columns">
      <div class="column">
        <p class="subtitle is-5">New Games</p>
        <p class="title is-3">in the Database:</p>
      </div>
    </div>
    <?php if (!isset ($lasts)): ?>
    <div class="columns">
      <div class="column has-text-centered">
        <p class=" button is-size-5 is-light"><?= $lasts ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="columns is-multiline">
    <?php foreach ($lasts as $lasts): ?>
      <div class="column is-one-quarter">
        <div class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <img title="<?= $lasts['gName'] ?>" src="<?= base_url() ?>/images/<?= $lasts['gImage'] ?>-thumb.jpeg">
            </p>
          </figure>
          <div class="media-content">
            <p class="title is-5"><a href="<?= base_url() ?>/games/game/<?= $lasts['gSlug'] ?>"><?= character_limiter( $lasts['gName'], 15, '...' ) ?></a></p>
            <p class="subtitle is-7"><?= $lasts['gdName'] ?> / <?= $lasts['gpName'] ?>
            <br>
            <?= $lasts['gRelease'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>
