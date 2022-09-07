<div id="games_wishlisted" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4"><?= $totalinwishlist[0]['total'] ?> Games on your Wishlist</span></p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ( $wishlist as $wishlist ): ?>
        <div class="column is-2-desktop is-4-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-16by9">
                <a href="<?= base_url ( '/game/'.$wishlist['slug'] ) ?>"><img src="<?= base_url ( '/assets/images/games/'.$wishlist['image'].'.jpeg' ) ?>"></a>
              </figure>
              <?php if ( $wishlist['rumor'] == 1 ): ?>
                <div class="is-overlay" style="top: auto; left: auto; bottom: 5px; right: 5px;">
                  <tag class="tag is-info"><span class="icon"><i class="fas fa-exclamation"></i></span></tag>
                </div>
              <?php endif; ?>
              <?= view_cell ( 'App\Controllers\Prices::dealgameswishlisted', 'id='.$wishlist['id'] ) ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?= $pager->links('wishlist') ?>
  </div>
</div>
