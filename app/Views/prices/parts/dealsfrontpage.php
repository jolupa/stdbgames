<section class="section">
  <div class="container is-max-widescreen">
    <h1 class="title">
      On sale:
    </h1>
    <div class="columns is-multiline is-mobile">
    <?php foreach ($deals as $deal): ?>
      <div class="column is-half-mobile is-3-desktop">
        <div class="card is-equal">
          <div class="card-image">
            <figure class="image is-5by3">
              <img src="<?= base_url ( '/img/games/'.$deal['image']).'.jpeg' ?>">
            </figure>
          </div>
          <div class="card-content">
            <h5 class="title is-5">
              <?php if ($deal ['is_edition'] == 1): ?>
                <?= view_cell ('App\Controllers\Prices::getslug', 'game_id='.$deal ['edition_game_id'].' ,name='.$deal ['name']) ?>
              <?php else: ?>
                <a href="<?= base_url ('/game/'.$deal['slug'])?>"><?= $deal['name'] ?></a>
              <?php endif; ?>
            </h5>
            <p>
              <?php if (isset ($deal ['price_pro'])): ?>
                <strong><?= $deal['price_pro'] ?> €</strong> For Pro Users
                <br />
              <?php endif; ?>
              <?php if (isset ($deal ['price_nonpro'])): ?>
                <strong><?= $deal['price_nonpro'] ?> €</strong> For All Users
              <?php endif; ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
    <?php if ($how_many_deals > 4): ?>
      <p class="has-text-right">
        <a href="<?= base_url ('/prices/alldeals') ?>">See All Sales...</a>
      </p>
    <?php endif; ?>
  </div>
</section>
