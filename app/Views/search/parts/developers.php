<div id="results_search_publishers" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Developers Found</p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ( $developers as $developers ): ?>
        <div class="column is-3-desktop is-half-mobile">
          <div class="card is-shadowless">
            <?php if ( ! empty ( $developers['image'] ) ): ?>
              <div class="card-image">
                <figure class="image is-16by9">
                  <a href="<?= base_url ( '/developers/'.$developers['slug'] ) ?>"><img src="<?= base_url ( '/img/developers/'.$developers['image'].'.jpeg') ?>"></a>
                </figure>
              </div>
            <?php else: ?>
              <div class="card-content">
                <a href="<?= ( '/developers/'.$developers['slug']) ?>"><?= $developers['name'] ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
