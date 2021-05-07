<div id="results_search_publishers" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Publishers Found</p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ( $publishers as $publishers ): ?>
        <div class="column is-3-desktop is-5-mobile">
          <div class="card is-shadowless">
            <?php if ( ! empty ( $publishers['image'] ) ): ?>
              <div class="card-image">
                <figure class="image is-16by9">
                  <a href="<?= base_url ( '/publishers/'.$publishers['slug'] ) ?>"><img src="<?= base_url ( '/img/publishers/'.$publishers['image'].'.jpeg') ?>"></a>
                </figure>
              </div>
            <?php else: ?>
              <div class="card-content">
                <a href="<?= base_url ( '/publishers/'.$publishers['slug'] ) ?>"><?= $publishers['name'] ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
