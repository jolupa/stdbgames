<div id="games_wishlisted" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4"><?= $totalinlibrary[0]['total'] ?> Games on your Library </span></p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ( $libraries as $libraries ): ?>
        <div class="column is-2-desktop is-4-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-16by9">
                <a href="<?= base_url ( '/game/'.$libraries['slug'] ) ?>"><img src="<?= base_url ( '/img/games/'.$libraries['image'].'.jpeg' ) ?>"></a>
              </figure>
              <?php if ( $libraries['rumor'] == 1 ): ?>
                <div class="is-overlay" style="top: auto; right: 5px; bottom: 5px; left: auto;">
                  <tag class="tag is-info"><span class="icon"><i class="fas fa-exclamation"></i></span></tag>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?= $pager->links('library') ?>
  </div>
</div>
