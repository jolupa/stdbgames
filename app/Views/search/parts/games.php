<div id="results_search_games" class="container mt-5">
  <div class="mx-3">
    <p class="title is-4">Games Found</p>
    <div class="columns is-multiline is-mobile">
      <?php foreach ( $games as $games ): ?>
        <div class="column is-3-desktop is-half-mobile">
          <div class="card is-shadowless">
            <div class="card-image">
              <figure class="image is-16by9">
                <a href="<?= base_url ( '/game/'.$games['slug'] ) ?>"><img src="<?= base_url ( '/img/games/'.$games['image'].'.jpeg' ) ?>"></a>
              </figure>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
