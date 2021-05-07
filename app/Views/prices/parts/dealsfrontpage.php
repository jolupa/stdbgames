<article id="deals" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Discounted Games</p>
    <div class="columns is-multilinne">
      <?php foreach ($deals as $deal): ?>
        <div class="column is-2 is-full-mobile">
          <div class="card">
            <div class="card-image">
              <figure class="image is-3by2">
                <a href="<?= base_url('/game/'.$deal['slug']) ?>"><img src="<?= base_url('/img/games/'.$deal['image'].'.jpeg') ?>" title="<?= $deal['name'] ?>"></a>
              </figure>
              <div class="is-overlay" style="left: auto; top: auto; right: 10px; bottom: 10px;">
                <?php if ($deal['price_pro'] != ''): ?>
                  <tag class="tag is-green-eagle">Pro: <?= $deal['price_pro'] ?> €</tag>
                <?php endif; ?>
                <?php if ($deal['price_nonpro'] != ''): ?>
                  <tag class="tag is-green-eagle">All: <?= $deal['price_nonpro'] ?> €</tag>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php $total = count ( $deals ); if ( $total >= 6 ): ?>
      <div class="columns">
        <div class="column is-2 is-offset-10">
          <a href="<?= base_url ( '/prices/list' ) ?>"><button class="button is-info">See all discounts</button></a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</article>
